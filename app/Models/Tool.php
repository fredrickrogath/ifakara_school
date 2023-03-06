<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tool extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'price',
        'count',
        'starred',
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
