<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class BookController extends Controller
{
   public function index() 
   {
    $books = Book::all();

    if ($books->isEmpty()) {
        return response()->json([
            "success" => true,
            "message" => "Resource data not found",
        ], 200);
    }
    

    return response()->json([
            "success" => true,
            "message" => "Get All Books",
            "data" => $books,
     ]);
    }

    //store//
    public function store(Request $request) {
        // 1. validator
            $validator = Validator::make($request->all(), [
                'title' => 'required|string|max:100',
                'description' => 'required|string|',
                'price' => 'required|numeric|',
                'stock' => 'required|integer|',
                'cover_photo' => 'required|image|mimes:jpeg,png,jpg|max:2048',
                'genre_id' => 'required|exists:genres,id',
                'author_id' => 'required|exists:authors,id'
                
            ]);

        // 2. check validator error
            if ($validator->fails()) {
                return response()->json([
                    "success" => false,
                    "message" => $validator->errors()
                ], 422);
            }

        // 3. upload image
            $image = $request->file('cover_photo');
            $image->store('books', 'public');

        // 4. insert data
            $book = Book::create([
                "title" => $request->title,
                "description" => $request->description,
                "price" => $request->price,
                "stock" => $request->stock,
                "cover_photo" => $image->hashName(),
                "genre_id" => $request->genre_id,
                "author_id" => $request->author_id
            ]);
            
        
        // 5. response	
            return response()->json([
                "success" => true,
                "message" => "Book Created",
                "data" => $book
            ], 201);
    }

    //show//
    public function show(string $id) {
        $book = Book::find($id);
        // check if book not found
        if (!$book) {
            return response()->json([
                "success" => false,
                "message" => "Resource data not found",
            ], 404);
        }
        // response
        return response()->json([
            "success" => true,
            "message" => "Get Book by ID",
            "data" => $book
        ], 200);
    }

    //update//
    public function update(string $id, Request $request) {
        // 1. mencari data
            $book = Book::find($id);

            if (!$book) {
                return response()->json([
                    "success" => false,
                    "message" => "Resource data not found",
                ], 404);
            }


        // 2. validator
            $validator = Validator::make($request->all(), [
                'title' => 'required|string|max:100',
                'description' => 'required|string|',
                'price' => 'required|numeric|',
                'stock' => 'required|integer|',
                'cover_photo' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
                'genre_id' => 'required|exists:genres,id',
                'author_id' => 'required|exists:authors,id'
                
            ]);

            // cek validator error
            if ($validator->fails()) {
                return response()->json([
                    "success" => false,
                    "message" => $validator->errors()
                ], 422);
            }

        // 3. siapkan data untuk diupdate
            $data = [
                "title" => $request->title,
                "description" => $request->description,
                "price" => $request->price,
                "stock" => $request->stock,
                "genre_id" => $request->genre_id,
                "author_id" => $request->author_id
            ];

        // 4. handle image (upload & delete image)
            if ($request->hasFile('cover_photo')) {
                $image = $request->file('cover_photo');
                $image->store('books', 'public');
                
                // update cover photo
                if ($book->cover_photo) {
                    Storage::disk('public')->delete('books/' . $book->cover_photo);
                }

                $data['cover_photo'] = $image->hashName();
            }
        

        // 5. update data
            $book->update($data);


        // 6. response	
            return response()->json([
                "success" => true,
                "message" => "Book Updated",
                "data" => $book
            ], 200);
    }


    //destroy//
    public function destroy(string $id) {
        $book = Book::find($id);

        if (!$book) {
            return response()->json([
                "success" => false,
                "message" => "Resource data not found",
            ], 404);
        }

        // delete image
        if ($book->cover_photo) {
            Storage::disk('public')->delete('books/' . $book->cover_photo);
        }

        $book->delete();
        // response
        return response()->json([
            "success" => true,
            "message" => "Book Deleted",
        ], 200);
    }

}
    