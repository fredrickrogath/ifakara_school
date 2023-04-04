<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = [
        'to_role',
        'from_role',
        'body',
        'notification_id',
    ];

    public function notification()
    {
        return $this->belongsTo(\App\Models\Notification::class);
    }
}
