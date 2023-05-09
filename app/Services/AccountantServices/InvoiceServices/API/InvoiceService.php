<?php

namespace App\Services\AccountantServices\InvoiceServices\API;

class InvoiceService
{
    /*
    |--------------------------------------------------------------------------
    | QUERIES FOR THE INVOICE
    |--------------------------------------------------------------------------
    */

    // public function addInvoice($request){
    //     $created = \App\Models\Invoice::create([
    //         'name' => $request->name,
    //         'price' => $request->price,
    //         'count' => $request->count,
    //         'description' => $request->narration,

    //     ]);
    //     if($created){
    //         return true;
    //     }
    //     return false;
    // }

    public function getInvoices(){
        return \App\Models\Invoice::with('tools', 'seller', 'toolSum', 'invoiceTool.tool')->orderBy('created_at', 'desc')->get();
    }

    public function getInvoiceView($request){
        return \App\Models\Invoice::with('tools', 'seller', 'toolSum', 'invoiceTool.tool')->where('id', $request->id)->orderBy('created_at', 'desc')->first();
    }

    public function acceptedInvoice(){
        return \App\Models\Invoice::with('tools', 'seller', 'toolSum', 'invoiceTool.tool')->where('status_from_financial', true)->orderBy('created_at', 'desc')->get();
    }

    public function rejectedInvoice(){
        return \App\Models\Invoice::with('tools', 'seller', 'toolSum', 'invoiceTool.tool')->where('status_from_financial', false)->orderBy('created_at', 'desc')->get();
    }

    public function getTrashedInvoices(){
        return \App\Models\Invoice::onlyTrashed()->with('tools', 'seller', 'toolSum', 'invoiceTool.tool')->orderBy('created_at', 'desc')->get();
    }

    public function acceptInvoice($request){
        return \App\Models\Invoice::find($request->id)->update([
            'status_from_financial' => !$request->status_from_financial,
        ]);
    }

    public function deleteInvoice($request){
        return \App\Models\Invoice::findoRFail($request->id)->delete();
    }

    // public function starredInvoices($request){
    //     return \App\Models\Invoice::find($request->id)->update([
    //         $request->column => !$request->data
    //     ]);
    // }

    // public function starredInvoice($request){
    //     return \App\Models\Invoice::find($request->id)->update([
    //         $request->column => !$request->data
    //     ]);
    // }

    // public function getTrashedInvoices(){
    //     return \App\Models\Invoice::onlyTrashed()->with('tools', 'seller', 'toolSum', 'invoiceTool.tool')->orderBy('created_at', 'desc')->get();
    // }

    public function getStarredInvoices(){
        return \App\Models\Invoice::with('tools', 'seller', 'toolSum', 'invoiceTool.tool')->where('starred', true)->where('status', true)->orderBy('created_at', 'desc')->get();
    }

    // public function restoreInvoice($request){
    //     return \App\Models\Invoice::onlyTrashed()->findoRFail($request->id)->restore();
    // }

    // public function permanentDeleteInvoice($request){
    //     return \App\Models\Invoice::onlyTrashed()->findoRFail($request->id)->forceDelete();
    // }

}