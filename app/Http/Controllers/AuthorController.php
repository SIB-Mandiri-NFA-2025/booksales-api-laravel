<?php

namespace App\Http\Controllers;

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
}
    