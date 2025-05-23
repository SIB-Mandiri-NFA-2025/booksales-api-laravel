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
    
    //store//
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
    
    //show//
    public function show($id) {
        $genre = Genre::find($id);

        if (!$genre) {
            return response()->json([
                "success" => false,
                "message" => "Resource data not found",
            ], 404);
        }

        return response()->json([
            "success" => true,
            "message" => "Get Genre by ID",
            "data" => $genre
        ], 200);
    }

    //update//
    public function update($id, Request $request) {
        // 1. mencari data
            $genre = Genre::find($id);
            if (!$genre) {
                return response()->json([
                    "success" => false,
                    "message" => "Resource data not found",
                ], 404);
            }

        // 2. validator
            $validator = Validator::make($request->all(), [
                "name" => "required|string|",
                "description" => "required|string|"
            ]);

            // cek validator error
            if ($validator->fails()) {
                return response()->json([
                    "success" => false,
                    "message" => $validator->errors()
                ], 422);
            }

        // 4. update data
            $genre->update([
                "name" => $request->name,
                "description" => $request->description
            ]);
        
        // 5. response	
            return response()->json([
                "success" => true,
                "message" => "Genre Updated",
                "data" => $genre
            ], 200);
    }

    //destroy//
    public function destroy($id) {
        $genre = Genre::find($id);

        if (!$genre) {
            return response()->json([
                "success" => false,
                "message" => "Resource data not found",
            ], 404);
        }

        $genre->delete();
        
        // response
        return response()->json([
            "success" => true,
            "message" => "Genre Deleted",
        ], 200);
    }

}