<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ListingImage extends Model
{
    use HasFactory;

    protected $fillable = ['file_name'];
    protected $appends = ['src'];


    public function getSrcAttribute()
    {
        return asset("storage/{$this->file_name}");
    }


    public function listing()
    {
        return $this->belongsTo(Listing::class);
    }
}
