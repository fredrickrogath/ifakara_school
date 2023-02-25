<?php

namespace App\Services\AccountantServices\InvoiceServices;

class ChatOfAccountService
{
    public function getLegerEntries(){
        return \App\Models\ChartsOfAccount::all();
    }
}