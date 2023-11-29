<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use App\Models\ListingImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Inertia\Inertia;

class RealtorListingImageController extends Controller
{
    public function create(Listing $listing)
    {
        $listing->load(['images']);
        return Inertia::render('Realtor/Create',[
            'listing' => $listing,
        ]);
    }

    public function store(Request $request, Listing $listing)
    {
        $request->validate([
            'images.*' => 'mimes:jpeg,png,jpeg|max:5000'
        ],[
            'images.*.mimes' => 'The file should be in one of the formate: jpeg,png,jpg',
        ]);

        if($request->hasFile('images')){
            foreach ($request->file('images') as $key => $image) {
               $path = $image->store('images','public');

               $listing->images()->save(new ListingImage([
                'file_name' => $path,
               ]));
            }

            return redirect()->back();
        }
    }

    public function destroy(Listing $listing, ListingImage $image)
    {
        Storage::disk('public')->delete($image->file_name);
        $image->delete();
        return redirect()->back();
    }
}
