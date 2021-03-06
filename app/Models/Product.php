<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $primaryKey = 'id';


    protected $fillable = [
        'name', 'detail', 'qty'
    ];

    public function RequestProduct()
    {
        return $this->belongsTo('App/RequestProduct', 'user_id', 'id');
    }
}
