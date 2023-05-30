<?php

namespace App\Http\Controllers\Academic\Department;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Services\AcademicServices\DepartmentServices\DepartmentService;

class DepartmentController extends Controller
{
    public function __construct(){
        $this->middleware('check_screen_size');
    }
    
    //
    // public function addStaff(Request $request ,DepartmentService $departmentService){
    //     $this->authorize('authorizeAcademic', \App\Models\User::class);
    //     event(new \App\Events\NewPostPublished('head'));
    //     return response()->json(['data' => $departmentService->addStaff($request)]);
    // }

    public function getStaffs(Request $request, DepartmentService $departmentService){
        $this->authorize('authorizeAcademic', \App\Models\User::class); 
        // event(new \App\Events\NewPostPublished('head getStaffs route'));
        return response()->json(['data' => $departmentService->getStaffs($request)]);
    }

    public function getStaffsNew(Request $request, DepartmentService $departmentService){
        $this->authorize('authorizeAcademic', \App\Models\User::class); 
        // event(new \App\Events\NewPostPublished('head getStaffsNew route'));
        return response()->json(['data' => $departmentService->getStaffsNew($request)]);
    }

    public function headDashboardGetStaffs(DepartmentService $departmentService){
        $this->authorize('authorizeAcademic', \App\Models\User::class); 
        return response()->json(['data' => $departmentService->headDashboardGetStaffs()]);
    }

    // public function acceptInvoice(Request $request, InvoiceService $invoiceService){
    //     $this->authorize('authorizeAccountant', \App\Models\User::class); 
    //     event(new \App\Events\NewPostPublished('head'));
    //     return response()->json(['data' => $invoiceService->acceptInvoice($request)]);
    // }

    // public function getDepartments(DepartmentService $departmentService){
    //     $this->authorize('authorizeAcademic', \App\Models\User::class); 
    //     return response()->json(['data' => $departmentService->getDepartments()]);
    // }
}
