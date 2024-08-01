<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lead extends Model
{
    use HasFactory;

    protected $fillable = ['customer_name', 'customer_surname', 'customer_email','customer_address','customer_phone','message','total_price'];
}
 /* $table->string('customer_name');
            $table->string('customer_surname');
            $table->string('customer_email')->unique();
            $table->string('customer_address');
            $table->string('customer_phone');
            $table->text('message')->nullable();
            $table->decimal('total_price',5,2);*/