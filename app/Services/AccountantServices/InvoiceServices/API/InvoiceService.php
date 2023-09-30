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

    // public function getInvoices(){
    //     return \App\Models\Invoice::with('tools', 'sellers', 'toolSum', 'invoiceTool.tool')->orderBy('created_at', 'desc')->get();
    // }

    public function getStudentPayments($request){
        $currentYear = date('Y');
        return \App\Models\Student::with(['entries','classType'])->where('school_id', $request->school_id)->whereYear('created_at', $currentYear)->orderBy('created_at', 'desc')->get();
    }

    public function getSpecificStudent($request){
        // $currentYear = date('Y');
        return \App\Models\Student::with(['entries'])->where('id', $request->id)->orderBy('created_at', 'desc')->first();
    }

    public function getStudentClasses($request){
        return \App\Models\ClassLevel::where('school_id', $request->school_id)->orderBy('created_at', 'desc')->get();
    }

    public function getInvoiceView($request){
        return \App\Models\Invoice::with('tools', 'sellers', 'toolSum', 'invoiceTool.tool')->where('id', $request->id)->orderBy('created_at', 'desc')->first();
    }

    public function getInvoicesCreation($request){
        return \App\Models\AccountantInvoice::with('invoiceItems')->where('school_id', $request->school_id)->orderBy('created_at', 'desc')->get();
    }

    public function getInvoiceCreation($request){
        return \App\Models\AccountantInvoice::with('invoiceItems')->findOrFail($request->id);
    }
    
    public function getInvoicesCreationAll($request){
        return \App\Models\AccountantInvoice::with('invoiceItems')->orderBy('created_at', 'desc')->get();
    }
    
    public function deleteCreateInvoice($request){
        return \App\Models\AccountantInvoice::findoRFail($request->id)->delete();
    }

    public function getTrashedCreateInvoice($request){
        return \App\Models\AccountantInvoice::onlyTrashed()->with('invoiceItems')->where('school_id', $request->school_id)->orderBy('created_at', 'desc')->get();
    }

    public function restoreCreateInvoice($request){
        return \App\Models\AccountantInvoice::onlyTrashed()->findoRFail($request->id)->restore();
    }
    
    public function acceptedInvoice($request){
        return \App\Models\Invoice::with('tools', 'sellers', 'toolSum', 'invoiceTool.tool')->where('school_id', $request->school_id)->where('status_from_financial_accountant', true)->orderBy('created_at', 'desc')->get();
    }

    public function rejectedInvoice($request){
        return \App\Models\Invoice::with('tools', 'sellers', 'toolSum', 'invoiceTool.tool')->where('school_id', $request->school_id)->where('status_from_financial_accountant', false)->orderBy('created_at', 'desc')->get();
    }

    public function getTrashedInvoices($request){
        return \App\Models\Invoice::onlyTrashed()->with('tools', 'sellers', 'toolSum', 'invoiceTool.tool')->where('school_id', $request->school_id)->orderBy('created_at', 'desc')->get();
    }

    public function acceptInvoice($request){
        return \App\Models\Invoice::find($request->id)->update([
            'status_from_financial_accountant' => !$request->status_from_financial_accountant,
        ]);
    }

    public function verifyInvoiceCreation($request){
        return \App\Models\AccountantInvoice::find($request->id)->update([
            'status_from_financial_accountant' => !$request->status_from_financial_accountant
        ]);
    }

    public function verifyInvoiceCreationBishop($request){
        return \App\Models\AccountantInvoice::find($request->id)->update([
            'status_from_financial_bishop' => !$request->status_from_financial_bishop
        ]);
    }

    public function verifyInvoiceBishop($request){
        return \App\Models\Invoice::find($request->id)->update([
            'status_from_financial_bishop' => !$request->status_from_financial_bishop
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

    public function getStarredInvoices($request){
        return \App\Models\Invoice::with('tools', 'sellers', 'toolSum', 'invoiceTool.tool')->where('school_id', $request->school_id)->where('starred', true)->where('status_from_accountant', true)->orderBy('created_at', 'desc')->get();
    }

    public function getLegerEntries($request){
        return \App\Models\Entry::with('chartOfAccount', 'user')->where('school_id',  $request->school_id)->orderBy('created_at', 'desc')->get();
    }

    // public function restoreInvoice($request){
    //     return \App\Models\Invoice::onlyTrashed()->findoRFail($request->id)->restore();
    // }

    // public function permanentDeleteInvoice($request){
    //     return \App\Models\Invoice::onlyTrashed()->findoRFail($request->id)->forceDelete();
    // }

}