<?php

namespace App\Http\Controllers\Academic;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Inertia\Inertia;

use App\Services\AcademicServices\AcademicService;

class DashboardController extends Controller
{
    public function __construct(){
        $this->middleware('check_screen_size');
    }
    
    /*
    |--------------------------------------------------------------------------
    | protects only specific functions
    |--------------------------------------------------------------------------
    public function __construct(){
        $this->middleware('auth')->only(['functionName1', 'functionName2']);
    }
    */

    /*
    |--------------------------------------------------------------------------
    | protect all functions except specified ones
    |--------------------------------------------------------------------------
    public function __construct()
    {
        $this->middleware('auth')->except(['functionName1', 'functionName2']);
    }
    */
    
    public function dashboard(AcademicService $academicService){
        $this->authorize('authorizeAcademic', \App\Models\User::class); 
        return Inertia::render('Dashboard', $academicService->dashboardData());
    }

    public function students_registration(AcademicService $academicService){
        $this->authorize('authorizeAcademic', \App\Models\User::class);
        return Inertia::render('Dashboard', $academicService->dashboardData());
    }

    public function upload_results(AcademicService $academicService){
        $this->authorize('authorizeAcademic', \App\Models\User::class);
        return Inertia::render('Dashboard', $academicService->dashboardData());
    }

    public function view(AcademicService $academicService){
        $this->authorize('authorizeAcademic', \App\Models\User::class);
        return Inertia::render('Dashboard', $academicService->dashboardData());
    }

    public function uploads(AcademicService $academicService){
        $this->authorize('authorizeAcademic', \App\Models\User::class);
        return Inertia::render('Dashboard', $academicService->dashboardData());
    }

    public function departiment(AcademicService $academicService){
        $this->authorize('authorizeAcademic', \App\Models\User::class);
        return Inertia::render('Dashboard', $academicService->dashboardData());
    }

    public function reports(AcademicService $academicService){
        $this->authorize('authorizeAcademic', \App\Models\User::class);
        return Inertia::render('Dashboard', $academicService->dashboardData());
    }
}
