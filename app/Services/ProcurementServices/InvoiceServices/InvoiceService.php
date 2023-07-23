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
            'total' => $request->total,
            'count' => $request->count,
            'school_id' => auth()->user()->school_id,
            'description' => $request->narration,

        ]);
        if($created){
            return true;
        }
        return false;
    }

    public function getInvoices(){
        return \App\Models\Invoice::with('tools', 'sellers', 'toolSum', 'invoiceTool.tool')->where('school_id', auth()->user()->school_id)->orderBy('created_at', 'desc')->get();
    }

    public function getInvoiceView($request){
        return \App\Models\Invoice::with('tools', 'sellers', 'toolSum', 'invoiceTool.tool')->where('id', $request->id)->orderBy('created_at', 'desc')->first();
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
        return \App\Models\Invoice::onlyTrashed()->with('tools', 'sellers', 'toolSum', 'invoiceTool.tool')->where('school_id', auth()->user()->school_id)->orderBy('created_at', 'desc')->get();
    }

    public function getStarredInvoices(){
        return \App\Models\Invoice::with('tools', 'sellers', 'toolSum', 'invoiceTool.tool')->where('school_id', auth()->user()->school_id)->where('starred', true)->orderBy('created_at', 'desc')->get();
    }

    public function restoreInvoice($request){
        return \App\Models\Invoice::onlyTrashed()->findoRFail($request->id)->restore();
    }

    public function permanentDeleteInvoice($request){
        return \App\Models\Invoice::onlyTrashed()->findoRFail($request->id)->forceDelete();
    }

    public function headDashboardGetInvoices(){
        $procurement = \App\Models\Invoice::with('tools', 'sellers', 'toolSum', 'invoiceTool.tool')->where('school_id', auth()->user()->school_id)->where('status_from_accountant', false)->where('status_from_financial_accountant', false)->orderBy('created_at', 'desc')->get();
        $accountantSchool = \App\Models\Invoice::with('tools', 'sellers', 'toolSum', 'invoiceTool.tool')->where('school_id', auth()->user()->school_id)->where('status_from_accountant', true)->where('status_from_financial_accountant', false)->orderBy('created_at', 'desc')->get();
        $accountantFinancial = \App\Models\Invoice::with('tools', 'sellers', 'toolSum', 'invoiceTool.tool')->where('school_id', auth()->user()->school_id)->where('status_from_accountant', true)->where('status_from_financial_accountant', true)->orderBy('created_at', 'desc')->get();
        return [
            'procurement' => $procurement,
            'procurementCount' => $procurement->count(),
            'accountantSchool' => $accountantSchool,
            'accountantSchoolCount' => $accountantSchool->count(),
            'accountantFinancial' => $accountantFinancial,
            'accountantFinancialCount' => $accountantFinancial->count(),
        ];
    }
    
    public function getInvoiceDashboardData($request){
        // $request->school_id;
        $procurement = \App\Models\Invoice::with('tools', 'sellers', 'toolSum', 'invoiceTool.tool')->where('school_id', $request->school_id)->where('status_from_accountant', false)->where('status_from_financial_accountant', false)->orderBy('created_at', 'desc')->get();
        $accountantSchool = \App\Models\Invoice::with('tools', 'sellers', 'toolSum', 'invoiceTool.tool')->where('school_id', $request->school_id)->where('status_from_accountant', true)->where('status_from_financial_accountant', false)->orderBy('created_at', 'desc')->get();
        $accountantFinancial = \App\Models\Invoice::with('tools', 'sellers', 'toolSum', 'invoiceTool.tool')->where('school_id', $request->school_id)->where('status_from_accountant', true)->where('status_from_financial_accountant', true)->orderBy('created_at', 'desc')->get();
        return [
            'procurement' => $procurement,
            'procurementCount' => $procurement->count(),
            'accountantSchool' => $accountantSchool,
            'accountantSchoolCount' => $accountantSchool->count(),
            'accountantFinancial' => $accountantFinancial,
            'accountantFinancialCount' => $accountantFinancial->count(),
        ];
    }

    public function getInvoiceDashboardDataToFinancial($request){
        // $request->school_id;
        $procurement = \App\Models\Invoice::with('tools', 'seller', 'toolSum', 'invoiceTool.tool')->where('school_id', $request->school_id)->where('status_from_accountant', false)->where('status_from_financial_accountant', false)->orderBy('created_at', 'desc')->get();
        $accountantSchool = \App\Models\Invoice::with('tools', 'seller', 'toolSum', 'invoiceTool.tool')->where('school_id', $request->school_id)->where('status_from_accountant', true)->where('status_from_financial_accountant', false)->orderBy('created_at', 'desc')->get();
        $accountantFinancial = \App\Models\Invoice::with('tools', 'seller', 'toolSum', 'invoiceTool.tool')->where('school_id', $request->school_id)->where('status_from_accountant', true)->where('status_from_financial_accountant', true)->orderBy('created_at', 'desc')->get();
        return [
            'procurement' => $procurement,
            'procurementCount' => $procurement->count(),
            'accountantSchool' => $accountantSchool,
            'accountantSchoolCount' => $accountantSchool->count(),
            'accountantFinancial' => $accountantFinancial,
            'accountantFinancialCount' => $accountantFinancial->count(),
        ];
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
            // 'invoice_no' => 0000,
            // 'seller_id' => 1,
            'total' => $request->total,
            'school_id' => auth()->user()->school_id,
            'narration' => '...'
        ]);

        foreach ($request->tools as $key => $tool) {
            \App\Models\InvoiceTool::create([
                'invoice_id' => $invoice->id,
                'tool_id' => $tool['id'],
                'user_id' => auth()->user()->id,
                'school_id' => auth()->user()->school_id,
                'count' => $tool['count'],
            ]);
        }

        foreach ($request->sellers as $key => $seller) {
            \App\Models\SellerInvoice::create([
                'seller_id' => $seller,
                'invoice_id' => $invoice->id,
                'user_id' => auth()->user()->id,
                'school_id' => auth()->user()->school_id,
            ]);
        }
        return true;
    }    
}