<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::group(['prefix' => 'accountant', 'as' => 'accountant.'], function () {
    // Route::post('/shareInvoiceWithFinancial', [\App\Http\Controllers\Accountant\Invoice\InvoiceController::class, 'invoiceFromSchool'])->name('invoiceFromSchool');

    Route::get('/getInvoices', [\App\Http\Controllers\Accountant\Invoice\API\InvoiceController::class, 'getInvoices'])->name('getInvoices');
        Route::post('/getInvoiceView', [\App\Http\Controllers\Accountant\Invoice\API\InvoiceController::class, 'getInvoiceView'])->name('getInvoiceView');
        Route::get('/getStarredInvoices', [\App\Http\Controllers\Accountant\Invoice\API\InvoiceController::class, 'getStarredInvoices'])->name('getStarredInvoices');
        Route::get('/getTrashedInvoices', [\App\Http\Controllers\Accountant\Invoice\API\InvoiceController::class, 'getTrashedInvoices'])->name('getTrashedInvoices');
        Route::post('/permanentDeleteInvoice', [\App\Http\Controllers\Accountant\Invoice\API\InvoiceController::class, 'permanentDeleteInvoice'])->name('permanentDeleteInvoice');
        Route::post('/restoreInvoice', [\App\Http\Controllers\Accountant\Invoice\API\InvoiceController::class, 'restoreInvoice'])->name('restoreInvoice');
        Route::post('/deleteInvoice', [\App\Http\Controllers\Accountant\Invoice\API\InvoiceController::class, 'deleteInvoice'])->name('deleteInvoice');
        Route::post('/starredInvoice', [\App\Http\Controllers\Accountant\Invoice\API\InvoiceController::class, 'starredInvoice'])->name('starredInvoice');
        Route::get('/acceptedInvoice', [\App\Http\Controllers\Accountant\Invoice\API\InvoiceController::class, 'acceptedInvoice'])->name('acceptedInvoice');
        Route::post('/acceptInvoice', [\App\Http\Controllers\Accountant\Invoice\API\InvoiceController::class, 'acceptInvoice'])->name('acceptInvoice');
        Route::get('/rejectedInvoice', [\App\Http\Controllers\Accountant\Invoice\API\InvoiceController::class, 'rejectedInvoice'])->name('rejectedInvoice');
});