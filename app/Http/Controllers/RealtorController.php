<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RealtorController extends Controller
{
    public function listing()
    {
        $listings = Auth::user()->listings;

        return inertia('Realtor/Listing',[
            'listings' => $listings
        ]);
    }
}
