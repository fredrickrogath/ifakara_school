<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AccountantInvoice extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
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

    public function invoiceItems()
    {
        return $this->hasMany('App\Models\AccountantInvoiceItem','accountant_invoice_id','id');
    }
}