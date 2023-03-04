<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InvoiceTool extends Model
{
    use HasFactory;

    protected $fillable = [
        'invoice_id',
        'tool_id',
    ];

    public function tool()
    {
        return $this->belongsTo('App\Models\Tool','invoice_id','id');
    }
}
