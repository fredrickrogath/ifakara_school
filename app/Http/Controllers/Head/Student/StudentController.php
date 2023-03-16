<?php

namespace App\Http\Controllers\Head\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Services\HeadServices\StudentServices\StudentService;

class StudentController extends Controller
{
    //
    public function addStudent(Request $request, StudentService $studentService){
        $this->authorize('authorizeHead', \App\Models\User::class); 
        event(new \App\Events\NewPostPublished('academic student'));
        return response()->json(['data' => $studentService->addStudent($request)]);
    }

    // public function getInvoiceView(Request $request, InvoiceService $invoiceService){
    //     $this->authorize('authorizeAccountant', \App\Models\User::class); 
    //     return response()->json(['data' => $invoiceService->getInvoiceView($request)]);
    // }

    // public function acceptInvoice(Request $request, InvoiceService $invoiceService){
    //     $this->authorize('authorizeAccountant', \App\Models\User::class); 
    //     event(new \App\Events\NewPostPublished('academic student'));
    //     return response()->json(['data' => $invoiceService->acceptInvoice($request)]);
    // }

    public function getStudentClasses(StudentService $studentService){
        $this->authorize('authorizeHead', \App\Models\User::class); 
        return response()->json(['data' => $studentService->getStudentClasses()]);
    }
    
    public function getStudents(StudentService $studentService){
        $this->authorize('authorizeHead', \App\Models\User::class); 
        return response()->json(['data' => $studentService->getStudents()]);
    }
}
