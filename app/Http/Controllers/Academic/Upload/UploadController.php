<?php

namespace App\Http\Controllers\Academic\Upload;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Services\AcademicServices\UploadServices\UploadService;

class UploadController extends Controller
{
    //
    public function upload(Request $request ,UploadService $uploadService){
        $this->authorize('authorizeAcademic', \App\Models\User::class);
        event(new \App\Events\NewPostPublished('created'));
        return response()->json(['data' => $uploadService->upload($request)]);
    }

    public function getUploads(Request $request ,UploadService $uploadService){
        $this->authorize('authorizeAcademic', \App\Models\User::class); 
        return response()->json(['data' => $uploadService->getUploads()]);
    }

    public function getNewUploads(Request $request ,UploadService $uploadService){
        $this->authorize('authorizeAcademic', \App\Models\User::class); 
        return response()->json(['data' => $uploadService->getNewUploads()]);
    }

    public function getTrashedUploads(Request $request ,UploadService $uploadService){
        $this->authorize('authorizeAcademic', \App\Models\User::class); 
        return response()->json(['data' => $uploadService->getTrashedUploads()]);
    }
    
    // public function updateTools(Request $request, uploadService $uploadService){
    //     $this->authorize('authorizeAcademic', \App\Models\User::class);
    //     event(new \App\Events\NewPostPublished('created'));
    //     return response()->json(['data' => $uploadService->updateTools($request)]);
    // }

    public function deleteUpload(Request $request, UploadService $uploadService){
        $this->authorize('authorizeAcademic', \App\Models\User::class);
        event(new \App\Events\NewPostPublished('created'));
        return response()->json(['data' => $uploadService->deleteUpload($request)]);
    }

    public function restoreUpload(Request $request, UploadService $uploadService){
        $this->authorize('authorizeAcademic', \App\Models\User::class);
        event(new \App\Events\NewPostPublished('created'));
        return response()->json(['data' => $uploadService->restoreUpload($request)]);
    }

    public function permanentDeleteUpload(Request $request, UploadService $uploadService){
        $this->authorize('authorizeAcademic', \App\Models\User::class);
        event(new \App\Events\NewPostPublished('created'));
        return response()->json(['data' => $uploadService->permanentDeleteUpload($request)]);
    }
    
    // public function starredTools(Request $request, UploadService $uploadService){
    //     $this->authorize('authorizeAcademic', \App\Models\User::class);
    //     event(new \App\Events\NewPostPublished('created'));
    //     return response()->json(['data' => $uploadService->starredTools($request)]);
    // }
}
