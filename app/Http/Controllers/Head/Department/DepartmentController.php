<?php

namespace App\Http\Controllers\Head\Department;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\HeadServices\DepartmentServices\DepartmentService;

class DepartmentController extends Controller
{
    public function __construct(){
        $this->middleware('check_screen_size');
    }
    
    //
    public function addStaff(Request $request ,DepartmentService $departmentService){
        $this->authorize('authorizeHead', \App\Models\User::class);
        event(new \App\Events\Academic\StaffEvent(auth()->user()->school_id));
        // event(new \App\Events\Api\Secretary\StaffEvent());
        return response()->json(['data' => $departmentService->addStaff($request)]);
    }

    public function getStaffs(Request $request, DepartmentService $departmentService){
        $this->authorize('authorizeHead', \App\Models\User::class); 
        // event(new \App\Events\NewPostPublished('head getStaffs route'));
        return response()->json(['data' => $departmentService->getStaffs($request)]);
    }

    public function getStaffsNew(Request $request, DepartmentService $departmentService){
        $this->authorize('authorizeHead', \App\Models\User::class); 
        return response()->json(['data' => $departmentService->getStaffsNew($request)]);
    }

    public function headDashboardGetStaffs(DepartmentService $departmentService){
        $this->authorize('authorizeHead', \App\Models\User::class); 
        return response()->json(['data' => $departmentService->headDashboardGetStaffs()]);
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

    public function getDepartments(DepartmentService $departmentService){
        $this->authorize('authorizeHead', \App\Models\User::class); 
        return response()->json(['data' => $departmentService->getDepartments()]);
    }
    
    // public function getStaffs(StudentService $studentService){
    //     $this->authorize('authorizeHead', \App\Models\User::class); 
    //     return response()->json(['data' => $studentService->getStaffs()]);
    // }

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
    //     event(new \App\Events\NewPostPublished('head'));
    //     return response()->json(['data' => $invoiceService->updateInvoice($request)]);
    // }

    // public function deleteInvoice(Request $request, InvoiceService $invoiceService){
    //     $this->authorize('authorizeAccountant', \App\Models\User::class);
    //     event(new \App\Events\NewPostPublished('head'));
    //     return response()->json(['data' => $invoiceService->deleteInvoice($request)]);
    // }

    // public function restoreInvoice(Request $request, InvoiceService $invoiceService){
    //     $this->authorize('authorizeAccountant', \App\Models\User::class);
    //     event(new \App\Events\NewPostPublished('head'));
    //     return response()->json(['data' => $invoiceService->restoreInvoice($request)]);
    // }

    // public function permanentDeleteInvoice(Request $request, InvoiceService $invoiceService){
    //     $this->authorize('authorizeAccountant', \App\Models\User::class);
    //     event(new \App\Events\NewPostPublished('head'));
    //     return response()->json(['data' => $invoiceService->permanentDeleteInvoice($request)]);
    // }
    
    // public function starredInvoice(Request $request, InvoiceService $invoiceService){
    //     $this->authorize('authorizeAccountant', \App\Models\User::class);
    //     event(new \App\Events\NewPostPublished('head'));
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
    //     event(new \App\Events\NewPostPublished('head'));
    //     return response()->json(['data' => $invoiceService->starredInvoice($request)]);
    // }
}
