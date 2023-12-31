<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;

class Listing extends Model
{
    use HasFactory, SoftDeletes ;

    protected $fillable = ['id','user_id','beds','baths','area','city','code','street','street_no','price'];

    protected $sortable = ['price', 'created_at'];

    //local scopes
    public function scopeFiltersQuery(Builder $query, array $filters)
    {
       return $query->when(
            $filters['priceFrom'] ?? false,
            fn ($query, $value) => $query->where('price', '>=' ,$value)
        )->when(
            $filters['priceTo'] ?? false,
            fn ($query, $value) => $query->where('price', '<=' ,$value)
        )->when(
            $filters['beds'] ?? false,
            fn ($query, $value) => $query->where('beds',$value)
        )->when(
            $filters['baths'] ?? false,
            fn ($query, $value) => $query->where('baths', $value)
        )->when(
            $filters['areaFrom'] ?? false,
            fn ($query, $value) => $query->where('area', '>=' , $value)
        )->when(
            $filters['areaTo'] ?? false,
            fn ($query, $value) => $query->where('area', '<=' , $value)
        )->when(
            $filters['deleted'] ?? false,
            fn ($query, $value) => $query->withTrashed()
        )->when(
            $filters['by'] ?? false,
            fn($query, $value) => 
            !in_array($value, $this->sortable) ? $query : $query->orderBy($value, $filters['order'] ?? 'desc')
        ); 
    }

    public function scopeWithoutSold(Builder $query) : Builder
    {
        return $query->doesntHave('offers')
                ->orWhereHas('offers',
                 fn(Builder $query) => $query->whereNull('accepted_at')
                ->whereNull('rejected_at')
            );
    }


    public function images()
    {
        return $this->HasMany(ListingImage::class,'listing_id');
    }

    public function offers() :HasMany
    {
        return $this->hasMany(Offer::class);
    }

}
