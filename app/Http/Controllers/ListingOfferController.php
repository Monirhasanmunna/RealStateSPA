<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ListingOfferController extends Controller
{
    public function store(Listing $listing, Request $request)
    {
        $listing->offers()->create([
            'user_id' => $request->user()->id,
            'ammount' => $request->ammount,
        ]);

        return redirect()->back()->with([
            'message' => 'Offer created successfully',
        ]);
    }
}
