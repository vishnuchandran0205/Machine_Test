<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class stockModel extends Model
{
    use HasFactory;
    protected $table = 'stock_details';
    protected $primaryKey='stockId';
    protected $fillable = [
        'categoryId',
        'stock_price',
        'stock',
        'created_at',
        'updated_at'   
    ];
    
}
