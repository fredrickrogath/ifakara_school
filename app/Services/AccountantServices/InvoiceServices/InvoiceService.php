<?php

namespace App\Services\AccountantServices\InvoiceServices;

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
        return \App\Models\Invoice::with('tools', 'sellers', 'toolSum', 'invoiceTool.tool')->where('school_id', auth()->user()->school_id)->orderBy('created_at', 'desc')->get();
    }

    public function getInvoicesCreation(){
        return \App\Models\AccountantInvoice::with('invoiceItems')->where('school_id', auth()->user()->school_id)->orderBy('created_at', 'desc')->get();
    }
    
    public function getInvoiceView($request){
        return \App\Models\Invoice::with('tools', 'sellers', 'toolSum', 'invoiceTool.tool')->where('id', $request->id)->orderBy('created_at', 'desc')->first();
    }

    public function createInvoice($request){

            $items = $request->items;
            $invoice = \App\Models\AccountantInvoice::create([
                'total' => $request->total,
                'school_id' => auth()->user()->school_id,
            ]);


foreach ($items as $item) {
    \App\Models\AccountantInvoiceItem::create([
        'name' => $item['name'],
        'accountant_invoice_id' => $invoice->id,
        'school_id' => auth()->user()->school_id,
        'description' => $item['description'],
        'price' => $item['price'],
    ]);
}

    return true;

    }
    
    public function acceptedInvoice(){
        return \App\Models\Invoice::with('tools', 'sellers', 'toolSum', 'invoiceTool.tool')->where('school_id', auth()->user()->school_id)->where('status_from_accountant', true)->orderBy('created_at', 'desc')->get();
    }

    public function rejectedInvoice(){
        return \App\Models\Invoice::with('tools', 'sellers', 'toolSum', 'invoiceTool.tool')->where('school_id', auth()->user()->school_id)->where('status_from_accountant', false)->orderBy('created_at', 'desc')->get();
    }

    public function acceptInvoice($request){
        return \App\Models\Invoice::find($request->id)->update([
            'status_from_accountant' => !$request->status_from_accountant,
        ]);
    }

    public function deleteInvoice($request){
        return \App\Models\Invoice::findoRFail($request->id)->delete();
    }

    public function deleteCreateInvoice($request){
        return \App\Models\AccountantInvoice::findoRFail($request->id)->delete();
    }
    
    // public function starredInvoices($request){
    //     return \App\Models\Invoice::find($request->id)->update([
    //         $request->column => !$request->data
    //     ]);
    // }

    public function starredInvoice($request){
        return \App\Models\Invoice::find($request->id)->update([
            $request->column => !$request->data
        ]);
    }

    public function getTrashedInvoices(){
        return \App\Models\Invoice::onlyTrashed()->with('tools', 'sellers', 'toolSum', 'invoiceTool.tool')->where('school_id', auth()->user()->school_id)->orderBy('created_at', 'desc')->get();
    }

    public function getTrashedCreateInvoice(){
        return \App\Models\AccountantInvoice::onlyTrashed()->with('invoiceItems')->where('school_id', auth()->user()->school_id)->orderBy('created_at', 'desc')->get();
    }

    public function getStarredInvoices(){
        return \App\Models\Invoice::with('tools', 'sellers', 'toolSum', 'invoiceTool.tool')->where('school_id', auth()->user()->school_id)->where('starred', true)->orderBy('created_at', 'desc')->get();
    }
    
    public function restoreInvoice($request){
        return \App\Models\Invoice::onlyTrashed()->findoRFail($request->id)->restore();
    }

    public function restoreCreateInvoice($request){
        return \App\Models\AccountantInvoice::onlyTrashed()->findoRFail($request->id)->restore();
    }

    public function permanentDeleteInvoice($request){
        return \App\Models\Invoice::onlyTrashed()->findoRFail($request->id)->forceDelete();
    }

    public function headDashboardGetInvoices(){
        $procurement = \App\Models\Invoice::with('tools', 'seller', 'toolSum', 'invoiceTool.tool')->where('school_id', auth()->user()->school_id)->where('status_from_accountant', false)->where('status_from_financial_accountant', false)->orderBy('created_at', 'desc')->get();
        $accountantSchool = \App\Models\Invoice::with('tools', 'seller', 'toolSum', 'invoiceTool.tool')->where('school_id', auth()->user()->school_id)->where('status_from_accountant', true)->where('status_from_financial_accountant', false)->orderBy('created_at', 'desc')->get();
        $accountantFinancial = \App\Models\Invoice::with('tools', 'seller', 'toolSum', 'invoiceTool.tool')->where('school_id', auth()->user()->school_id)->where('status_from_accountant', true)->where('status_from_financial_accountant', true)->orderBy('created_at', 'desc')->get();
        return [
            'procurement' => $procurement,
            'procurementCount' => $procurement->count(),
            'accountantSchool' => $accountantSchool,
            'accountantSchoolCount' => $accountantSchool->count(),
            'accountantFinancial' => $accountantFinancial,
            'accountantFinancialCount' => $accountantFinancial->count(),
        ];
    }


    // GET DATA FOR THE FINANCIAL ACCOUNTANT

    public function getInvoicesFinancial($request){
        return \App\Models\Invoice::with('tools', 'sellers', 'toolSum', 'invoiceTool.tool')->where('school_id', $request->school_id)->orderBy('created_at', 'desc')->get();
    }

    public function getInvoicesFinancialAll($request){
        return \App\Models\Invoice::with('tools', 'sellers', 'toolSum', 'invoiceTool.tool')->orderBy('created_at', 'desc')->get();
    }

    // public function getInvoiceView($request){
    //     return \App\Models\Invoice::with('tools', 'sellers', 'toolSum', 'invoiceTool.tool')->where('id', $request->id)->orderBy('created_at', 'desc')->first();
    // }

    // public function acceptedInvoice(){
    //     return \App\Models\Invoice::with('tools', 'sellers', 'toolSum', 'invoiceTool.tool')->where('status', true)->orderBy('created_at', 'desc')->get();
    // }

    // public function rejectedInvoice(){
    //     return \App\Models\Invoice::with('tools', 'sellers', 'toolSum', 'invoiceTool.tool')->where('status', false)->orderBy('created_at', 'desc')->get();
    // }

    // public function starredInvoice($request){
    //     return \App\Models\Invoice::find($request->id)->update([
    //         $request->column => !$request->data
    //     ]);
    // }

    // public function getTrashedInvoices(){
    //     return \App\Models\Invoice::onlyTrashed()->with('tools', 'seller', 'toolSum', 'invoiceTool.tool')->orderBy('created_at', 'desc')->get();
    // }

    // public function getStarredInvoices(){
    //     return \App\Models\Invoice::with('tools', 'seller', 'toolSum', 'invoiceTool.tool')->where('starred', true)->orderBy('created_at', 'desc')->get();
    // }

}