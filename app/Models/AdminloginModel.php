<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdminloginModel extends Model
{
    use HasFactory;
    protected $table = 'admin';
    protected $primaryKey='aId';
    protected $fillable = [
        'adName',
        'username',
        'password',
        'userType',
        'created_at',
        'updated_at'   
    ];
}
