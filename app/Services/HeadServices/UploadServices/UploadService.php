<?php

namespace App\Services\HeadServices\UploadServices;
use Illuminate\Support\Facades\Auth;

class UploadService
{
    /*
    |--------------------------------------------------------------------------
    | QUERIES FOR THE INVOICE
    |--------------------------------------------------------------------------
    */

    public function getAcademicUploads(){
        return \App\Models\Upload::with('user')
        ->join('users', 'users.id', '=', 'uploads.user_id')
        ->select('uploads.id as id', 'uploads.title', 'uploads.description', 'uploads.path', 'uploads.created_at',)
        ->where('users.school_id', auth()->user()->school_id)
        ->where('users.role', 3)
        ->orderBy('title', 'asc')
        ->get();
    }

    public function getAccountantUploads(){
        return \App\Models\Upload::with('user')
        ->join('users', 'users.id', '=', 'uploads.user_id')
        ->select('uploads.id as id', 'uploads.title', 'uploads.description', 'uploads.path', 'uploads.created_at',)
        ->where('users.school_id', auth()->user()->school_id)
        ->where('users.role', 5)
        ->orderBy('title', 'asc')
        ->get();
    }

    public function getProcurementUploads(){
        return \App\Models\Upload::with('user')
        ->join('users', 'users.id', '=', 'uploads.user_id')
        ->select('uploads.id as id', 'uploads.title', 'uploads.description', 'uploads.path', 'uploads.created_at',)
        ->where('users.school_id', auth()->user()->school_id)
        ->where('users.role', 6)
        ->orderBy('title', 'asc')
        ->get();
    }

}