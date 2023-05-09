<?php

namespace App\Http\Controllers\Procurement;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Inertia\Inertia;

use App\Services\ProcurementServices\ProcurementService;

class DashboardController extends Controller
{
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

    public function __construct(){
        $this->middleware('check_screen_size');
    }

    public function dashboard(ProcurementService $procurementService){
        $this->authorize('authorizeProcurement', \App\Models\User::class); 
        return Inertia::render('Dashboard', $procurementService->dashboardData());
    }

    public function tools(ProcurementService $procurementService){
        $this->authorize('authorizeProcurement', \App\Models\User::class); 
        return Inertia::render('Dashboard', $procurementService->dashboardData());
    }

    public function tools_view(ProcurementService $procurementService){
        $this->authorize('authorizeProcurement', \App\Models\User::class); 
        return Inertia::render('Dashboard', $procurementService->dashboardData());
    }

    public function invoice(ProcurementService $procurementService){
        $this->authorize('authorizeProcurement', \App\Models\User::class); 
        return Inertia::render('Dashboard', $procurementService->dashboardData());
    }

    public function uploads(ProcurementService $procurementService){
        $this->authorize('authorizeProcurement', \App\Models\User::class); 
        return Inertia::render('Dashboard', $procurementService->dashboardData());
    }

    public function reports(ProcurementService $procurementService){
        $this->authorize('authorizeProcurement', \App\Models\User::class); 
        return Inertia::render('Dashboard', $procurementService->dashboardData());
    }
}
