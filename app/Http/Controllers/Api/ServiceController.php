<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Service;

class ServiceController extends Controller
{
    public function index() {
        return response()->json([
            "success" => true,
            "results" => Service::all(),
        ]);
    }
}
