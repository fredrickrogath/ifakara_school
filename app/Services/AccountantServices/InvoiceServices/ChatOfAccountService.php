<?php

namespace App\Services\AccountantServices\InvoiceServices;

class ChatOfAccountService
{
    public function getSpecificLegerEntries(){
        return \App\Models\ChartsOfAccount::where('account_type' ,'=', 'Income')->get();
    }

    public function getLegerEntries(){
        return \App\Models\TuitionFee::get();
    }
}