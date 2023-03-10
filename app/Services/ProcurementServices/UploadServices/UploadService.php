<?php

namespace App\Services\ProcurementServices\UploadServices;

class UploadService
{
    /*
    |--------------------------------------------------------------------------
    | QUERIES FOR THE INVOICE
    |--------------------------------------------------------------------------
    */

    public function upload($request){
        $file = $request->file('file');
        $fileName = time() . '_' . $file->getClientOriginalName();
        $filePath = $file->storeAs('documents', $fileName, 'public');

        $created = \App\Models\Upload::create([
            'name' => $fileName,
            'path' => $filePath,
            'title' => $request->title,
            'description' => $request->description,

        ]);

        if($created){
            return true;
        }
        return false;
    }

    public function getUploads(){
        return \App\Models\Upload::orderBy('title', 'asc')->get();
    }

    public function getNewUploads(){
        return \App\Models\Upload::orderBy('created_at', 'desc')->get();
    }
    
    public function deleteUpload($request){
        return \App\Models\Upload::findoRFail($request->id)->delete();
    }

    public function getTrashedUploads(){
        return \App\Models\Upload::onlyTrashed()->orderBy('title', 'asc')->get();
    }

    public function restoreUpload($request){
        return \App\Models\Upload::onlyTrashed()->findoRFail($request->id)->restore();
    }

    public function permanentDeleteUpload($request){
        return \App\Models\Upload::onlyTrashed()->findoRFail($request->id)->forceDelete();
    }

}