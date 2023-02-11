<?php

namespace App\Http\Controllers\Secretary;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Inertia\Inertia;

use App\Services\SecretaryServices\SecretaryService;

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
    
    public function dashboard(SecretaryService $secretaryService){
        $this->authorize('authorizeSecretary', \App\Models\User::class); 
        return Inertia::render('Dashboard', $secretaryService->dashboardData());
    }

    public function pageOne(){
        $this->authorize('authorizeSecretary', \App\Models\User::class);
        return Inertia::render('Dashboard');
    }

    public function pageTwo(){
        $this->authorize('authorizeSecretary', \App\Models\User::class);
        return Inertia::render('Dashboard');
    }

    public function pageThree(){
        $this->authorize('authorizeSecretary', \App\Models\User::class);
        return Inertia::render('Dashboard');
    }

    public function pageFour(){
        $this->authorize('authorizeSecretary', \App\Models\User::class);
        return Inertia::render('Dashboard');
    }

    public function pageFive(){
        $this->authorize('authorizeSecretary', \App\Models\User::class);
        return Inertia::render('Dashboard');
    }

    public function pageSix(){
        $this->authorize('authorizeSecretary', \App\Models\User::class);
        return Inertia::render('Dashboard');
    }

    public function pageSeven(){
        $this->authorize('authorizeSecretary', \App\Models\User::class);
        return Inertia::render('Dashboard');
    }
}
