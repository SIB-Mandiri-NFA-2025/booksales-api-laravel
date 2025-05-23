<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Models\Author;
use Illuminate\Support\Facades\Validator; 

class AuthorController extends Controller
{
    public function index()
    {
        $authors = Author::all();

        return response()->json([
            "success" => true,
            "message" => "Get All Authors",
            "data" => $authors,
        ], 200);

    }
    
    //store//
    public function store(Request $request) {
        // 1. validator
            $validator = Validator::make($request->all(), [
                "name" => "required|string|",
                "photo" => "required|image|mimes:jpeg,png,jpg|max:2048",
                "bio" => "required|string|"
            ]);

        // 2. check validator error
            if ($validator->fails()) {
                return response()->json([
                    "success" => false,
                    "message" => $validator->errors()
                ], 422);
            }

        // 3. upload image
            $image = $request->file('photo');
            $image->store('authors', 'public');

        // 4. insert data
            $author = Author::create([
                "name" => $request->name,
                "photo" => $image->hashName(),
                "bio" => $request->bio
            ]);
            
        // 5. response	
            return response()->json([
                "success" => true,
                "message" => "Author Created",
                "data" => $author
            ], 201);
    }

    //show//
    public function show($id) {
        $author = Author::find($id);

        if (!$author) {
            return response()->json([
                "success" => false,
                "message" => "Resource data not found",
            ], 404);
        }

        return response()->json([
            "success" => true,
            "message" => "Get Author by ID",
            "data" => $author
        ], 200);
    }

    //update//
    public function update($id, Request $request) {
        // 1. mencari data
            $author = Author::find($id);
            if (!$author) {
                return response()->json([
                    "success" => false,
                    "message" => "Resource data not found",
                ], 404);
            }

        // 2. validator
            $validator = Validator::make($request->all(), [
                "name" => "required|string|",
                "photo" => "image|mimes:jpeg,png,jpg|max:2048",
                "bio" => "required|string|"
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
                "name" => $request->name,
                "bio" => $request->bio
            ];

        // 3. handle image (upload & delete image)
            if ($request->hasFile('photo')) {
                $image = $request->file('photo');
                $image->store('authors', 'public');
            
                // update cover photo
                if ($author->photo) {
                    Storage::disk('public')->delete('authors/' . $author->photo);
                }

                $data['photo'] = $image->hashName();
            }

        // 5. update data
            $author->update($data);
            
        // 6. response	
            return response()->json([
                "success" => true,
                "message" => "Author Updated",
                "data" => $author
            ], 200);
    }


    //destroy//
    public function destroy($id) {
        $author = Author::find($id);

        if (!$author) {
            return response()->json([
                "success" => false,
                "message" => "Resource data not found",
            ], 404);
        }

        // delete image
        if ($author->photo) {
            Storage::disk('public')->delete('authors/' . $author->photo);
        }

        $author->delete();

        // response
        return response()->json([
            "success" => true,
            "message" => "Author Deleted",
        ], 200);
    }
}
    