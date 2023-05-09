<?php

namespace App\Http\Controllers\Academic\Payment;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    //
    public function __construct(){
        $this->middleware('check_screen_size');
    }
}
