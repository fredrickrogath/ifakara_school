<?php

namespace App\Http\Controllers\Head;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Inertia\Inertia;

use App\Services\HeadServices\HeadService;

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
    
    
    public function dashboard(HeadService $headService){
        $this->authorize('authorizeHead', \App\Models\User::class); 
        return Inertia::render('Dashboard', $headService->dashboardData());
    }

    public function pageOne(){
        $this->authorize('authorizeHead', \App\Models\User::class); 
        return Inertia::render('Dashboard');
    }

    public function pageTwo(){
        $this->authorize('authorizeHead', \App\Models\User::class); 
        return Inertia::render('Dashboard');
    }

    public function pageThree(){
        $this->authorize('authorizeHead', \App\Models\User::class); 
        return Inertia::render('Dashboard');
    }

    public function pageFour(){
        $this->authorize('authorizeHead', \App\Models\User::class); 
        return Inertia::render('Dashboard');
    }

    public function pageFive(){
        $this->authorize('authorizeHead', \App\Models\User::class); 
        return Inertia::render('Dashboard');
    }

    public function pageSix(){
        $this->authorize('authorizeHead', \App\Models\User::class); 
        return Inertia::render('Dashboard');
    }

    public function pageSeven(){
        $this->authorize('authorizeHead', \App\Models\User::class); 
        return Inertia::render('Dashboard');
    }
}
