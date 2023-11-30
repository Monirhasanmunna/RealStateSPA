<?php

namespace App\Http\Controllers;

use App\Models\Offer;
use Illuminate\Http\Request;

class AcceptOfferController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Offer $offer)
    {
        // dd($offer);
        $offer->update([
            'accepted_at' => now(),
        ]);

        $offer->listing->offers()->accept($offer)
            ->update([
                'rejected_at' => now()
            ]);

        return redirect()->back()->with(['message'=>'Offer Accepted']);
    }
}
