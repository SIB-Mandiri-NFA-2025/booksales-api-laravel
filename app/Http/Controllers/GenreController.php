<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Genre;
use Illuminate\Support\Facades\Validator; 

class GenreController extends Controller
{
    public function index()
    {
        $genres = Genre::all();

        return response()->json([
            "success" => true,
            "message" => "Get All Genres",
            "data" => $genres,
        ], 200);
    }
    
    public function store(Request $request) {
        // 1. validator
            $validator = Validator::make($request->all(), [
                "name" => "required|string|",
                "description" => "required|string|"
            ]);

        // 2. check validator error
            if ($validator->fails()) {
                return response()->json([
                    "success" => false,
                    "message" => $validator->errors()
                ], 422);
            }

        // 3. insert data
            $genre = Genre::create([
                "name" => $request->name,
                "description" => $request->description
            ]);
        
        // 4. response	
            return response()->json([
                "success" => true,
                "message" => "Genre Created",
                "data" => $genre
            ], 201);
    }

}