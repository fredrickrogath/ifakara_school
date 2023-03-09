<?php

namespace App\Http\Controllers\Procurement\Upload;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Services\ProcurementServices\UploadServices\UploadService;

class UploadController extends Controller
{
    //
    public function upload(Request $request ,UploadService $uploadService){
        $this->authorize('authorizeProcurement', \App\Models\User::class);
        event(new \App\Events\NewPostPublished('created'));
        return response()->json(['data' => $uploadService->upload($request)]);
    }

    public function getUploads(Request $request ,UploadService $uploadService){
        $this->authorize('authorizeProcurement', \App\Models\User::class); 
        return response()->json(['data' => $uploadService->getUploads()]);
    }

    // public function getStarredTools(Request $request ,UploadService $uploadService){
    //     $this->authorize('authorizeProcurement', \App\Models\User::class); 
    //     return response()->json(['data' => $uploadService->getStarredTools()]);
    // }

    // public function getTrashedTools(Request $request ,UploadService $uploadService){
    //     $this->authorize('authorizeProcurement', \App\Models\User::class); 
    //     return response()->json(['data' => $uploadService->getTrashedTools()]);
    // }
    
    // public function updateTools(Request $request, uploadService $uploadService){
    //     $this->authorize('authorizeProcurement', \App\Models\User::class);
    //     event(new \App\Events\NewPostPublished('created'));
    //     return response()->json(['data' => $uploadService->updateTools($request)]);
    // }

    // public function deleteTools(Request $request, UploadService $uploadService){
    //     $this->authorize('authorizeProcurement', \App\Models\User::class);
    //     event(new \App\Events\NewPostPublished('created'));
    //     return response()->json(['data' => $uploadService->deleteTools($request)]);
    // }

    // public function restoreTools(Request $request, UploadService $uploadService){
    //     $this->authorize('authorizeProcurement', \App\Models\User::class);
    //     event(new \App\Events\NewPostPublished('created'));
    //     return response()->json(['data' => $uploadService->restoreTools($request)]);
    // }

    // public function permanentDeleteTools(Request $request, UploadService $uploadService){
    //     $this->authorize('authorizeProcurement', \App\Models\User::class);
    //     event(new \App\Events\NewPostPublished('created'));
    //     return response()->json(['data' => $uploadService->permanentDeleteTools($request)]);
    // }
    
    // public function starredTools(Request $request, UploadService $uploadService){
    //     $this->authorize('authorizeProcurement', \App\Models\User::class);
    //     event(new \App\Events\NewPostPublished('created'));
    //     return response()->json(['data' => $uploadService->starredTools($request)]);
    // }
}
