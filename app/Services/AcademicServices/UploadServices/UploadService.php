<?php

namespace App\Services\AcademicServices\UploadServices;
use Illuminate\Support\Facades\Auth;

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
            'user_id' => auth()->user()->id,
            'description' => $request->description,

        ]);

        if($created){
            return true;
        }
        return false;
    }

    public function getUploads(){
        return \App\Models\Upload::with('user')
        ->join('users', 'users.id', '=', 'uploads.user_id')
        ->select('uploads.id as id', 'uploads.title', 'uploads.description', 'uploads.path', 'uploads.created_at',)
        ->where('users.role', 3)
        ->where('uploads.user_id', Auth::user()->id)
        ->orderBy('title', 'asc')
        ->get();
    }

    public function getNewUploads(){
        return \App\Models\Upload::with('user')
        ->join('users', 'users.id', '=', 'uploads.user_id')
        ->select('uploads.id as id', 'uploads.title', 'uploads.description', 'uploads.path', 'uploads.created_at',)
        ->where('users.role', 3)
        ->where('uploads.user_id', Auth::user()->id)
        ->orderBy('created_at', 'desc')
        ->get();
    }
    
    public function deleteUpload($request){
        return \App\Models\Upload::findoRFail($request->id)->delete();
    }

    public function getTrashedUploads(){
        return \App\Models\Upload::with('user')
        ->onlyTrashed()
        ->join('users', 'users.id', '=', 'uploads.user_id')
        ->select('uploads.id as id', 'uploads.title', 'uploads.description', 'uploads.path', 'uploads.created_at',)
        ->where('users.role', 3)
        ->where('uploads.user_id', Auth::user()->id)
        ->orderBy('created_at', 'desc')
        ->get();
    }

    public function restoreUpload($request){
        return \App\Models\Upload::onlyTrashed()->findoRFail($request->id)->restore();
    }

    public function permanentDeleteUpload($request){
        return \App\Models\Upload::onlyTrashed()->findoRFail($request->id)->forceDelete();
    }

}