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
        'narration',
        
    ];
}
