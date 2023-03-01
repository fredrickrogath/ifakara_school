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

    public function updateChartOfAccount($request){
        return \App\Models\ChartsOfAccount::find($request->id)->update([
            $request->column => $request->data
        ]);
    }

    public function deleteChartOfAccounts($request){
        return \App\Models\ChartsOfAccount::findoRFail($request->id)->delete();
        // return \App\Models\ChartsOfAccount::find($request->id)->update([
        //     $request->column => $request->data
        // ]);
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
}