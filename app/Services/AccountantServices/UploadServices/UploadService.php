<?php

namespace App\Services\AccountantServices\UploadServices;

class UploadService
{
    /*
    |--------------------------------------------------------------------------
    | QUERIES FOR THE INVOICE
    |--------------------------------------------------------------------------
    */

    public function upload($request){
        $file = $request->file('document');
        $fileName = time() . '_' . $file->getClientOriginalName();
        $filePath = $file->storeAs('documents', $fileName, 'public');

        $created = \App\Models\Upload::create([
            'name' => $fileName,
            'path' => $filePath,

        ]);

        if($created){
            return true;
        }
        return false;
    }

    public function getInvoices(){
        return \App\Models\Invoice::with('tools', 'seller', 'toolSum')->orderBy('created_at', 'desc')->get();
    }

    public function deleteInvoice($request){
        return \App\Models\Invoice::findoRFail($request->id)->delete();
    }

    public function getTrashedInvoices(){
        return \App\Models\Invoice::onlyTrashed()->with('tools', 'seller', 'toolSum')->orderBy('created_at', 'desc')->get();
    }

    public function restoreInvoice($request){
        return \App\Models\Invoice::onlyTrashed()->findoRFail($request->id)->restore();
    }

    public function permanentDeleteInvoice($request){
        return \App\Models\Invoice::onlyTrashed()->findoRFail($request->id)->forceDelete();
    }

}