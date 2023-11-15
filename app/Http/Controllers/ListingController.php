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
        $query = Listing::orderByDesc('id');

        if($filters['priceFrom'] ?? false){
            $query->where('price', '>=' ,$filters['priceFrom']);
        }

        if($filters['priceTo'] ?? false){
            $query->where('price', '<=' ,$filters['priceTo']);
        }

        if($filters['beds'] ?? false){
            $query->where('beds',$filters['beds']);
        }

        if($filters['baths'] ?? false){
            $query->where('baths',$filters['baths']);
        }

        if($filters['areaFrom'] ?? false){
            $query->where('area', '>=' ,$filters['areaFrom']);
        }

        if($filters['areaTo'] ?? false){
            $query->where('area', '<=' ,$filters['areaTo']);
        }

        return Inertia::render('Listing/Listing',[
            'listings'=> $query->paginate(8)->withQueryString(),
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
        return inertia::render('Listing/ListingDetails',['listing'=>$listing]);
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
