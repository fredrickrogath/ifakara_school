<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Invoice extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'narration',
        'school_id',
        'total',
        'starred',
        'status_from_head',
        'status_from_accountant',
        'status_from_financial_accountant',
        'status_from_financial_bishop',
        'status_from_financial_secretary',
        'status_from_financial_internalAuditor',
    ];

    public function invoiceTool()
    {
        return $this->hasMany('App\Models\InvoiceTool','invoice_id','id')->with('tool');
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

    public function sellers()
    {
        return $this->hasManyThrough(
            'App\Models\Seller',
            'App\Models\SellerInvoice',
            'invoice_id',
            'id',
            'id',
            'seller_id'
        );
    }

    public function seller()
    {
        return $this->belongsTo('App\Models\Seller','seller_id','id');
    }

}
