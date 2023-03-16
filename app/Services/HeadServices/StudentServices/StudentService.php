<?php

namespace App\Services\HeadServices\StudentServices;

class StudentService
{
    /*
    |--------------------------------------------------------------------------
    | QUERIES FOR THE INVOICE
    |--------------------------------------------------------------------------
    */

    public function addStudent($request){
        $created = \App\Models\Student::create([
            'class_level_id' => $request->classLevel,
            'first_name' => $request->firstName,
            'middle_name' => $request->middleName,
            'last_name' => $request->lastName,
            'gender' => $request->gender,
            'from' => $request->location,
            'parent' => $request->parent,
            'parent_contact' => $request->contact,
        ]);

        if($created){
            return true;
        }
        return false;
    }

    public function getInvoices(){
        return \App\Models\Student::orderBy('created_at', 'desc')->get();
    }

    // public function getInvoiceView($request){
    //     return \App\Models\Invoice::with('tools', 'seller', 'toolSum', 'invoiceTool.tool')->where('status', true)->where('id', $request->id)->orderBy('created_at', 'desc')->first();
    // }

    public function getStudentClasses(){
        return \App\Models\ClassLevel::orderBy('created_at', 'desc')->get();
    }

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