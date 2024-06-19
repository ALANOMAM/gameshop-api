<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    use HasFactory;

    protected $fillable = [
            'name',
            'description',
            'price',
            'visible',
            'discount',
            'special_category',
    ];
     
    //this sets the visible and special category to be true by default
    //this default value will be overwritten once we modify our form
    /*protected $attributes = [
        'visible' => true,
        'special_category' => true,
    ];*/


    //collegamento one to many con la tabella dello user
    public function users()
    {
        return $this->belongsTo(User::class);
    }


}
