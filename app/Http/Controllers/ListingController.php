<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;

class ListingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $listings = Listing::orderBy("id","DESC")->get();
        return Inertia::render('Listing',['listings'=>$listings]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return inertia::render('ListingCreate');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
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

        Listing::create([
            'beds'      => $request->beds,
            'baths'      => $request->baths,
            'area'      => $request->area,
            'city'      => $request->city,
            'code'      => $request->code,
            'street'    => $request->street,
            'street_no' => $request->street_no,
            'price'     => $request->price,
        ]);

        return Redirect(route('listing.index'));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $listing = Listing::find($id);
        return inertia::render('ListingDetails',['listing'=>$listing]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $listing = Listing::find($id);
        return inertia::render('ListingEdit',['listing'=>$listing]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
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

        Listing::find($id)->update([
            'beds'      => $request->beds,
            'baths'     => $request->baths,
            'area'      => $request->area,
            'city'      => $request->city,
            'code'      => $request->code,
            'street'    => $request->street,
            'street_no' => $request->street_no,
            'price'     => $request->price,
        ]);

        return Redirect(route('listing.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
