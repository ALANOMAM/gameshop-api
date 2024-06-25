<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;

    protected $fillable = [
        'image',
        'description',
        'link',
        ];

  //collegamento one to many con la tabella dello user
  public function users()
  {
      return $this->belongsTo(User::class);
  }

}
