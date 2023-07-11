<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EntryStudent extends Model
{
    use HasFactory;

    protected $fillable = [
        'student_id',
        'entry_id',
        'school_id',
    ];
}
