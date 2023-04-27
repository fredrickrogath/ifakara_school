<?php

namespace App\Http\Controllers\Secretary\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Services\SecretaryServices\SchoolServices\StudentService;

class StudentController extends Controller
{
    //
    // public function getSchools(Request $request, StaffService $staffsService){
    //     // $this->authorize('authorizeHead', \App\Models\User::class); 
    //     // event(new \App\Events\NewPostPublished('head getStaffs route'));
    //     return response()->json(['data' => $staffsService->getSchools($request)]);
    // }

    
    // public function addStaff(Request $request ,StaffService $staffsService){
    //     // $this->authorize('authorizeHead', \App\Models\User::class);
    //     // event(new \App\Events\NewPostPublished('head'));
    //     return response()->json(['data' => $staffsService->addStaff($request)]);
    // }

    public function getStudents(Request $request, StudentService $studentService){
        // $this->authorize('authorizeHead', \App\Models\User::class); 
        // event(new \App\Events\NewPostPublished('head getStudents route'));
        return response()->json(['data' => $studentService->getStudents($request)]);
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

    // public function getDepartments(StaffService $staffsService){
    //     // $this->authorize('authorizeHead', \App\Models\User::class); 
    //     return response()->json(['data' => $staffsService->getDepartments()]);
    // }
}
