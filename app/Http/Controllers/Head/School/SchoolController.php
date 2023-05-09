<?php

namespace App\Http\Controllers\Head\School;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Services\HeadServices\SchoolServices\SchoolService;

class SchoolController extends Controller
{
    public function __construct(){
        $this->middleware('check_screen_size');
    }
    
    //
    public function registerSchool(Request $request ,SchoolService $schoolService){
        $this->authorize('authorizeHead', \App\Models\User::class); 
        return response()->json(['data' => $schoolService->registerSchool($request)]);
    }

    // public function getAccountantUploads(Request $request ,SchoolService $schoolService){
    //     $this->authorize('authorizeHead', \App\Models\User::class); 
    //     return response()->json(['data' => $schoolService->getAccountantUploads()]);
    // }

    // public function getProcurementUploads(Request $request ,SchoolService $schoolService){
    //     $this->authorize('authorizeHead', \App\Models\User::class); 
    //     return response()->json(['data' => $schoolService->getProcurementUploads()]);
    // }
}
