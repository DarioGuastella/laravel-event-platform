<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    public function index()
    {
        $results = Tag::all();
        $data = [
            "success" => true,
            "payload" => $results
        ];
        return response()->json($data);
    }
}
