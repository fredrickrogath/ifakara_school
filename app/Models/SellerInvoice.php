<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SellerInvoice extends Model
{
    use HasFactory;

    protected $fillable = [
        'seller_id',
        'school_id',
        'invoice_id',
        'user_id',
    ];
}
