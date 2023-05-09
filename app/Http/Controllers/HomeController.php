<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function __construct(){
        $this->middleware(['check_screen_size']);
    }
    
    // Determining user's role before redirects to specified dashbaord

    public function DetermineUserRole(){

        if (auth()->user()->role == \App\Models\User::is_head) {
            return redirect()->route('head.dashboard');
        } 
        // elseif (auth()->user()->role == \App\Models\User::is_bishop) {
        //     return redirect()->route('bishop.dashboard');
        // } 
        elseif (auth()->user()->role == \App\Models\User::is_academic) {
            return redirect()->route('academic.dashboard');
        }
        //  elseif (auth()->user()->role == \App\Models\User::is_secretary) {
        //     return redirect()->route('secretary.dashboard');
        // }
         elseif (auth()->user()->role == \App\Models\User::is_accountant) {
            return redirect()->route('accountant.dashboard');
        }
         elseif (auth()->user()->role == \App\Models\User::is_procurement) {
            return redirect()->route('procurement.dashboard');
        }
        //  elseif (auth()->user()->role == \App\Models\User::is_accountant_main) {
        //     return redirect()->route('accountant_main.dashboard');
        // } 
        // elseif (auth()->user()->role == \App\Models\User::is_internal_auditor) {
        //     return redirect()->route('internal_auditor.dashboard');
        // }
         else {
            abort(403);
        }
    }
}
