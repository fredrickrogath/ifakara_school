<?php

namespace App\Http\Controllers\Academic\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\AcademicServices\StudentServices\StudentService;

class StudentController extends Controller
{
    public function __construct(){
        $this->middleware('check_screen_size');
    }

    //
    //
    // public function addInvoice(Request $request ,InvoiceService $invoiceService){
    //     $this->authorize('authorizeProcurement', \App\Models\User::class);
    //     event(new \App\Events\NewPostPublished('academic student'));
    //     return response()->json(['data' => $invoiceService->addInvoice($request)]);
    // }

    public function addStudent(Request $request, StudentService $studentService){
        $this->authorize('authorizeAcademic', \App\Models\User::class);
        // event(new \App\Events\NewPostPublished('academic student'));
        event(new \App\Events\Academic\StudentEvent(auth()->user()->school_id));
        // event(new \App\Events\Api\Secretary\StudentEvent(auth()->user()->school_id));
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
        $this->authorize('authorizeAcademic', \App\Models\User::class); 
        return response()->json(['data' => $studentService->getStudentClasses()]);
    }
    
    public function getStudents(StudentService $studentService){
        $this->authorize('authorizeAcademic', \App\Models\User::class); 
        return response()->json(['data' => $studentService->getStudents()]);
    }

    public function getStudentsNew(StudentService $studentService){
        $this->authorize('authorizeAcademic', \App\Models\User::class); 
        return response()->json(['data' => $studentService->getStudentsNew()]);
    }

    public function getStudent(Request $request, StudentService $studentService){
        $this->authorize('authorizeAcademic', \App\Models\User::class); 
        return response()->json(['data' => $studentService->getStudent($request)]);
    }

    public function getStudentPayments(StudentService $studentService){
        $this->authorize('authorizeAcademic', \App\Models\User::class); 
        return response()->json(['data' => $studentService->getStudentPayments()]);
    }

    public function getSpecificStudent(Request $request ,StudentService $studentService){
        $this->authorize('authorizeAcademic', \App\Models\User::class); 
        return response()->json(['data' => $studentService->getSpecificStudent($request)]);
    }

    public function editStudent(Request $request, StudentService $studentService){
        $this->authorize('authorizeAcademic', \App\Models\User::class); 
        event(new \App\Events\Academic\StudentEvent(auth()->user()->school_id));
        event(new \App\Events\Api\Secretary\StudentEvent(auth()->user()->school_id));
        return response()->json(['data' => $studentService->editStudent($request)]);
    }

    public function permissionToEditStudent(Request $request, StudentService $studentService){
        // event(new \App\Events\Academic\StudentEvent('academic student'));
        // event(new \App\Events\Api\Secretary\StudentEvent('head getSchoolStaffs route'));
        event(new \App\Events\Academic\Student\PermissionEvent(auth()->user()->school_id));
        event(new \App\Events\Api\Secretary\Student\PermissionEvent());
        // event(new \App\Events\Head\Academic\Student\PermissionEvent());
        return response()->json(['data' => $studentService->permissionToEditStudent($request)]);
    }

    public function checkPermissionToEditStudent(Request $request, StudentService $studentService){
        // event(new \App\Events\Academic\StudentEvent('academic student'));
        // event(new \App\Events\Api\Secretary\StudentEvent('head getSchoolStaffs route'));
        $this->authorize('authorizeAcademic', \App\Models\User::class); 
        return response()->json(['data' => $studentService->checkPermissionToEditStudent($request)]);
    }

    // public function getCommentsForStudentPermission(Request $request, StudentService $studentService){
    //     // event(new \App\Events\Academic\StudentEvent('academic student'));
    //     // event(new \App\Events\Api\Secretary\StudentEvent('head getSchoolStaffs route'));
    //     $this->authorize('authorizeAcademic', \App\Models\User::class); 
    //     return response()->json(['data' => $studentService->getCommentsForStudentPermission($request)]);
    // }

    public function getComments(Request $request, StudentService $studentService){
        // event(new \App\Events\Academic\StudentEvent('academic student'));
        // event(new \App\Events\Api\Secretary\StudentEvent('head getSchoolStaffs route'));
        $this->authorize('authorizeAcademic', \App\Models\User::class); 
        return response()->json(['data' => $studentService->getComments($request)]);
    }

    public function sendComment(Request $request, StudentService $studentService){
        // event(new \App\Events\Academic\StudentEvent('academic student'));
        // event(new \App\Events\Api\Secretary\StudentEvent('head getSchoolStaffs route'));
        $this->authorize('authorizeAcademic', \App\Models\User::class); 
        // event(new \App\Events\Api\Secretary\CommentEvent());
        event(new \App\Events\NotificationEvent($request->id));
        return response()->json(['data' => $studentService->sendComment($request)]);
    }

    public function headDashboardGetStudents(StudentService $studentService){
        // event(new \App\Events\Academic\StudentEvent('academic student'));
        // event(new \App\Events\Api\Secretary\StudentEvent('head getSchoolStaffs route'));
        $this->authorize('authorizeAcademic', \App\Models\User::class); 
        return response()->json(['data' => $studentService->headDashboardGetStudents()]);
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
    //     event(new \App\Events\NewPostPublished('academic student'));
    //     return response()->json(['data' => $invoiceService->updateInvoice($request)]);
    // }

    // public function deleteInvoice(Request $request, InvoiceService $invoiceService){
    //     $this->authorize('authorizeAccountant', \App\Models\User::class);
    //     event(new \App\Events\NewPostPublished('academic student'));
    //     return response()->json(['data' => $invoiceService->deleteInvoice($request)]);
    // }

    // public function restoreInvoice(Request $request, InvoiceService $invoiceService){
    //     $this->authorize('authorizeAccountant', \App\Models\User::class);
    //     event(new \App\Events\NewPostPublished('academic student'));
    //     return response()->json(['data' => $invoiceService->restoreInvoice($request)]);
    // }

    // public function permanentDeleteInvoice(Request $request, InvoiceService $invoiceService){
    //     $this->authorize('authorizeAccountant', \App\Models\User::class);
    //     event(new \App\Events\NewPostPublished('academic student'));
    //     return response()->json(['data' => $invoiceService->permanentDeleteInvoice($request)]);
    // }
    
    // public function starredInvoice(Request $request, InvoiceService $invoiceService){
    //     $this->authorize('authorizeAccountant', \App\Models\User::class);
    //     event(new \App\Events\NewPostPublished('academic student'));
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
    //     event(new \App\Events\NewPostPublished('academic student'));
    //     return response()->json(['data' => $invoiceService->starredInvoice($request)]);
    // }
}
