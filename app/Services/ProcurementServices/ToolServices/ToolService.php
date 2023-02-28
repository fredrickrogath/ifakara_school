<?php

namespace App\Services\ProcurementServices\ToolServices;

class ToolService
{
    public function add_tool($request){
        $created = \App\Models\Tool::create([
            'name' => $request->name,
            'price' => $request->price,
            'count' => $request->count,
            'description' => $request->narration,

        ]);

        if($created){
            return true;
        }
        return false;
    }

    public function get_tools(){
        return \App\Models\Tool::orderBy('created_at', 'desc')->get();
    }

    // public function getChartOfAccounts(){
    //     return \App\Models\ChartsOfAccount::orderBy('created_at', 'desc')->get();
    // }
}