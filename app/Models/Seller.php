<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Seller extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'location',
        'mobile',
        'user_id',
        'school_id',
        'email',
        'description',
        'path',
        'file',
    ];
}
