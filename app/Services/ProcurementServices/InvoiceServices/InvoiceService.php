<?php

namespace App\Services\ProcurementServices\InvoiceServices;

class InvoiceService
{
    /*
    |--------------------------------------------------------------------------
    | QUERIES FOR THE INVOICE
    |--------------------------------------------------------------------------
    */

    public function addInvoice($request){
        $created = \App\Models\Invoice::create([
            'name' => $request->name,
            'price' => $request->price,
            'count' => $request->count,
            'description' => $request->narration,

        ]);
        if($created){
            return true;
        }
        return false;
    }

    public function getInvoices(){
        return \App\Models\Invoice::orderBy('created_at', 'desc')->get();
    }

    public function updateInvoice($request){
        return \App\Models\Invoice::find($request->id)->update([
            $request->column => $request->data
        ]);
    }

    public function deleteInvoice($request){
        return \App\Models\Invoice::findoRFail($request->id)->delete();
    }

    public function starredInvoices($request){
        return \App\Models\Invoice::find($request->id)->update([
            $request->column => !$request->data
        ]);
    }

    /*
    |--------------------------------------------------------------------------
    | QUERIES FOR THE INVOICE GENERATION
    |--------------------------------------------------------------------------
    */

    public function getTools(){
        return \App\Http\Resources\ToolResource::collection(\App\Models\Tool::get());
    }

    public function getSellers(){
        return \App\Http\Resources\SellerResource::collection(\App\Models\Seller::get());
    }

    public function submitInvoice($request){

        $invoice = \App\Models\Invoice::create([
            'invoice_no' => 0000,
            'seller_id' => $request->sellerId,
            'narration' => '...'
        ]);

        foreach ($request->tools as $key => $tool) {
            \App\Models\InvoiceTool::create([
                'invoice_id' => $invoice->id,
                'tool_id' => $tool['id'],
            ]);
        }
        return true;
    }    
}