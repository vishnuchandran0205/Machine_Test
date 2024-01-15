<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class cartModel extends Model
{
    use HasFactory;
    protected $table = 'cart_details';
    protected $primaryKey='cartId';
    protected $fillable = [
        'stockId',
        'aId',
        'created_at',
        'updated_at'   
    ];
}
