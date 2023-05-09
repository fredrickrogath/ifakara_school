<?php

namespace App\Http\Controllers\Head;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Inertia\Inertia;

use App\Services\HeadServices\HeadService;

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
    
    
    public function dashboard(HeadService $headService){
        $this->authorize('authorizeHead', \App\Models\User::class); 
        return Inertia::render('Dashboard', $headService->dashboardData());
    }

    public function accountant_uploads(HeadService $headService){
        $this->authorize('authorizeHead', \App\Models\User::class); 
        return Inertia::render('Dashboard', $headService->dashboardData());
    }

    public function departments(HeadService $headService){
        $this->authorize('authorizeHead', \App\Models\User::class); 
        return Inertia::render('Dashboard', $headService->dashboardData());
    }
    
    public function accountant_invoices(HeadService $headService){
        $this->authorize('authorizeHead', \App\Models\User::class); 
        return Inertia::render('Dashboard', $headService->dashboardData());
    }

    public function accountant_reports(HeadService $headService){
        $this->authorize('authorizeHead', \App\Models\User::class); 
        return Inertia::render('Dashboard', $headService->dashboardData());
    }

    public function academic_uploads(HeadService $headService){
        $this->authorize('authorizeHead', \App\Models\User::class); 
        return Inertia::render('Dashboard', $headService->dashboardData());
    }

    public function academic_students(HeadService $headService){
        $this->authorize('authorizeHead', \App\Models\User::class); 
        return Inertia::render('Dashboard', $headService->dashboardData());
    }

    public function academic_invoices(HeadService $headService){
        $this->authorize('authorizeHead', \App\Models\User::class); 
        return Inertia::render('Dashboard', $headService->dashboardData());
    }

    public function academic_reports(HeadService $headService){
        $this->authorize('authorizeHead', \App\Models\User::class); 
        return Inertia::render('Dashboard', $headService->dashboardData());
    }

    public function procurement_item_registration(HeadService $headService){
        $this->authorize('authorizeHead', \App\Models\User::class); 
        return Inertia::render('Dashboard', $headService->dashboardData());
    }

    public function procurement_uploads(HeadService $headService){
        $this->authorize('authorizeHead', \App\Models\User::class); 
        return Inertia::render('Dashboard', $headService->dashboardData());
    }

    public function procurement_reports(HeadService $headService){
        $this->authorize('authorizeHead', \App\Models\User::class); 
        return Inertia::render('Dashboard', $headService->dashboardData());
    }

    public function about_school(HeadService $headService){
        $this->authorize('authorizeHead', \App\Models\User::class); 
        return Inertia::render('Dashboard', $headService->dashboardData());
    }
}
