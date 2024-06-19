<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'price',
        'visible',
        'discount',
        'featured',
];


    //collegamento many to many con la tabella dei ratings
    public function ratings() {
        return $this->belongsToMany(Rating::class);
    }

     //collegamento one to many con la tabella dello user
     public function users()
     {
         return $this->belongsTo(User::class);
     }
}
