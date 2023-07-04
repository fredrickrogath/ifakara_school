<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Entry extends Model
{
    use HasFactory;

    protected $fillable = [
        'charts_of_accounts_id',
        'user_id',
        'level_1',
        'level_2',
        'level_3',
        'student_id',
        'school_id',
        'narration',
    ];

    public function user()
    {
        return $this->belongsTo('App\Models\User','user_id','id');
    }

    public function chartOfAccount()
    {
        return $this->belongsTo('App\Models\ChartsOfAccount','charts_of_accounts_id','id');
    }
}
