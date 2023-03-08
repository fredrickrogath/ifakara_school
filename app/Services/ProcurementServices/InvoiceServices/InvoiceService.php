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
        return \App\Models\Invoice::with('tools', 'seller', 'toolSum')->orderBy('created_at', 'desc')->get();
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

    public function starredInvoice($request){
        return \App\Models\Invoice::find($request->id)->update([
            $request->column => !$request->data
        ]);
    }

    public function getTrashedInvoices(){
        return \App\Models\Invoice::onlyTrashed()->with('tools', 'seller', 'toolSum')->orderBy('created_at', 'desc')->get();
    }

    public function getStarredInvoices(){
        return \App\Models\Invoice::with('tools', 'seller', 'toolSum')->where('starred', true)->orderBy('created_at', 'desc')->get();
    }

    public function restoreInvoice($request){
        return \App\Models\Invoice::onlyTrashed()->findoRFail($request->id)->restore();
    }

    public function permanentDeleteInvoice($request){
        return \App\Models\Invoice::onlyTrashed()->findoRFail($request->id)->forceDelete();
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
                'count' => $tool['count'],
            ]);
        }
        return true;
    }    
}