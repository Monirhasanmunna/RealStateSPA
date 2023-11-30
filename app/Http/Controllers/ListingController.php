<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;

class ListingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $filters = $request->only(['priceFrom','priceTo','beds','baths','areaFrom','areaTo']);

        //use local scope
        $query = Listing::orderByDesc('id')->FiltersQuery($filters)->paginate(8)->withQueryString();

        return Inertia::render('Listing/Listing',[
            'listings'=> $query,
            'filters'=>  $filters,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return inertia::render('Listing/ListingCreate');
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
            'user_id'   => Auth::id(),
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
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $listing = Listing::find($id);
        $listing = $listing->load(['images']);
        $madeOffer = !Auth::user() ? null : $listing->offers()->byMe()->first();
        // dd($madeOffer);

        return inertia::render('Listing/ListingDetails',
        [
            'listing'=>$listing,
            'madeOffer' => $madeOffer,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $listing = Listing::find($id);
        return inertia::render('Listing/ListingEdit',['listing'=>$listing]);
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
        $listing = Listing::find($id);
        $this->authorize('delete',$listing);
        $listing->delete();
        return Redirect(route('listing.index'));
    }
}
