<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Upload extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'path',
        'title',
        'user_id',
        'school_id',
        'description',
    ];

    public function user()
    {
        return $this->belongsTo('App\Models\User','user_id','id');
    }
}
