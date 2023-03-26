<?php

namespace App\Http\Controllers\Secretary\Schools;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Services\SecretaryServices\SchoolServices\SchoolsService;

class SchoolController extends Controller
{
    //
    public function getSchools(Request $request, SchoolsService $schoolsService){
        // $this->authorize('authorizeHead', \App\Models\User::class); 
        // event(new \App\Events\NewPostPublished('head getStaffs route'));
        return response()->json(['data' => $schoolsService->getSchools($request)]);
    }

    
    public function registerSchool(Request $request ,SchoolsService $schoolsService){
        // $this->authorize('authorizeHead', \App\Models\User::class);
        // event(new \App\Events\NewPostPublished('head'));
        return response()->json(['data' => $schoolsService->registerSchool($request)]);
    }

    public function getSchoolStaffs(Request $request, SchoolsService $schoolsService){
        // $this->authorize('authorizeHead', \App\Models\User::class); 
        // event(new \App\Events\NewPostPublished('head getSchoolStaffs route'));
        return response()->json(['data' => $schoolsService->getSchoolStaffs($request)]);
    }

    // public function getInvoiceView(Request $request, InvoiceService $invoiceService){
    //     $this->authorize('authorizeAccountant', \App\Models\User::class); 
    //     return response()->json(['data' => $invoiceService->getInvoiceView($request)]);
    // }

    // public function acceptInvoice(Request $request, InvoiceService $invoiceService){
    //     $this->authorize('authorizeAccountant', \App\Models\User::class); 
    //     event(new \App\Events\NewPostPublished('head'));
    //     return response()->json(['data' => $invoiceService->acceptInvoice($request)]);
    // }

    public function getDepartments(SchoolsService $schoolsService){
        // $this->authorize('authorizeHead', \App\Models\User::class); 
        return response()->json(['data' => $schoolsService->getDepartments()]);
    }
}
