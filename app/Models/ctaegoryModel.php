<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ctaegoryModel extends Model
{
    use HasFactory;
    protected $table = 'category';
    protected $primaryKey='categoryId';
    protected $fillable = [
        'categoryName',
        'category_desc',
        'Image',
        'created_at',
        'updated_at'   
    ];
}
