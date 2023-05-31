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

    public function addStaff(Request $request ,SchoolsService $schoolsService){
        // $this->authorize('authorizeHead', \App\Models\User::class);
        // event(new \App\Events\NewPostPublished('head'));
        event(new \App\Events\Academic\StaffEvent($request->schoolId));
        event(new \App\Events\Api\Secretary\StaffEvent());
        return response()->json(['data' => $schoolsService->addStaff($request)]);
    }
    
    public function registerSchool(Request $request ,SchoolsService $schoolsService){
        // $this->authorize('authorizeHead', \App\Models\User::class);
        event(new \App\Events\Api\Secretary\SchoolEvent());
        return response()->json(['data' => $schoolsService->registerSchool($request)]);
    }

    public function getSchoolStaffs(Request $request, SchoolsService $schoolsService){
        // $this->authorize('authorizeHead', \App\Models\User::class); 
        // event(new \App\Events\NewPostPublished('head getSchoolStaffs route'));
        return response()->json(['data' => $schoolsService->getSchoolStaffs($request)]);
    }

    public function getSchoolStudents(Request $request, SchoolsService $schoolsService){
        // $this->authorize('authorizeHead', \App\Models\User::class); 
        // event(new \App\Events\Api\Secretary\StudentEvent('head getSchoolStaffs route'));
        return response()->json(['data' => $schoolsService->getSchoolStudents($request)]);
    }

    public function getSchoolPermissions(SchoolsService $schoolsService){
        // $this->authorize('authorizeHead', \App\Models\User::class); 
        // event(new \App\Events\Api\Secretary\StudentEvent('head getSchoolStaffs route'));
        return response()->json(['data' => $schoolsService->getSchoolPermissions()]);
    }

    public function alterPermission(Request $request, SchoolsService $schoolsService){
        // $this->authorize('authorizeHead', \App\Models\User::class); 
        // event(new \App\Events\Academic\Student\PermissionEvent());
        // event(new \App\Events\Api\Secretary\Student\PermissionEvent());
        // event(new \App\Events\Head\Academic\Student\PermissionEvent());
        event(new \App\Events\Api\Secretary\Student\PermissionEvent());
        event(new \App\Events\Academic\Student\PermissionEvent($request->school_id));
        return response()->json(['data' => $schoolsService->alterPermission($request)]);
    }

    public function getComments(Request $request, SchoolsService $schoolsService){
        // $this->authorize('authorizeHead', \App\Models\User::class); 
        // event(new \App\Events\Academic\Student\PermissionEvent());
        // event(new \App\Events\Api\Secretary\Student\PermissionEvent());
        // event(new \App\Events\Head\Academic\Student\PermissionEvent());
        return response()->json(['data' => $schoolsService->getComments($request)]);
    }

    public function sendComment(Request $request, SchoolsService $schoolsService){
        // $this->authorize('authorizeHead', \App\Models\User::class); 
        // event(new \App\Events\Academic\Student\PermissionEvent());
        // event(new \App\Events\Api\Secretary\CommentEvent());
        event(new \App\Events\NotificationEvent($request->id));
        // event(new \App\Events\Head\Academic\Student\PermissionEvent());
        return response()->json(['data' => $schoolsService->sendComment($request)]);
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

    public function getSchoolPermissionsNotifications(SchoolsService $schoolsService){
        // $this->authorize('authorizeHead', \App\Models\User::class); 
        return response()->json(['data' => $schoolsService->getSchoolPermissionsNotifications()]);
    }
}
