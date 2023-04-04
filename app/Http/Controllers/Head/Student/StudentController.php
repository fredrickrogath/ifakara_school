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
        event(new \App\Events\Academic\StudentEvent('academic student'));
        event(new \App\Events\Api\Secretary\StudentEvent('head getSchoolStaffs route'));
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

    public function getStudent(Request $request, StudentService $studentService){
        $this->authorize('authorizeHead', \App\Models\User::class); 
        return response()->json(['data' => $studentService->getStudent($request)]);
    }

    public function getComments(Request $request, StudentService $studentService){
        $this->authorize('authorizeHead', \App\Models\User::class); 
        return response()->json(['data' => $studentService->getComments($request)]);
    }

    public function editStudent(Request $request, StudentService $studentService){
        event(new \App\Events\Academic\StudentEvent('academic student'));
        event(new \App\Events\Api\Secretary\StudentEvent('head getSchoolStaffs route'));
        $this->authorize('authorizeHead', \App\Models\User::class); 
        return response()->json(['data' => $studentService->editStudent($request)]);
    }

    public function sendComment(Request $request, StudentService $studentService){
        event(new \App\Events\Api\Secretary\CommentEvent());
        $this->authorize('authorizeHead', \App\Models\User::class); 
        return response()->json(['data' => $studentService->sendComment($request)]);
    }
    
}
