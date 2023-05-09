<?php

namespace App\Http\Controllers\Accountant\Invoice;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\AccountantServices\InvoiceServices\ChatOfAccountService;
use App\Services\AccountantServices\InvoiceServices\StudentService;

class ChatOfAccountController extends Controller
{
    public function __construct(){
        $this->middleware('check_screen_size');
    }
    
    //
    /*
    |--------------------------------------------------------------------------
    | QUERIES FOR THE CHARTOFACCOUNT
    |--------------------------------------------------------------------------
    */

    public function getSpecificLegerEntries(ChatOfAccountService $chatOfAccountService){
        $this->authorize('authorizeAccountant', \App\Models\User::class);
        return response()->json(['data' => $chatOfAccountService->getSpecificLegerEntries()]);
    }

    public function getLegerEntries(ChatOfAccountService $chatOfAccountService){
        $this->authorize('authorizeAccountant', \App\Models\User::class);
        return response()->json(['data' => $chatOfAccountService->getLegerEntries()]);
    }

    public function searchStudent(StudentService $studentService){
        $this->authorize('authorizeAccountant', \App\Models\User::class);
        return response()->json(['data' => $studentService->searchStudent()]);
    }

    public function submitTuitionFee(Request $request){
        $this->authorize('authorizeAccountant', \App\Models\User::class);
        event(new \App\Events\NewPostPublished('created'));
        return response()->json('success');
    }

    public function getChartOfAccounts(ChatOfAccountService $chatOfAccountService){
        $this->authorize('authorizeAccountant', \App\Models\User::class);
        return response()->json(['data' => $chatOfAccountService->getChartOfAccounts()]);
    }

    public function addChartOfAccounts(Request $request, ChatOfAccountService $chatOfAccountService){
        $this->authorize('authorizeAccountant', \App\Models\User::class);
        event(new \App\Events\NewPostPublished('created'));
        return response()->json(['data' => $chatOfAccountService->addChartOfAccounts($request)]);
    }

    public function updateChartOfAccount(Request $request, ChatOfAccountService $chatOfAccountService){
        $this->authorize('authorizeAccountant', \App\Models\User::class);
        event(new \App\Events\NewPostPublished('created'));
        return response()->json(['data' => $chatOfAccountService->updateChartOfAccount($request)]);
    }

    public function deleteChartOfAccounts(Request $request, ChatOfAccountService $chatOfAccountService){
        $this->authorize('authorizeAccountant', \App\Models\User::class);
        event(new \App\Events\NewPostPublished('created'));
        return response()->json(['data' => $chatOfAccountService->deleteChartOfAccounts($request)]);
    }

    public function headDashboardGetStudents(ChatOfAccountService $chatOfAccountService){
        $this->authorize('authorizeAccountant', \App\Models\User::class);
        // event(new \App\Events\NewPostPublished('created'));
        return response()->json(['data' => $chatOfAccountService->headDashboardGetStudents()]);
    }
}
