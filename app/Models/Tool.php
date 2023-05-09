<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Tool extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'price',
        'count',
        'broken',
        'user_id',
        'starred',
        'school_id',
        'description',
    ];

    public function invoices()
{
    return $this->hasManyThrough(
        'App\Models\Invoice',
        'App\Models\InvoiceTool',
        'tool_id',
        'id',
        'id',
        'invoice_id'
    );
}

}
