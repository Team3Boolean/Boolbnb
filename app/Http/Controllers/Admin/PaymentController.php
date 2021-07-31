<?php

namespace App\Http\Controllers\Admin;

use App\Apartment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PaymentController extends Controller
{
    public function index(Apartment $apartment){

        dump($apartment);
        return;
        return view('admin.payments.index');
    }
}
