<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Listing;
use Inertia\Inertia;

class RealtorController extends Controller
{
    public function listing(Request $request)
    {
        $filters = [
            'deleted' => $request->boolean('deleted'),
            ... $request->only(['by','order']),
        ];

       $listings = Auth::user()->listings()->FiltersQuery($filters)->paginate(5)->withQueryString();

        return Inertia::render('Realtor/Listing',[
            'listings' => $listings,
            'filters'  => $filters
        ]);
    }


    public function show($listing)
    {
        $listing = Listing::find($listing)->load(['images']);
        return inertia('Realtor/ListingDetails',[
            'listing'=>$listing
        ]);
    }

    public function edit($listing)
    {
        $listing = Listing::find($listing);
        return inertia('Realtor/ListingEdit',[
            'listing'=>$listing
        ]);
    }


    public function update(Request $request, string $listing)
    {
        $request->validate([
            'beds'      => 'required',
            'baths'     => 'required',
            'area'      => 'required',
            'city'      => 'required',
            'code'      => 'required',
            'street'    => 'required',
            'street_no' => 'required',
            'price'     => 'required',
        ]);

        Listing::find($listing)->update([
            'beds'      => $request->beds,
            'baths'     => $request->baths,
            'area'      => $request->area,
            'city'      => $request->city,
            'code'      => $request->code,
            'street'    => $request->street,
            'street_no' => $request->street_no,
            'price'     => $request->price,
        ]);

        return Redirect(route('realtor.listing'));
    }


    public function destroy(string $listing)
    {
        $listing = Listing::find($listing);
        $this->authorize('delete',$listing);
        $listing->delete();
        return Redirect(route('realtor.listing'));
    }
}
