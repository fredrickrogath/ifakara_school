<?php

namespace App\Http\Controllers\Accountant\Invoice;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\AccountantServices\InvoiceServices\ChatOfAccountService;
use App\Services\AccountantServices\InvoiceServices\StudentService;

class ChatOfAccountController extends Controller
{
    //
    public function getSpecificLegerEntries(ChatOfAccountService $chatOfAccountService){
        return response()->json(['data' => $chatOfAccountService->getLegerEntries()]);
    }

    public function searchStudent(StudentService $studentService){
        return response()->json(['data' => $studentService->searchStudent()]);
    }

    public function submitTuitionFee(Request $request){
        \App\Models\TuitionFee::create([
            'charts_of_accounts_id' => 1,
            'user_id' => 1,
            'amount' => $request->amount,
            'narration' => $request->narration,

        ]);

        \App\Models\TuitionFee::create([
            'charts_of_accounts_id' => 2,
            'user_id' => 1,
            'amount' => ($request->amount * 10) / 100,
            'narration' => $request->narration,

        ]);
        return response()->json('success');
    }
}
