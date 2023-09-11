<?php

namespace App\Services\SecretaryServices\SchoolServices;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Config;

class SchoolsService
{
    /*
    |--------------------------------------------------------------------------
    | QUERIES FOR THE INVOICE
    |--------------------------------------------------------------------------
    */

    // public function addStaff($request){
    //     $created = \App\Models\User::create([
    //         'name' => $request->name,
    //         'email' => $request->email,
    //         'role' => $request->identifier,
    //         'password' => Hash::make($request->password),
    //     ]);

    //     if($created){
    //         return true;
    //     }
    //     return false;
    // }

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

    public function registerSchool($request){

        // $validatedData = $request->validate([
        //     'name' => 'required|string',
        //     'email' => 'required|email|unique',
        //     'loaction' => 'required|string',
        //     'mobile' => 'required|string',
        // ]);
        
        $api = Hash::make(Config::get('app.key') . $request->email);

        $created = \App\Models\School::create([
            'name' => $request->name,
            'email' => $request->email,
            'mobile' => $request->mobile,
            'location' => $request->location,
            'api' => $api,
        ]);
        
        if($created){
            // generate unique API route name for school and store it in database
            // $apiRouteName = 'school_' . $created->name;
            
            // // return response with the generated API route name

            // $response = Http::post('http://127.0.0.1:8001/api/registerSchool', [
            //     'name' => $request->name,
            //     'api_secret_key' => $api,
            // ]);
            
            return true;
        }
        return false;
    }

    public function getSchools(){
        return \App\Models\School::orderBy('created_at', 'desc')->get();
    }

    public function getSchoolStaffs($request){
        return \App\Models\User::where('school_id', $request->school_id)->orderBy('created_at', 'desc')->get();
    }

    public function getSchoolStudents($request){
        return \App\Models\Student::with('classType')->where('school_id', $request->school_id)->orderBy('created_at', 'desc')->get();
    }

    // public function getInvoiceView($request){
    //     return \App\Models\Invoice::with('tools', 'seller', 'toolSum', 'invoiceTool.tool')->where('status', true)->where('id', $request->id)->orderBy('created_at', 'desc')->first();
    // }

    public function getDepartments(){
        return \App\Models\Department::orderBy('created_at', 'desc')->get();
    }

    public function getStudents(){
        return \App\Models\Student::orderBy('created_at', 'desc')->get();
    }

    public function getSchoolPermissions(){
        return  \App\Http\Resources\NotificationResource::collection(\App\Models\Notification::orderBy('created_at', 'desc')->get());
    }

    public function alterPermission($request){
        \App\Models\Notification::find($request->id)->update([
            'read' => true,
        ]);
        if($request->object_type == 'student'){
            \App\Models\Student::find($request->object_id)->update([
                'financial_secreatary_permission' => !$request->permission,
            ]);
        }elseif ($request->object_type !== 'student') {
            \App\Models\Student::find($request->object_id)->update([
                'financial_secreatary_permission' => !$request->permission,
            ]);
        }

        return true;
    }

    public function getComments($request){
        return \App\Models\Comment::where('notification_id', $request->id)->orderBy('created_at', 'desc')->get();
    }

    public function getSchoolPermissionsNotifications(){
        return \App\Models\Notification::where('read', false)->orderBy('created_at', 'asc')->get()->count();
    }
    
    public function sendComment($request){
        $notification = \App\Models\Notification::where('id', $request->id)->get()->first();

        $created = \App\Models\Comment::create([
            'to_role' => $notification->to_role,
            'from_role' => \App\Models\User::is_secretary,
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