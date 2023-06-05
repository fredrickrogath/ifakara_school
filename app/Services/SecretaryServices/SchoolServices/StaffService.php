<?php

namespace App\Services\SecretaryServices\SchoolServices;
use Illuminate\Support\Facades\Hash;

class StaffService
{
    /*
    |--------------------------------------------------------------------------
    | QUERIES FOR THE INVOICE
    |--------------------------------------------------------------------------
    */

    public function addStaff($request){
        $created = \App\Models\User::create([
            'name' => $request->name,
            'email' => $request->email,
            'role' => $request->identifier,
            'school_id' => $request->schoolId,
            'password' => Hash::make($request->password),
        ]);

        if($created){
            return true;
        }
        return false;
    }

    public function getStaffs(){
        return \App\Models\User::orderBy('created_at', 'desc')->get();
    }

    // public function getInvoiceView($request){
    //     return \App\Models\Invoice::with('tools', 'seller', 'toolSum', 'invoiceTool.tool')->where('status', true)->where('id', $request->id)->orderBy('created_at', 'desc')->first();
    // }

    public function getDepartments($request){
        return \App\Models\Department::orderBy('created_at', 'desc')->get();
    }

    // public function getDepartments($request){
    //     return \App\Models\Department::where('school_id', $request->schoolId)->orderBy('created_at', 'desc')->get();
    // }

    public function getStudents(){
        return \App\Models\Student::orderBy('created_at', 'desc')->get();
    }

    // public function acceptInvoice($request){
    //     return \App\Models\Invoice::find($request->id)->update([
    //         'status_from_financial' => !$request->status_from_financial,
    //     ]);
    // }

    // public function deleteInvoice($request){
    //     return \App\Models\Invoice::findoRFail($request->id)->delete();
    // }

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

    // public function getStarredInvoices(){
    //     return \App\Models\Invoice::with('tools', 'seller', 'toolSum', 'invoiceTool.tool')->where('starred', true)->where('status', true)->orderBy('created_at', 'desc')->get();
    // }

    // public function restoreInvoice($request){
    //     return \App\Models\Invoice::onlyTrashed()->findoRFail($request->id)->restore();
    // }

    // public function permanentDeleteInvoice($request){
    //     return \App\Models\Invoice::onlyTrashed()->findoRFail($request->id)->forceDelete();
    // }
}