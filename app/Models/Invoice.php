<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Invoice extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'invoice_no',
        'seller_id',
        'narration',
        'status',
        'starred',
        'status_from_financial',
        'status_from_financial_bishop',
    ];

    public function invoiceTool()
    {
        return $this->hasMany('App\Models\InvoiceTool','invoice_id','id');
    }

    public function tools()
    {
    return $this->hasManyThrough(
        'App\Models\Tool',
        'App\Models\InvoiceTool',
        'invoice_id',
        'id',
        'id',
        'tool_id'
    );
    }

    public function toolSum()
    {
    return $this->hasManyThrough(
        'App\Models\Tool',
        'App\Models\InvoiceTool',
        'invoice_id',
        'id',
        'id',
        'tool_id'
    );
    }

    public function seller()
    {
        return $this->belongsTo('App\Models\Seller','seller_id','id');
    }
}
