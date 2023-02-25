<?php

namespace App\Services\AccountantServices\InvoiceServices;

class StudentService
{
    public function searchStudent(){
        return \App\Models\Student::with('user')->get();
    }
}