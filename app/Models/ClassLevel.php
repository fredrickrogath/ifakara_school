<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClassLevel extends Model
{
    use HasFactory;

    protected $fillable = [
        'class_level',
        'school_id',
    ];

    public function students() {
        return $this->hasOne(\App\Models\Student::class, 'class_level_id', 'id');
    }
    
}
