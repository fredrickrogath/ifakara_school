<?php

namespace App\Http\Controllers\Accountant;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Inertia\Inertia;

use App\Services\AccountantServices\AccountantService;

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

    public function dashboard(AccountantService $accountantService){
        $this->authorize('authorizeAccountant', \App\Models\User::class); 
        return Inertia::render('Dashboard', $accountantService->dashboardData());
    }

    public function pageOne(){
        $this->authorize('authorizeAccountant', \App\Models\User::class); 
        return Inertia::render('Dashboard');
    }

    public function pageTwo(){
        $this->authorize('authorizeAccountant', \App\Models\User::class); 
        return Inertia::render('Dashboard');
    }

    public function pageThree(){
        $this->authorize('authorizeAccountant', \App\Models\User::class); 
        return Inertia::render('Dashboard');
    }

    public function pageFour(){
        $this->authorize('authorizeAccountant', \App\Models\User::class); 
        return Inertia::render('Dashboard');
    }

    public function pageFive(){
        $this->authorize('authorizeAccountant', \App\Models\User::class); 
        return Inertia::render('Dashboard');
    }

    public function pageSix(){
        $this->authorize('authorizeAccountant', \App\Models\User::class); 
        return Inertia::render('Dashboard');
    }

    public function pageSeven(){
        $this->authorize('authorizeAccountant', \App\Models\User::class); 
        return Inertia::render('Dashboard');
    }
}
