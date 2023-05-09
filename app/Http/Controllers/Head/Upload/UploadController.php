<?php

namespace App\Http\Controllers\Head\Upload;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Services\HeadServices\UploadServices\UploadService;

class UploadController extends Controller
{
    public function __construct(){
        $this->middleware('check_screen_size');
    }
    
    //
    public function getAcademicUploads(Request $request ,UploadService $uploadService){
        $this->authorize('authorizeHead', \App\Models\User::class); 
        return response()->json(['data' => $uploadService->getAcademicUploads()]);
    }

    public function getAccountantUploads(Request $request ,UploadService $uploadService){
        $this->authorize('authorizeHead', \App\Models\User::class); 
        return response()->json(['data' => $uploadService->getAccountantUploads()]);
    }

    public function getProcurementUploads(Request $request ,UploadService $uploadService){
        $this->authorize('authorizeHead', \App\Models\User::class); 
        return response()->json(['data' => $uploadService->getProcurementUploads()]);
    }
}
