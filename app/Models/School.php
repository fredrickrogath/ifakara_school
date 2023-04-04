<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class School extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'logo_path',
        'api',
        'email',
        'location',
        'mobile',
    ];

    public function comments()
    {
        return $this->hasManyThrough(
            'App\Models\Comment',
            'App\Models\Notification',
            'school_id', // Foreign key on the notifications table
            'notification_id', // Foreign key on the comments table
            'id', // Local key on the schools table
            'object_id' // Local key on the notifications table
        )->where('object_type', 'App\Models\Student');
    }
}
