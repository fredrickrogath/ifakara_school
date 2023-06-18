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

    // INVOICE DATA FOR THE FINANCE ACCOUNTANT

    Route::post('/getInvoicesFinancial', [\App\Http\Controllers\Accountant\Invoice\InvoiceController::class, 'getInvoicesFinancial'])->name('getInvoicesFinancial');
    // Route::post('/getInvoiceView', [\App\Http\Controllers\Accountant\Invoice\InvoiceController::class, 'getInvoiceView'])->name('getInvoiceView');
    // Route::get('/getStarredInvoices', [\App\Http\Controllers\Accountant\Invoice\InvoiceController::class, 'getStarredInvoices'])->name('getStarredInvoices');
    // Route::get('/getTrashedInvoices', [\App\Http\Controllers\Accountant\Invoice\InvoiceController::class, 'getTrashedInvoices'])->name('getTrashedInvoices');
    // Route::post('/permanentDeleteInvoice', [\App\Http\Controllers\Accountant\Invoice\InvoiceController::class, 'permanentDeleteInvoice'])->name('permanentDeleteInvoice');
    // Route::post('/restoreInvoice', [\App\Http\Controllers\Accountant\Invoice\InvoiceController::class, 'restoreInvoice'])->name('restoreInvoice');
    // Route::post('/deleteInvoice', [\App\Http\Controllers\Accountant\Invoice\InvoiceController::class, 'deleteInvoice'])->name('deleteInvoice');
    // Route::post('/starredInvoice', [\App\Http\Controllers\Accountant\Invoice\InvoiceController::class, 'starredInvoice'])->name('starredInvoice');
    // Route::get('/acceptedInvoice', [\App\Http\Controllers\Accountant\Invoice\InvoiceController::class, 'acceptedInvoice'])->name('acceptedInvoice');
    // Route::post('/acceptInvoice', [\App\Http\Controllers\Accountant\Invoice\InvoiceController::class, 'acceptInvoice'])->name('acceptInvoice');
    // Route::get('/rejectedInvoice', [\App\Http\Controllers\Accountant\Invoice\InvoiceController::class, 'rejectedInvoice'])->name('rejectedInvoice');
    // Route::get('/headDashboardGetInvoices', [\App\Http\Controllers\Accountant\Invoice\InvoiceController::class, 'headDashboardGetInvoices'])->name('headDashboardGetInvoices');

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

            Route::post('/getToolDashboardDataToFinancial', [\App\Http\Controllers\Procurement\Tools\ToolsController::class, 'getToolDashboardDataToFinancial'])->name('getToolDashboardDataToFinancial');
            Route::post('/getInvoiceDashboardDataToFinancial', [\App\Http\Controllers\Procurement\Invoice\InvoiceController::class, 'getInvoiceDashboardDataToFinancial'])->name('getInvoiceDashboardDataToFinancial');
        });

        Route::group(['prefix' => 'procurement', 'as' => 'procurement.'], function () {
        //     Route::post('/add_tool', [\App\Http\Controllers\Procurement\Tools\ToolsController::class, 'add_tool'])->name('add_tool');
        // Route::post('/addBrokenTool', [\App\Http\Controllers\Procurement\Tools\ToolsController::class, 'addBrokenTool'])->name('addBrokenTool');
        Route::post('/getToolsForInternalAuditor', [\App\Http\Controllers\Procurement\Tools\ToolsController::class, 'getToolsForInternalAuditor'])->name('getToolsForInternalAuditor');
        // Route::get('/getBrokenTools', [\App\Http\Controllers\Procurement\Tools\ToolsController::class, 'getBrokenTools'])->name('getBrokenTools');
        // Route::get('/getStarredTools', [\App\Http\Controllers\Procurement\Tools\ToolsController::class, 'getStarredTools'])->name('getStarredTools');
        // Route::get('/getTrashedTools', [\App\Http\Controllers\Procurement\Tools\ToolsController::class, 'getTrashedTools'])->name('getTrashedTools');
        // Route::post('/updateTools', [\App\Http\Controllers\Procurement\Tools\ToolsController::class, 'updateTools'])->name('updateTools');
        // Route::post('/deleteTools', [\App\Http\Controllers\Procurement\Tools\ToolsController::class, 'deleteTools'])->name('deleteTools');
        // Route::post('/restoreTools', [\App\Http\Controllers\Procurement\Tools\ToolsController::class, 'restoreTools'])->name('restoreTools');
        // Route::post('/permanentDeleteTools', [\App\Http\Controllers\Procurement\Tools\ToolsController::class, 'permanentDeleteTools'])->name('permanentDeleteTools');
        // Route::post('/starredTools', [\App\Http\Controllers\Procurement\Tools\ToolsController::class, 'starredTools'])->name('starredTools');
        // Route::get('/headDashboardGetTools', [\App\Http\Controllers\Procurement\Tools\ToolsController::class, 'headDashboardGetTools'])->name('headDashboardGetTools');

        // Route::get('/getSellersList', [\App\Http\Controllers\Procurement\Tools\ToolsController::class, 'getSellersList'])->name('getSellersList');
        // Route::post('/addSeller', [\App\Http\Controllers\Procurement\Tools\ToolsController::class, 'addSeller'])->name('addSeller');
        });
        
