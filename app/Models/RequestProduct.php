<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RequestProduct extends Model
{
    use HasFactory;

    protected $primaryKey = 'id';


    protected $fillable = [
        'user_id', 'quantity', 'product_id', 'remarks'
    ];
}
