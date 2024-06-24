<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sponsor extends Model
{
    use HasFactory;

    protected $fillable = [
        'image',
        'name',
        'fund',  
        ];


  //collegamento one to many con la tabella dello user
  public function users()
  {
      return $this->belongsTo(User::class);
  }
  
}