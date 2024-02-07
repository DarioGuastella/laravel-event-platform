<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function index()
    {
        $results = Event::with("user")->get();
        $data = [
            "success" => true,
            "payload" => $results
        ];
        return response()->json($data);
    }
}
