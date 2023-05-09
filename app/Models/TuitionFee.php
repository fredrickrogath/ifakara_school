<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TuitionFee extends Model
{
    use HasFactory;

    protected $fillable = [
        'charts_of_accounts_id',
        'user_id',
        'amount',
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
