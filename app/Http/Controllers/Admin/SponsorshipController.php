<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Sponsorship;
use App\Apartment;

class SponsorshipController extends Controller
{
    public function index(Apartment $apartment){
        $sponsorships = Sponsorship::all();
        return view("admin.sponsorships.index", ['apartment' => $apartment, 'sponsorships'=>$sponsorships]);
    }
}
