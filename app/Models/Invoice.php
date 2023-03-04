<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory;

    protected $fillable = [
        'invoice_no',
        'seller_id',
        'narration',
        'status',
    ];

    public function tools()
    {
        return $this->hasMany('App\Models\InvoiceTool','invoice_id','id');
    }

    public function seller()
    {
        return $this->belongsTo('App\Models\Seller','seller_id','id');
    }
}
