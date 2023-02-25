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

    public function invoice_incoming(AccountantService $accountantService){
        $this->authorize('authorizeAccountant', \App\Models\User::class); 
        return Inertia::render('Dashboard', $accountantService->dashboardData());
    }

    public function invoice_pending(AccountantService $accountantService){
        $this->authorize('authorizeAccountant', \App\Models\User::class); 
        return Inertia::render('Dashboard', $accountantService->dashboardData());
    }

    public function invoice_successful(AccountantService $accountantService){
        $this->authorize('authorizeAccountant', \App\Models\User::class); 
        return Inertia::render('Dashboard', $accountantService->dashboardData());
    }

    public function invoice_create(AccountantService $accountantService){
        $this->authorize('authorizeAccountant', \App\Models\User::class); 
        return Inertia::render('Dashboard', $accountantService->dashboardData());
    }

    public function payment_details(AccountantService $accountantService){
        $this->authorize('authorizeAccountant', \App\Models\User::class); 
        return Inertia::render('Dashboard', $accountantService->dashboardData());
    }

    public function uploads(AccountantService $accountantService){
        $this->authorize('authorizeAccountant', \App\Models\User::class); 
        return Inertia::render('Dashboard', $accountantService->dashboardData());
    }

    public function reports(AccountantService $accountantService){
        $this->authorize('authorizeAccountant', \App\Models\User::class); 
        return Inertia::render('Dashboard', $accountantService->dashboardData());
    }

    public function invoice(AccountantService $accountantService){
        $this->authorize('authorizeAccountant', \App\Models\User::class); 
        return Inertia::render('Dashboard', $accountantService->dashboardData());
    }
}
