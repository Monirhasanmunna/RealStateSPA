<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Listing extends Model
{
    use HasFactory;

    protected $fillable = ['id','user_id','beds','baths','area','city','code','street','street_no','price'];


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
        );
    }
}
