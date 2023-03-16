<?php

namespace App\Http\Controllers\Academic\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\AcademicServices\StudentServices\StudentService;

class StudentController extends Controller
{
    //
    //
    // public function addInvoice(Request $request ,InvoiceService $invoiceService){
    //     $this->authorize('authorizeProcurement', \App\Models\User::class);
    //     event(new \App\Events\NewPostPublished('created'));
    //     return response()->json(['data' => $invoiceService->addInvoice($request)]);
    // }

    public function addStudent(Request $request, StudentService $studentService){
        $this->authorize('authorizeAcademic', \App\Models\User::class); 
        event(new \App\Events\NewPostPublished('created'));
        return response()->json(['data' => $studentService->addStudent($request)]);
    }

    // public function getInvoiceView(Request $request, InvoiceService $invoiceService){
    //     $this->authorize('authorizeAccountant', \App\Models\User::class); 
    //     return response()->json(['data' => $invoiceService->getInvoiceView($request)]);
    // }

    // public function acceptInvoice(Request $request, InvoiceService $invoiceService){
    //     $this->authorize('authorizeAccountant', \App\Models\User::class); 
    //     event(new \App\Events\NewPostPublished('created'));
    //     return response()->json(['data' => $invoiceService->acceptInvoice($request)]);
    // }

    public function getStudentClasses(StudentService $studentService){
        $this->authorize('authorizeAcademic', \App\Models\User::class); 
        return response()->json(['data' => $studentService->getStudentClasses()]);
    }
    
    public function getStudents(StudentService $studentService){
        $this->authorize('authorizeAcademic', \App\Models\User::class); 
        return response()->json(['data' => $studentService->getStudents()]);
    }

    // public function getTrashedInvoices(InvoiceService $invoiceService){
    //     $this->authorize('authorizeAccountant', \App\Models\User::class); 
    //     return response()->json(['data' => $invoiceService->getTrashedInvoices()]);
    // }

    // public function getStarredInvoices(InvoiceService $invoiceService){
    //     $this->authorize('authorizeAccountant', \App\Models\User::class); 
    //     return response()->json(['data' => $invoiceService->getStarredInvoices()]);
    // }
    
    // public function updateInvoice(Request $request, InvoiceService $invoiceService){
    //     $this->authorize('authorizeProcurement', \App\Models\User::class);
    //     event(new \App\Events\NewPostPublished('created'));
    //     return response()->json(['data' => $invoiceService->updateInvoice($request)]);
    // }

    // public function deleteInvoice(Request $request, InvoiceService $invoiceService){
    //     $this->authorize('authorizeAccountant', \App\Models\User::class);
    //     event(new \App\Events\NewPostPublished('created'));
    //     return response()->json(['data' => $invoiceService->deleteInvoice($request)]);
    // }

    // public function restoreInvoice(Request $request, InvoiceService $invoiceService){
    //     $this->authorize('authorizeAccountant', \App\Models\User::class);
    //     event(new \App\Events\NewPostPublished('created'));
    //     return response()->json(['data' => $invoiceService->restoreInvoice($request)]);
    // }

    // public function permanentDeleteInvoice(Request $request, InvoiceService $invoiceService){
    //     $this->authorize('authorizeAccountant', \App\Models\User::class);
    //     event(new \App\Events\NewPostPublished('created'));
    //     return response()->json(['data' => $invoiceService->permanentDeleteInvoice($request)]);
    // }
    
    // public function starredInvoice(Request $request, InvoiceService $invoiceService){
    //     $this->authorize('authorizeAccountant', \App\Models\User::class);
    //     event(new \App\Events\NewPostPublished('created'));
    //     return response()->json(['data' => $invoiceService->starredInvoice($request)]);
    // }
    
    // public function getTools(InvoiceService $invoiceService){
    //     $this->authorize('authorizeProcurement', \App\Models\User::class); 
    //     return response()->json(['data' => $invoiceService->getTools()]);
    // }

    // public function getSellers(InvoiceService $invoiceService){
    //     $this->authorize('authorizeProcurement', \App\Models\User::class); 
    //     return response()->json(['data' => $invoiceService->getSellers()]);
    // }

    // public function submitInvoice(Request $request ,InvoiceService $invoiceService){
    //     $this->authorize('authorizeProcurement', \App\Models\User::class); 
    //     return response()->json(['data' => $invoiceService->submitInvoice($request)]);
    // }

    // public function starredInvoice(Request $request, InvoiceService $invoiceService){
    //     $this->authorize('authorizeProcurement', \App\Models\User::class);
    //     event(new \App\Events\NewPostPublished('created'));
    //     return response()->json(['data' => $invoiceService->starredInvoice($request)]);
    // }
}
