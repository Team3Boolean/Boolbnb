<?php

namespace App\Http\Controllers\Api;

use App\Sponsorship;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SponsorshipController extends Controller
{
    public function index(){

        $sponsorships = Sponsorship::all();

        return response()->json([
            "succes" => true,
            "results" => $sponsorships
        ]);
    }
}
