<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\Auth;

class Offer extends Model
{
    use HasFactory;

    protected $fillable = ['ammount','user_id','accepted_at','rejected_at'];

    
    public function listing() :BelongsTo
    {
        return $this->belongsTo(Listing::class);
    }

    public function bidder() :BelongsTo
    {
        return $this->belongsTo(User::class,'user_id');
    }

    public function scopeByMe(Builder $query) :Builder
    {
        return $query->where('user_id', Auth::id());
    }

    public function scopeAccept(Builder $query, Offer $offer) : Builder
    {
        return  $query->where('id' ,'!=', $offer->id);
    }
}
