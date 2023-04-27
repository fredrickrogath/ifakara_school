<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    use HasFactory;

    protected $fillable = [
        'object_id',
        'object_type',
        'to_role',
        'from_role',
        'school_id',
        'read',
    ];

    public function comments()
    {
        return $this->hasMany(\App\Models\Comment::class);
    }
}
