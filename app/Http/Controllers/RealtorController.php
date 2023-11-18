<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Listing;

class RealtorController extends Controller
{
    public function listing(Request $request)
    {
        $filters = [
            'deleted' => $request->boolean('deleted'),
            ... $request->only(['by','order']),
        ];

        // dd($filters);

       $listings = Auth::user()->listings()->FiltersQuery($filters)->paginate(5)->withQueryString();

        return inertia('Realtor/Listing',[
            'listings' => $listings,
            'filters'  => $filters
        ]);
    }


    public function show($listing)
    {
        $listing = Listing::find($listing);
        return inertia('Realtor/ListingDetails',[
            'listing'=>$listing
        ]);
    }
}
