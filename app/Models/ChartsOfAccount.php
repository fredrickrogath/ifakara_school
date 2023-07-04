<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChartsOfAccount extends Model
{
    use HasFactory;

    protected $fillable = [
        'account_type',
        'level1',
        'level2',
        'level3',
        'name',
        'user_id',
        'isSchoolFee',
        'description',
        'school_id',
        'notes',
    ];
}
