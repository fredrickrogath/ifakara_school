<?php

namespace App\Services\HeadServices\SchoolServices;

use Illuminate\Support\Facades\Config;

use Illuminate\Support\Facades\Hash;

use Illuminate\Support\Facades\Http;


class SchoolService
{
    /*
    |--------------------------------------------------------------------------
    | QUERIES FOR THE INVOICE
    | php artisan key:generate
    | php artisan auth:hash-passwords
    | https://github.com/spatie/laravel-backup
    |--------------------------------------------------------------------------
    */

    public function registerSchool($request){

        $validatedData = $request->validate([
            'name' => 'required|string',
        ]);
        
        $api = Hash::make(Config::get('app.key') . $request->name);

        $created = \App\Models\School::create([
            'name' => $request->name,
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

    public function getInvoices(){
        return \App\Models\Student::orderBy('created_at', 'desc')->get();
    }

    // public function getInvoiceView($request){
    //     return \App\Models\Invoice::with('tools', 'seller', 'toolSum', 'invoiceTool.tool')->where('status', true)->where('id', $request->id)->orderBy('created_at', 'desc')->first();
    // }

    // public function getStudentClasses(){
    //     return \App\Models\ClassLevel::orderBy('created_at', 'desc')->get();
    // }

    // public function getStudents(){
    //     return \App\Models\Student::orderBy('created_at', 'desc')->get();
    // }

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