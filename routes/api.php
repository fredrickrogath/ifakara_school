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

/*
        |--------------------------------------------------------------------------
        | DEPARTMENTS & STAFFS
        |--------------------------------------------------------------------------
        */
        Route::group(['prefix' => 'secretary', 'as' => 'secretary.'], function () {

            Route::get('/getStaffs', [\App\Http\Controllers\Secretary\Staff\StaffController::class, 'getStaffs'])->name('getStaffs');
            Route::get('/getStudents', [\App\Http\Controllers\Secretary\Student\StudentController::class, 'getStudents'])->name('getStudents');
            Route::post('/addStaff', [\App\Http\Controllers\Secretary\SecretaryController::class, 'addStaff'])->name('addStaff');
            Route::post('/getDepartments', [\App\Http\Controllers\Secretary\Staff\StaffController::class, 'getDepartments'])->name('getDepartments');
    
    
    
            Route::get('/getSchools', [\App\Http\Controllers\Secretary\Schools\SchoolController::class, 'getSchools'])->name('getSchools');
            Route::post('/addStaff', [\App\Http\Controllers\Secretary\Schools\SchoolController::class, 'addStaff'])->name('addStaff');
            Route::post('/getSchoolStaffs', [\App\Http\Controllers\Secretary\Schools\SchoolController::class, 'getSchoolStaffs'])->name('getSchoolStaffs');
            Route::post('/getSchoolStudents', [\App\Http\Controllers\Secretary\Schools\SchoolController::class, 'getSchoolStudents'])->name('getSchoolStudents');
            Route::get('/getSchoolPermissions', [\App\Http\Controllers\Secretary\Schools\SchoolController::class, 'getSchoolPermissions'])->name('getSchoolPermissions');
            Route::get('/getSchoolPermissionsNotifications', [\App\Http\Controllers\Secretary\Schools\SchoolController::class, 'getSchoolPermissionsNotifications'])->name('getSchoolPermissionsNotifications');
            Route::post('/alterPermission', [\App\Http\Controllers\Secretary\Schools\SchoolController::class, 'alterPermission'])->name('alterPermission');
            Route::post('/getComments', [\App\Http\Controllers\Secretary\Schools\SchoolController::class, 'getComments'])->name('getComments');
            Route::post('/sendComment', [\App\Http\Controllers\Secretary\Schools\SchoolController::class, 'sendComment'])->name('sendComment');
     
            Route::post('/registerSchool', [\App\Http\Controllers\Secretary\Schools\SchoolController::class, 'registerSchool'])->name('registerSchool');

            Route::post('/getToolDashboardData', [\App\Http\Controllers\Procurement\Tools\ToolsController::class, 'getToolDashboardData'])->name('getToolDashboardData');
            Route::post('/getInvoiceDashboardData', [\App\Http\Controllers\Procurement\Invoice\InvoiceController::class, 'getInvoiceDashboardData'])->name('getInvoiceDashboardData');
        });

        // Route::group(['prefix' => 'procurement', 'middleware' => 'is_procurement', 'as' => 'procurement.'], function () {
            
        // });
        
