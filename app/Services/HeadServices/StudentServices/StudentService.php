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
            'school_id' => auth()->user()->school_id,
        ]);

        if($created){
            return true;
        }
        return false;
    }

    public function getInvoices(){
        return \App\Models\Invoice::with('tools', 'sellers', 'toolSum', 'invoiceTool.tool')->where('school_id', auth()->user()->school_id)->orderBy('created_at', 'desc')->get();
    }

    public function getStudentPayments(){
        $currentYear = date('Y');
        return \App\Models\Student::with(['entries'])->where('school_id', auth()->user()->school_id)->whereYear('created_at', $currentYear)->orderBy('created_at', 'desc')->get();
    }

    // public function getInvoiceView($request){
    //     return \App\Models\Invoice::with('tools', 'seller', 'toolSum', 'invoiceTool.tool')->where('status', true)->where('id', $request->id)->orderBy('created_at', 'desc')->first();
    // }

    public function getStudentClasses(){
        return \App\Models\ClassLevel::where('school_id', auth()->user()->school_id)->orderBy('created_at', 'desc')->get();
    }

    public function getStudents(){
        return \App\Models\Student::where('school_id', auth()->user()->school_id)->orderBy('first_name', 'asc')->get();
    }

    public function getStudentsNew(){
        return \App\Models\Student::where('school_id', auth()->user()->school_id)->orderBy('created_at', 'desc')->get();
    }

    public function headDashboardGetStudents(){
        $totalStudents = \App\Models\Student::where('school_id', auth()->user()->school_id)->orderBy('created_at', 'desc')->get();
        $paidStudents = \App\Models\Student::with('entries')->where('school_id', auth()->user()->school_id)->get();
        return [
            'totalStudents' => $totalStudents->count(),
            'paidStudents' => $paidStudents,
        ];
    }
    
    public function getStudent($request){
        return \App\Models\Student::where('id', $request->studentId)->get()->first();
    }

    // public function getComments($request){
    //     $notification = \App\Models\Notification::with('comments')->where('object_id', $request->id)->get()->first();
    // return $notification;
    // }

    public function getComments($request){
        $notification = \App\Models\Notification::with(['comments' => function ($query) {
            $query->orderBy('created_at', 'desc');
        }])
        ->where('school_id', auth()->user()->school_id)
        ->where('object_id', $request->id)
        ->get()
        ->first();
        return $notification;
    }

    public function editStudent($request){
        return \App\Models\Student::find($request->studentId)->update([
            'class_level_id' => $request->class_level_id,
            'first_name' => $request->first_name,
            'middle_name' => $request->middle_name,
            'last_name' => $request->last_name,
            'gender' => $request->gender,
            'from' => $request->from,
            'parent' => $request->parent,
            'parent_contact' => $request->parent_contact,
            'school_id' => auth()->user()->school_id,
        ]);
    }

    public function sendComment($request){
        $notification = \App\Models\Notification::where('id', $request->id)->get()->first();
        
        $created = \App\Models\Comment::create([
            'to_role' => \App\Models\User::is_secretary,
            'from_role' => \App\Models\User::is_head,
            'body' => $request->body,
            'notification_id' => $notification->id,
        ]);

        if($created){
            return true;
        }else{
            return false;
        }
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