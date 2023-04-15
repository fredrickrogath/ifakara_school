<?php

namespace App\Services\AccountantServices\InvoiceServices;

class ChatOfAccountService
{
    public function getSpecificLegerEntries(){
        return \App\Models\ChartsOfAccount::where('account_type' ,'=', 'Income')->get();
    }

    public function getLegerEntries(){
        return \App\Models\TuitionFee::with('chartOfAccount', 'user')->orderBy('created_at', 'desc')->get();
    }

    public function getChartOfAccounts(){
        return \App\Models\ChartsOfAccount::orderBy('created_at', 'desc')->get();
    }

    public function submitTuitionFee($request){
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

        return true;
    }

    public function updateChartOfAccount($request){
        return \App\Models\ChartsOfAccount::find($request->id)->update([
            $request->column => $request->data
        ]);
    }

    public function deleteChartOfAccounts($request){
        return \App\Models\ChartsOfAccount::findoRFail($request->id)->delete();
    }
    
    public function addChartOfAccounts($request){
        return \App\Models\ChartsOfAccount::create([
            'account_type' => $request->account_type,
            'level1' => $request->level1,
            'level2' => $request->level2,
            'level3' => $request->level3,
            'name' => $request->name,
            'description' => $request->description ,
            'notes' => $request->notes,

        ]);
    }

    public function headDashboardGetStudents(){
        $totalStudents = \App\Models\Student::where('school_id', auth()->user()->school_id)->orderBy('created_at', 'desc')->get();
        $paidStudents = 1;
        $unpaidStudents = 2;
        return [
            'totalStudents' => $totalStudents->count(),
            'paidStudents' => $paidStudents,
            'unpaidStudents' => $unpaidStudents,
        ];
    }
}