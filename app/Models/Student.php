<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $fillable = [
        'class_level_id',
        'first_name',
        'middle_name',
        'last_name',
        'gender',
        'from',
        'parent',
        'parent_contact',
    ];

    // public function user()
    // {
    //     // return $this->belongsTo('Model', 'foreign_key', 'owner_key'); 
    //     return $this->belongsTo('App\Models\User','user_id','id');
    // }
}
