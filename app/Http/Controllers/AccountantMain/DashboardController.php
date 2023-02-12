<?php

namespace App\Http\Controllers\AccountantMain;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Inertia\Inertia;

use App\Services\AccountantMainServices\AccountantMainService;

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

    public function dashboard(AccountantMainService $accountantMainService){
        $this->authorize('authorizeAccountantMain', \App\Models\User::class); 
        return Inertia::render('Dashboard', $accountantMainService->dashboardData());
    }

    public function pageOne(){
        $this->authorize('authorizeAccountantMain', \App\Models\User::class); 
        return Inertia::render('Dashboard');
    }

    public function pageTwo(){
        $this->authorize('authorizeAccountantMain', \App\Models\User::class); 
        return Inertia::render('Dashboard');
    }

    public function pageThree(){
        $this->authorize('authorizeAccountantMain', \App\Models\User::class); 
        return Inertia::render('Dashboard');
    }

    public function pageFour(){
        $this->authorize('authorizeAccountantMain', \App\Models\User::class); 
        return Inertia::render('Dashboard');
    }

    public function pageFive(){
        $this->authorize('authorizeAccountantMain', \App\Models\User::class); 
        return Inertia::render('Dashboard');
    }

    public function pageSix(){
        $this->authorize('authorizeAccountantMain', \App\Models\User::class); 
        return Inertia::render('Dashboard');
    }

    public function pageSeven(){
        $this->authorize('authorizeAccountantMain', \App\Models\User::class); 
        return Inertia::render('Dashboard');
    }
}
