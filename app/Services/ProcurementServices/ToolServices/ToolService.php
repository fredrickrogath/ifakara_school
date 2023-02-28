<?php

namespace App\Services\ProcurementServices\ToolServices;

class ToolService
{
    public function add_tool(){
        $created = \App\Models\Tool::create([
            'name' => 'test 1',
            'price' => 10000,
            'count' => 3,
            'description' => 'blablabla',

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