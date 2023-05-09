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
        'count',
        'school_id',
        'user_id',
    ];

    public function tool()
    {
        return $this->belongsTo('App\Models\Tool','tool_id','id');
    }
}
