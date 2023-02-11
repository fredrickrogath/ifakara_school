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

    public function dashboard(ProcurementService $procurementService){
        $this->authorize('authorizeProcurement', \App\Models\User::class); 
        return Inertia::render('Dashboard', $procurementService->dashboardData());
    }

    public function pageOne(){
        $this->authorize('authorizeProcurement', \App\Models\User::class); 
        return Inertia::render('Dashboard');
    }

    public function pageTwo(){
        $this->authorize('authorizeProcurement', \App\Models\User::class); 
        return Inertia::render('Dashboard');
    }

    public function pageThree(){
        $this->authorize('authorizeProcurement', \App\Models\User::class); 
        return Inertia::render('Dashboard');
    }

    public function pageFour(){
        $this->authorize('authorizeProcurement', \App\Models\User::class); 
        return Inertia::render('Dashboard');
    }

    public function pageFive(){
        $this->authorize('authorizeProcurement', \App\Models\User::class); 
        return Inertia::render('Dashboard');
    }

    public function pageSix(){
        $this->authorize('authorizeProcurement', \App\Models\User::class); 
        return Inertia::render('Dashboard');
    }

    public function pageSeven(){
        $this->authorize('authorizeProcurement', \App\Models\User::class); 
        return Inertia::render('Dashboard');
    }
}
