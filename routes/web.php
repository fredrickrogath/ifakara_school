<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;
use App\Models\Post;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    /*
    |--------------------------------------------------------------------------
    | ALL USER PASSWORD IS 123456789, LOGIN WITH EMAIL FROM DATABASE ACCORDING TO ROLES.
    |--------------------------------------------------------------------------
    |--------------------------------------------------------------------------
    | ROLES ARE DEFINED IN USER MODEL AT THE DOWN SIDE...FUNDI ADEVO THE DR
    |--------------------------------------------------------------------------
    */
    /*
    |--------------------------------------------------------------------------
    | FAKE DATA GENERATING ROUTE
    |--------------------------------------------------------------------------
    */
    // App\Models\User::factory()->count(100)->create();
    // App\Models\Post::factory()->count(1000)->create();
    // php artisan schedule:work
    //PROCUREMENT
    /*
    |--------------------------------------------------------------------------
    | END OF FAKE DATE GENERATING ROUTE
    |--------------------------------------------------------------------------
    */

    if (Auth::check()) {
        return redirect('/dashboard');
    } else {
        return redirect('/login');
    }
    // return Inertia::render('Welcome', [
    //     'canLogin' => Route::has('login'),
    //     'canRegister' => Route::has('register'),
    //     'laravelVersion' => Application::VERSION,
    //     'phpVersion' => PHP_VERSION,
    // ]);
});

Route::middleware([
    'auth:sanctum',
    'verified',
])->group(function () {

    /*
    |--------------------------------------------------------------------------
    | MAIN ROUTE FOR DETERMINING ROUTES PATH BASEED ON USER ROLE
    |--------------------------------------------------------------------------
    */

    Route::get('/dashboard', [\App\Http\Controllers\HomeController::class, 'DetermineUserRole'])->name('dashboard');

    Route::get('/logout_link', function() {
        Auth::logout();
        return redirect()->route('login');
    })->name('logout_link');

    /*
    |--------------------------------------------------------------------------
    | ROUTES FOR THE HEAD
    |--------------------------------------------------------------------------
    */

    Route::group(['prefix' => 'head', 'middleware' => 'is_head', 'as' => 'head.'], function () {
        /*
        |--------------------------------------------------------------------------
        | NAVIGATIONS
        |--------------------------------------------------------------------------
        */

        Route::get('/dashboard', [\App\Http\Controllers\Head\DashboardController::class, 'dashboard'])->name('dashboard');
        Route::get('/accountant_uploads', [\App\Http\Controllers\Head\DashboardController::class, 'accountant_uploads'])->name('accountant_uploads');
        Route::get('/accountant_invoices', [\App\Http\Controllers\Head\DashboardController::class, 'accountant_invoices'])->name('accountant_invoices');
        Route::get('/accountant_reports', [\App\Http\Controllers\Head\DashboardController::class, 'accountant_reports'])->name('accountant_reports');
        Route::get('/academic_uploads', [\App\Http\Controllers\Head\DashboardController::class, 'academic_uploads'])->name('academic_uploads');
        Route::get('/academic_students', [\App\Http\Controllers\Head\DashboardController::class, 'academic_students'])->name('academic_students');
        Route::get('/academic_invoices', [\App\Http\Controllers\Head\DashboardController::class, 'academic_invoices'])->name('academic_invoices');
        Route::get('/academic_reports', [\App\Http\Controllers\Head\DashboardController::class, 'academic_reports'])->name('academic_reports');
        Route::get('/procurement_item_registration', [\App\Http\Controllers\Head\DashboardController::class, 'procurement_item_registration'])->name('procurement_item_registration');
        Route::get('/procurement_uploads', [\App\Http\Controllers\Head\DashboardController::class, 'procurement_uploads'])->name('procurement_uploads');
        Route::get('/procurement_reports', [\App\Http\Controllers\Head\DashboardController::class, 'procurement_reports'])->name('procurement_reports');
        Route::get('/departments', [\App\Http\Controllers\Head\DashboardController::class, 'departments'])->name('departments');
        Route::get('/about_school', [\App\Http\Controllers\Head\DashboardController::class, 'about_school'])->name('about_school');     
        
        /*
        |--------------------------------------------------------------------------
        | DEPARTMENTS & STAFFS
        |--------------------------------------------------------------------------
        */

        Route::get('/getStaffs', [\App\Http\Controllers\Head\Department\DepartmentController::class, 'getStaffs'])->name('getStaffs');
        Route::get('/getStaffsNew', [\App\Http\Controllers\Head\Department\DepartmentController::class, 'getStaffsNew'])->name('getStaffsNew');
        Route::post('/addStaff', [\App\Http\Controllers\Head\Department\DepartmentController::class, 'addStaff'])->name('addStaff');
        Route::get('/getDepartments', [\App\Http\Controllers\Head\Department\DepartmentController::class, 'getDepartments'])->name('getDepartments');

        /*
        |--------------------------------------------------------------------------
        | INVOICES & ENTRIES
        |--------------------------------------------------------------------------
        */

        Route::get('/getInvoices', [\App\Http\Controllers\Head\Invoice\InvoiceController::class, 'getInvoices'])->name('getInvoices');
        Route::get('/getInvoicesCreation', [\App\Http\Controllers\Head\Invoice\InvoiceController::class, 'getInvoicesCreation'])->name('getInvoicesCreation');
        Route::post('/getInvoiceView', [\App\Http\Controllers\Head\Invoice\InvoiceController::class, 'getInvoiceView'])->name('getInvoiceView');
        Route::get('/getStarredInvoices', [\App\Http\Controllers\Head\Invoice\InvoiceController::class, 'getStarredInvoices'])->name('getStarredInvoices');
        Route::get('/getTrashedInvoices', [\App\Http\Controllers\Head\Invoice\InvoiceController::class, 'getTrashedInvoices'])->name('getTrashedInvoices');
        Route::get('/getTrashedCreateInvoice', [\App\Http\Controllers\Head\Invoice\InvoiceController::class, 'getTrashedCreateInvoice'])->name('getTrashedCreateInvoice');
        Route::post('/permanentDeleteInvoice', [\App\Http\Controllers\Head\Invoice\InvoiceController::class, 'permanentDeleteInvoice'])->name('permanentDeleteInvoice');
        Route::post('/restoreInvoice', [\App\Http\Controllers\Head\Invoice\InvoiceController::class, 'restoreInvoice'])->name('restoreInvoice');
        Route::post('/deleteInvoice', [\App\Http\Controllers\Head\Invoice\InvoiceController::class, 'deleteInvoice'])->name('deleteInvoice');
        Route::post('/deleteCreateInvoice', [\App\Http\Controllers\Head\Invoice\InvoiceController::class, 'deleteCreateInvoice'])->name('deleteCreateInvoice');
        Route::post('/starredInvoice', [\App\Http\Controllers\Head\Invoice\InvoiceController::class, 'starredInvoice'])->name('starredInvoice');
        Route::get('/acceptedInvoice', [\App\Http\Controllers\Head\Invoice\InvoiceController::class, 'acceptedInvoice'])->name('acceptedInvoice');
        Route::post('/acceptInvoice', [\App\Http\Controllers\Head\Invoice\InvoiceController::class, 'acceptInvoice'])->name('acceptInvoice');
        Route::get('/rejectedInvoice', [\App\Http\Controllers\Head\Invoice\InvoiceController::class, 'rejectedInvoice'])->name('rejectedInvoice');
        Route::get('/getLegerEntries', [\App\Http\Controllers\Head\Invoice\InvoiceController::class, 'getLegerEntries'])->name('getLegerEntries');
        Route::get('/getSpecificLegerEntries', [\App\Http\Controllers\Head\Invoice\InvoiceController::class, 'getSpecificLegerEntries'])->name('getSpecificLegerEntries');

        Route::post('/verifyInvoiceCreation', [\App\Http\Controllers\Head\Invoice\InvoiceController::class, 'verifyInvoiceCreation'])->name('verifyInvoiceCreation');

        /*
        |--------------------------------------------------------------------------
        | STUDENTS
        |--------------------------------------------------------------------------
        */

        Route::post('/processExcelFile', [\App\Http\Controllers\Head\Student\StudentController::class, 'processExcelFile'])->name('processExcelFile');
        Route::get('/getStudents', [\App\Http\Controllers\Head\Student\StudentController::class, 'getStudents'])->name('getStudents');
        Route::post('/addStudent', [\App\Http\Controllers\Head\Student\StudentController::class, 'addStudent'])->name('addStudent');
        Route::get('/getStudentClasses', [\App\Http\Controllers\Head\Student\StudentController::class, 'getStudentClasses'])->name('getStudentClasses');
        Route::get('/getStudentPayments', [\App\Http\Controllers\Head\Student\StudentController::class, 'getStudentPayments'])->name('getStudentPayments');

        Route::get('/getStudentsNew', [\App\Http\Controllers\Head\Student\StudentController::class, 'getStudentsNew'])->name('getStudentsNew');
        Route::post('/getStudent', [\App\Http\Controllers\Head\Student\StudentController::class, 'getStudent'])->name('getStudent');
        Route::post('/editStudent', [\App\Http\Controllers\Head\Student\StudentController::class, 'editStudent'])->name('editStudent');
        // Route::post('/permissionToEditStudent', [\App\Http\Controllers\Head\Student\StudentController::class, 'permissionToEditStudent'])->name('permissionToEditStudent');
        // Route::post('/checkPermissionToEditStudent', [\App\Http\Controllers\Head\Student\StudentController::class, 'checkPermissionToEditStudent'])->name('checkPermissionToEditStudent');
        // Route::post('/getCommentsForStudentPermission', [\App\Http\Controllers\Head\Student\StudentController::class, 'getCommentsForStudentPermission'])->name('getCommentsForStudentPermission');
        // Route::post('/addStudent', [\App\Http\Controllers\Head\Student\StudentController::class, 'addStudent'])->name('addStudent');
        Route::get('/getStudentClasses', [\App\Http\Controllers\Head\Student\StudentController::class, 'getStudentClasses'])->name('getStudentClasses');
        Route::post('/getComments', [\App\Http\Controllers\Head\Student\StudentController::class, 'getComments'])->name('getComments');
        Route::post('/sendComment', [\App\Http\Controllers\Head\Student\StudentController::class, 'sendComment'])->name('sendComment');

        Route::get('/headDashboardGetStudents', [\App\Http\Controllers\Head\Student\StudentController::class, 'headDashboardGetStudents'])->name('headDashboardGetStudents');
        Route::get('/headDashboardGetStaffs', [\App\Http\Controllers\Head\Department\DepartmentController::class, 'headDashboardGetStaffs'])->name('headDashboardGetStudents');
        Route::get('/headDashboardGetTools', [\App\Http\Controllers\Head\Tool\ToolController::class, 'headDashboardGetTools'])->name('headDashboardGetTools');
        Route::get('/headDashboardGetInvoices', [\App\Http\Controllers\Head\Invoice\InvoiceController::class, 'headDashboardGetInvoices'])->name('headDashboardGetInvoices');
        // Route::get('/headDashboardGetStudents', [\App\Http\Controllers\Head\Student\StudentController::class, 'headDashboardGetStudents'])->name('headDashboardGetStudents');
        // Route::get('/headDashboardGetStudents', [\App\Http\Controllers\Head\Student\StudentController::class, 'headDashboardGetStudents'])->name('headDashboardGetStudents');
        // Route::get('/headDashboardGetStudents', [\App\Http\Controllers\Head\Student\StudentController::class, 'headDashboardGetStudents'])->name('headDashboardGetStudents');
        // Route::get('/headDashboardGetStudents', [\App\Http\Controllers\Head\Student\StudentController::class, 'headDashboardGetStudents'])->name('headDashboardGetStudents');
        // Route::get('/headDashboardGetStudents', [\App\Http\Controllers\Head\Student\StudentController::class, 'headDashboardGetStudents'])->name('headDashboardGetStudents');
        
        /*
        |--------------------------------------------------------------------------
        | TOOLS
        |--------------------------------------------------------------------------
        */

        Route::get('/get_tools', [\App\Http\Controllers\Head\Tool\ToolController::class, 'get_tools'])->name('get_tools');
        Route::get('/getStarredTools', [\App\Http\Controllers\Head\Tool\ToolController::class, 'getStarredTools'])->name('getStarredTools');
        Route::get('/getTrashedTools', [\App\Http\Controllers\Head\Tool\ToolController::class, 'getTrashedTools'])->name('getTrashedTools');
        Route::post('/starredTools', [\App\Http\Controllers\Head\Tool\ToolController::class, 'starredTools'])->name('starredTools');
        Route::get('/getSellersList', [\App\Http\Controllers\Head\Tool\ToolController::class, 'getSellersList'])->name('getSellersList');

        /*
        |--------------------------------------------------------------------------
        | UPLOADS
        |--------------------------------------------------------------------------
        */

        Route::get('/getAcademicUploads', [\App\Http\Controllers\Head\Upload\UploadController::class, 'getAcademicUploads'])->name('getAcademicUploads');
        Route::get('/getAccountantUploads', [\App\Http\Controllers\Head\Upload\UploadController::class, 'getAccountantUploads'])->name('getAccountantUploads');
        Route::get('/getProcurementUploads', [\App\Http\Controllers\Head\Upload\UploadController::class, 'getProcurementUploads'])->name('getProcurementUploads');

        /*
        |--------------------------------------------------------------------------
        | ABOUT SCHOOL
        |--------------------------------------------------------------------------
        */

        Route::post('/registerSchool', [\App\Http\Controllers\Head\School\SchoolController::class, 'registerSchool'])->name('registerSchool');
        // Route::get('/getAccountantUploads', [\App\Http\Controllers\Head\Upload\UploadController::class, 'getAccountantUploads'])->name('getAccountantUploads');
        // Route::get('/getProcurementUploads', [\App\Http\Controllers\Head\Upload\UploadController::class, 'getProcurementUploads'])->name('getProcurementUploads');
    });


    /*
    |--------------------------------------------------------------------------
    | ROUTES FOR THE ACADEMIC
    |--------------------------------------------------------------------------
    */

    Route::group(['prefix' => 'academic', 'middleware' => 'is_academic', 'as' => 'academic.'], function () {
        /*
        |--------------------------------------------------------------------------
        | NAVIGATIONS
        |--------------------------------------------------------------------------
        */

        Route::get('/dashboard', [\App\Http\Controllers\Academic\DashboardController::class, 'dashboard'])->name('dashboard');
        Route::get('/students_registration', [\App\Http\Controllers\Academic\DashboardController::class, 'students_registration'])->name('students_registration');
        Route::get('/upload_results', [\App\Http\Controllers\Academic\DashboardController::class, 'upload_results'])->name('upload_results');
        Route::get('/view', [\App\Http\Controllers\Academic\DashboardController::class, 'view'])->name('view');
        Route::get('/uploads', [\App\Http\Controllers\Academic\DashboardController::class, 'uploads'])->name('uploads');
        Route::get('/departiment', [\App\Http\Controllers\Academic\DashboardController::class, 'departiment'])->name('departiment');
        Route::get('/reports', [\App\Http\Controllers\Academic\DashboardController::class, 'reports'])->name('reports');

        /*
        |--------------------------------------------------------------------------
        | STUDENTS
        |--------------------------------------------------------------------------
        */

        Route::get('/getStudents', [\App\Http\Controllers\Academic\Student\StudentController::class, 'getStudents'])->name('getStudents');
        Route::get('/getStudentsNew', [\App\Http\Controllers\Academic\Student\StudentController::class, 'getStudentsNew'])->name('getStudentsNew');
        Route::post('/getStudent', [\App\Http\Controllers\Academic\Student\StudentController::class, 'getStudent'])->name('getStudent');
        Route::get('/getStudentPayments', [\App\Http\Controllers\Academic\Student\StudentController::class, 'getStudentPayments'])->name('getStudentPayments');
        Route::post('/editStudent', [\App\Http\Controllers\Academic\Student\StudentController::class, 'editStudent'])->name('editStudent');
        Route::post('/permissionToEditStudent', [\App\Http\Controllers\Academic\Student\StudentController::class, 'permissionToEditStudent'])->name('permissionToEditStudent');
        Route::post('/checkPermissionToEditStudent', [\App\Http\Controllers\Academic\Student\StudentController::class, 'checkPermissionToEditStudent'])->name('checkPermissionToEditStudent');
        // Route::post('/getCommentsForStudentPermission', [\App\Http\Controllers\Academic\Student\StudentController::class, 'getCommentsForStudentPermission'])->name('getCommentsForStudentPermission');
        Route::post('/addStudent', [\App\Http\Controllers\Academic\Student\StudentController::class, 'addStudent'])->name('addStudent');
        Route::get('/getStudentClasses', [\App\Http\Controllers\Academic\Student\StudentController::class, 'getStudentClasses'])->name('getStudentClasses');
        Route::post('/getComments', [\App\Http\Controllers\Academic\Student\StudentController::class, 'getComments'])->name('getComments');
             Route::post('/sendComment', [\App\Http\Controllers\Academic\Student\StudentController::class, 'sendComment'])->name('sendComment');
             Route::get('/headDashboardGetStudents', [\App\Http\Controllers\Academic\Student\StudentController::class, 'headDashboardGetStudents'])->name('headDashboardGetStudents');
        
        /*
        |--------------------------------------------------------------------------
        | DEPARTMENTS & STAFFS
        |--------------------------------------------------------------------------
        */

        Route::get('/getStaffs', [\App\Http\Controllers\Academic\Department\DepartmentController::class, 'getStaffs'])->name('getStaffs');
        Route::get('/getStaffsNew', [\App\Http\Controllers\Academic\Department\DepartmentController::class, 'getStaffsNew'])->name('getStaffsNew');
        // Route::post('/addStaff', [\App\Http\Controllers\Academic\Department\DepartmentController::class, 'addStaff'])->name('addStaff');
        Route::get('/getDepartments', [\App\Http\Controllers\Academic\Department\DepartmentController::class, 'getDepartments'])->name('getDepartments');
        Route::get('/headDashboardGetStaffs', [\App\Http\Controllers\Academic\Department\DepartmentController::class, 'headDashboardGetStaffs'])->name('headDashboardGetStaffs');

        /*
        |--------------------------------------------------------------------------
        | UPLOADS
        |--------------------------------------------------------------------------
        */

        Route::post('/upload', [\App\Http\Controllers\Academic\Upload\UploadController::class, 'upload'])->name('upload');
        Route::get('/getUploads', [\App\Http\Controllers\Academic\Upload\UploadController::class, 'getUploads'])->name('getUploads');
        Route::get('/getNewUploads', [\App\Http\Controllers\Academic\Upload\UploadController::class, 'getNewUploads'])->name('getNewUploads');
        Route::get('/getTrashedUploads', [\App\Http\Controllers\Academic\Upload\UploadController::class, 'getTrashedUploads'])->name('getTrashedUploads');
        Route::post('/restoreUpload', [\App\Http\Controllers\Academic\Upload\UploadController::class, 'restoreUpload'])->name('restoreUpload');
        Route::post('/permanentDeleteUpload', [\App\Http\Controllers\Academic\Upload\UploadController::class, 'permanentDeleteUpload'])->name('permanentDeleteUpload');
        Route::post('/deleteUpload', [\App\Http\Controllers\Academic\Upload\UploadController::class, 'deleteUpload'])->name('deleteUpload');
        Route::get('/headDashboardGetUploads', [\App\Http\Controllers\Academic\Upload\UploadController::class, 'headDashboardGetUploads'])->name('headDashboardGetUploads');
    });



    /*
    |--------------------------------------------------------------------------
    | ROUTES FOR THE SECRETARY
    |--------------------------------------------------------------------------
    */

    // Route::group(['prefix' => 'secretary', 'middleware' => 'is_secretary', 'as' => 'secretary.'], function () {
    //     Route::get('/pageSix', [\App\Http\Controllers\Secretary\DashboardController::class, 'pageSix'])->name('pageSix');
    //     Route::get('/pageOne', [\App\Http\Controllers\Secretary\DashboardController::class, 'pageOne'])->name('pageOne');
    //     Route::get('/pageTwo', [\App\Http\Controllers\Secretary\DashboardController::class, 'pageTwo'])->name('pageTwo');
    //     Route::get('/pageFour', [\App\Http\Controllers\Secretary\DashboardController::class, 'pageFour'])->name('pageFour');
    //     Route::get('/pageFive', [\App\Http\Controllers\Secretary\DashboardController::class, 'pageFive'])->name('pageFive');
    //     Route::get('/dashboard', [\App\Http\Controllers\Secretary\DashboardController::class, 'dashboard'])->name('dashboard');
    //     Route::get('/pageThree', [\App\Http\Controllers\Secretary\DashboardController::class, 'pageThree'])->name('pageThree');
    //     Route::get('/pageSeven', [\App\Http\Controllers\Secretary\DashboardController::class, 'pageSeven'])->name('pageSeven');
    // });



    /*
    |--------------------------------------------------------------------------
    | ROUTES FOR THE ACCOUNTANT
    |--------------------------------------------------------------------------
    */

    Route::group(['prefix' => 'accountant', 'middleware' => 'is_accountant', 'as' => 'accountant.'], function () {
        /*
        |--------------------------------------------------------------------------
        | NAVIGATIONS
        |--------------------------------------------------------------------------
        */

        Route::get('/dashboard', [\App\Http\Controllers\Accountant\DashboardController::class, 'dashboard'])->name('dashboard');
        Route::get('/chart_of_accounts', [\App\Http\Controllers\Accountant\DashboardController::class, 'chart_of_accounts'])->name('chart_of_accounts');
        Route::get('/payment_details', [\App\Http\Controllers\Accountant\DashboardController::class, 'payment_details'])->name('payment_details');
        Route::get('/uploads', [\App\Http\Controllers\Accountant\DashboardController::class, 'uploads'])->name('uploads');
        Route::get('/reports', [\App\Http\Controllers\Accountant\DashboardController::class, 'reports'])->name('reports');
        Route::get('/invoice', [\App\Http\Controllers\Accountant\DashboardController::class, 'invoice'])->name('invoice');

        // Route::get('/headDashboardGetStudents', [\App\Http\Controllers\Head\Student\StudentController::class, 'headDashboardGetStudents'])->name('headDashboardGetStudents');
        // Route::get('/headDashboardGetStaffs', [\App\Http\Controllers\Head\Department\DepartmentController::class, 'headDashboardGetStaffs'])->name('headDashboardGetStudents');
        // Route::get('/headDashboardGetTools', [\App\Http\Controllers\Head\Tool\ToolController::class, 'headDashboardGetTools'])->name('headDashboardGetTools');
        // Route::get('/headDashboardGetInvoices', [\App\Http\Controllers\Head\Invoice\InvoiceController::class, 'headDashboardGetInvoices'])->name('headDashboardGetInvoices');

        /*
        |--------------------------------------------------------------------------
        | ENTRIES
        |--------------------------------------------------------------------------
        */

        Route::get('/getLegerEntries', [\App\Http\Controllers\Accountant\Invoice\ChatOfAccountController::class, 'getLegerEntries'])->name('getLegerEntries');
        Route::post('/getSpecificLegerEntries', [\App\Http\Controllers\Accountant\Invoice\ChatOfAccountController::class, 'getSpecificLegerEntries'])->name('getSpecificLegerEntries');
        Route::get('/searchStudent', [\App\Http\Controllers\Accountant\Invoice\ChatOfAccountController::class, 'searchStudent'])->name('searchStudent');
        Route::get('/getStudentClasses', [\App\Http\Controllers\Accountant\Invoice\ChatOfAccountController::class, 'getStudentClasses'])->name('getStudentClasses');
        Route::post('/entry', [\App\Http\Controllers\Accountant\Invoice\ChatOfAccountController::class, 'entry'])->name('entry');
        Route::post('/getSpecificStudent', [\App\Http\Controllers\Accountant\Invoice\ChatOfAccountController::class, 'getSpecificStudent'])->name('getSpecificStudent');
        Route::post('/changeClassLevel', [\App\Http\Controllers\Accountant\Invoice\ChatOfAccountController::class, 'changeClassLevel'])->name('changeClassLevel');
        
        /*
        |--------------------------------------------------------------------------
        | CHART OF ACCOUNTS
        |--------------------------------------------------------------------------
        */

        Route::get('/getChartOfAccounts', [\App\Http\Controllers\Accountant\Invoice\ChatOfAccountController::class, 'getChartOfAccounts'])->name('getChartOfAccounts');
        Route::post('/addChartOfAccounts', [\App\Http\Controllers\Accountant\Invoice\ChatOfAccountController::class, 'addChartOfAccounts'])->name('addChartOfAccounts');
        Route::post('/updateChartOfAccount', [\App\Http\Controllers\Accountant\Invoice\ChatOfAccountController::class, 'updateChartOfAccount'])->name('updateChartOfAccount');
        Route::post('/deleteChartOfAccounts', [\App\Http\Controllers\Accountant\Invoice\ChatOfAccountController::class, 'deleteChartOfAccounts'])->name('deleteChartOfAccounts');
        Route::get('/headDashboardGetStudents', [\App\Http\Controllers\Accountant\Invoice\ChatOfAccountController::class, 'headDashboardGetStudents'])->name('headDashboardGetStudents');

        Route::get('/getStudentsNew', [\App\Http\Controllers\Accountant\Invoice\ChatOfAccountController::class, 'getStudentsNew'])->name('getStudentsNew');
        Route::get('/getStudentPayments', [\App\Http\Controllers\Accountant\Invoice\ChatOfAccountController::class, 'getStudentPayments'])->name('getStudentPayments');
        /*
        |--------------------------------------------------------------------------
        | UPLOADS
        |--------------------------------------------------------------------------
        */

        Route::post('/upload', [\App\Http\Controllers\Accountant\Upload\UploadController::class, 'upload'])->name('upload');
        Route::get('/getUploads', [\App\Http\Controllers\Accountant\Upload\UploadController::class, 'getUploads'])->name('getUploads');
        Route::get('/getNewUploads', [\App\Http\Controllers\Accountant\Upload\UploadController::class, 'getNewUploads'])->name('getNewUploads');
        Route::get('/getTrashedUploads', [\App\Http\Controllers\Accountant\Upload\UploadController::class, 'getTrashedUploads'])->name('getTrashedUploads');
        Route::post('/restoreUpload', [\App\Http\Controllers\Accountant\Upload\UploadController::class, 'restoreUpload'])->name('restoreUpload');
        Route::post('/permanentDeleteUpload', [\App\Http\Controllers\Accountant\Upload\UploadController::class, 'permanentDeleteUpload'])->name('permanentDeleteUpload');
        Route::post('/deleteUpload', [\App\Http\Controllers\Accountant\Upload\UploadController::class, 'deleteUpload'])->name('deleteUpload');
        Route::get('/headDashboardGetUploads', [\App\Http\Controllers\Accountant\Upload\UploadController::class, 'headDashboardGetUploads'])->name('headDashboardGetUploads');

        /*
        |--------------------------------------------------------------------------
        | INVOICES
        |--------------------------------------------------------------------------
        */

        Route::get('/getInvoices', [\App\Http\Controllers\Accountant\Invoice\InvoiceController::class, 'getInvoices'])->name('getInvoices');
        Route::get('/getInvoicesCreation', [\App\Http\Controllers\Accountant\Invoice\InvoiceController::class, 'getInvoicesCreation'])->name('getInvoicesCreation');
        Route::post('/createInvoice', [\App\Http\Controllers\Accountant\Invoice\InvoiceController::class, 'createInvoice'])->name('createInvoice');
        Route::post('/deleteCreateInvoice', [\App\Http\Controllers\Accountant\Invoice\InvoiceController::class, 'deleteCreateInvoice'])->name('deleteCreateInvoice');
        Route::get('/getTrashedCreateInvoice', [\App\Http\Controllers\Accountant\Invoice\InvoiceController::class, 'getTrashedCreateInvoice'])->name('getTrashedCreateInvoice');
        Route::post('/restoreCreateInvoice', [\App\Http\Controllers\Accountant\Invoice\InvoiceController::class, 'restoreCreateInvoice'])->name('restoreCreateInvoice');
        Route::post('/getInvoiceView', [\App\Http\Controllers\Accountant\Invoice\InvoiceController::class, 'getInvoiceView'])->name('getInvoiceView');
        Route::get('/getStarredInvoices', [\App\Http\Controllers\Accountant\Invoice\InvoiceController::class, 'getStarredInvoices'])->name('getStarredInvoices');
        Route::get('/getTrashedInvoices', [\App\Http\Controllers\Accountant\Invoice\InvoiceController::class, 'getTrashedInvoices'])->name('getTrashedInvoices');
        Route::post('/permanentDeleteInvoice', [\App\Http\Controllers\Accountant\Invoice\InvoiceController::class, 'permanentDeleteInvoice'])->name('permanentDeleteInvoice');
        Route::post('/restoreInvoice', [\App\Http\Controllers\Accountant\Invoice\InvoiceController::class, 'restoreInvoice'])->name('restoreInvoice');
        Route::post('/deleteInvoice', [\App\Http\Controllers\Accountant\Invoice\InvoiceController::class, 'deleteInvoice'])->name('deleteInvoice');
        Route::post('/starredInvoice', [\App\Http\Controllers\Accountant\Invoice\InvoiceController::class, 'starredInvoice'])->name('starredInvoice');
        Route::get('/acceptedInvoice', [\App\Http\Controllers\Accountant\Invoice\InvoiceController::class, 'acceptedInvoice'])->name('acceptedInvoice');
        Route::post('/acceptInvoice', [\App\Http\Controllers\Accountant\Invoice\InvoiceController::class, 'acceptInvoice'])->name('acceptInvoice');
        Route::get('/rejectedInvoice', [\App\Http\Controllers\Accountant\Invoice\InvoiceController::class, 'rejectedInvoice'])->name('rejectedInvoice');
        Route::get('/headDashboardGetInvoices', [\App\Http\Controllers\Accountant\Invoice\InvoiceController::class, 'headDashboardGetInvoices'])->name('headDashboardGetInvoices');
    });



    /*
    |--------------------------------------------------------------------------
    | ROUTES FOR THE PROCUREMENT
    |--------------------------------------------------------------------------
    */

    Route::group(['prefix' => 'procurement', 'middleware' => 'is_procurement', 'as' => 'procurement.'], function () {

        /*
        |--------------------------------------------------------------------------
        | NAVIGATIONS
        |--------------------------------------------------------------------------
        */

        Route::get('/dashboard', [\App\Http\Controllers\Procurement\DashboardController::class, 'dashboard'])->name('dashboard');
        Route::get('/tools', [\App\Http\Controllers\Procurement\DashboardController::class, 'tools'])->name('tools');
        Route::get('/invoice', [\App\Http\Controllers\Procurement\DashboardController::class, 'invoice'])->name('invoice');
        Route::get('/uploads', [\App\Http\Controllers\Procurement\DashboardController::class, 'uploads'])->name('uploads');
        Route::get('/reports', [\App\Http\Controllers\Procurement\DashboardController::class, 'reports'])->name('reports');

        /*
        |--------------------------------------------------------------------------
        | TOOLS
        |--------------------------------------------------------------------------
        */

        Route::post('/add_tool', [\App\Http\Controllers\Procurement\Tools\ToolsController::class, 'add_tool'])->name('add_tool');
        Route::post('/addBrokenTool', [\App\Http\Controllers\Procurement\Tools\ToolsController::class, 'addBrokenTool'])->name('addBrokenTool');
        Route::get('/get_tools', [\App\Http\Controllers\Procurement\Tools\ToolsController::class, 'get_tools'])->name('get_tools');
        Route::get('/getBrokenTools', [\App\Http\Controllers\Procurement\Tools\ToolsController::class, 'getBrokenTools'])->name('getBrokenTools');
        Route::get('/getStarredTools', [\App\Http\Controllers\Procurement\Tools\ToolsController::class, 'getStarredTools'])->name('getStarredTools');
        Route::get('/getTrashedTools', [\App\Http\Controllers\Procurement\Tools\ToolsController::class, 'getTrashedTools'])->name('getTrashedTools');
        Route::post('/updateTools', [\App\Http\Controllers\Procurement\Tools\ToolsController::class, 'updateTools'])->name('updateTools');
        Route::post('/deleteTools', [\App\Http\Controllers\Procurement\Tools\ToolsController::class, 'deleteTools'])->name('deleteTools');
        Route::post('/restoreTools', [\App\Http\Controllers\Procurement\Tools\ToolsController::class, 'restoreTools'])->name('restoreTools');
        Route::post('/permanentDeleteTools', [\App\Http\Controllers\Procurement\Tools\ToolsController::class, 'permanentDeleteTools'])->name('permanentDeleteTools');
        Route::post('/starredTools', [\App\Http\Controllers\Procurement\Tools\ToolsController::class, 'starredTools'])->name('starredTools');
        Route::get('/headDashboardGetTools', [\App\Http\Controllers\Procurement\Tools\ToolsController::class, 'headDashboardGetTools'])->name('headDashboardGetTools');

        Route::get('/getSellersList', [\App\Http\Controllers\Procurement\Tools\ToolsController::class, 'getSellersList'])->name('getSellersList');
        Route::post('/addSeller', [\App\Http\Controllers\Procurement\Tools\ToolsController::class, 'addSeller'])->name('addSeller');

        /*
        |--------------------------------------------------------------------------
        | INVOICES
        |--------------------------------------------------------------------------
        */

        Route::get('/getTools', [\App\Http\Controllers\Procurement\Invoice\InvoiceController::class, 'getTools'])->name('getTools');
        Route::get('/getSellers', [\App\Http\Controllers\Procurement\Invoice\InvoiceController::class, 'getSellers'])->name('getSellers');
        Route::post('/addInvoice', [\App\Http\Controllers\Procurement\Invoice\InvoiceController::class, 'addInvoice'])->name('addInvoice');
        Route::get('/getInvoices', [\App\Http\Controllers\Procurement\Invoice\InvoiceController::class, 'getInvoices'])->name('getInvoices');
        Route::post('/getInvoiceView', [\App\Http\Controllers\Procurement\Invoice\InvoiceController::class, 'getInvoiceView'])->name('getInvoiceView');
        Route::get('/getStarredInvoices', [\App\Http\Controllers\Procurement\Invoice\InvoiceController::class, 'getStarredInvoices'])->name('getStarredInvoices');
        Route::get('/getTrashedInvoices', [\App\Http\Controllers\Procurement\Invoice\InvoiceController::class, 'getTrashedInvoices'])->name('getTrashedInvoices');
        Route::post('/updateInvoice', [\App\Http\Controllers\Procurement\Invoice\InvoiceController::class, 'updateInvoice'])->name('updateInvoice');
        Route::post('/restoreInvoice', [\App\Http\Controllers\Procurement\Invoice\InvoiceController::class, 'restoreInvoice'])->name('restoreInvoice');
        Route::post('/permanentDeleteInvoice', [\App\Http\Controllers\Procurement\Invoice\InvoiceController::class, 'permanentDeleteInvoice'])->name('permanentDeleteInvoice');
        Route::post('/starredInvoice', [\App\Http\Controllers\Procurement\Invoice\InvoiceController::class, 'starredInvoice'])->name('starredInvoice');
        Route::post('/deleteInvoice', [\App\Http\Controllers\Procurement\Invoice\InvoiceController::class, 'deleteInvoice'])->name('deleteInvoice');
        Route::post('/starredInvoices', [\App\Http\Controllers\Procurement\Invoice\InvoiceController::class, 'starredInvoices'])->name('starredInvoices');
        Route::post('/submitInvoice', [\App\Http\Controllers\Procurement\Invoice\InvoiceController::class, 'submitInvoice'])->name('submitInvoice');
        Route::get('/headDashboardGetInvoices', [\App\Http\Controllers\Procurement\Invoice\InvoiceController::class, 'headDashboardGetInvoices'])->name('headDashboardGetInvoices');


        /*
        |--------------------------------------------------------------------------
        | UPLOADS
        |--------------------------------------------------------------------------
        */

        Route::post('/upload', [\App\Http\Controllers\Procurement\Upload\UploadController::class, 'upload'])->name('upload');
        Route::get('/getUploads', [\App\Http\Controllers\Procurement\Upload\UploadController::class, 'getUploads'])->name('getUploads');
        Route::get('/getNewUploads', [\App\Http\Controllers\Procurement\Upload\UploadController::class, 'getNewUploads'])->name('getNewUploads');
        Route::get('/getTrashedUploads', [\App\Http\Controllers\Procurement\Upload\UploadController::class, 'getTrashedUploads'])->name('getTrashedUploads');
        Route::post('/restoreUpload', [\App\Http\Controllers\Procurement\Upload\UploadController::class, 'restoreUpload'])->name('restoreUpload');
        Route::post('/permanentDeleteUpload', [\App\Http\Controllers\Procurement\Upload\UploadController::class, 'permanentDeleteUpload'])->name('permanentDeleteUpload');
        Route::post('/deleteUpload', [\App\Http\Controllers\Procurement\Upload\UploadController::class, 'deleteUpload'])->name('deleteUpload');
        Route::get('/headDashboardGetUploads', [\App\Http\Controllers\Procurement\Upload\UploadController::class, 'headDashboardGetUploads'])->name('headDashboardGetUploads');
    });

    

    /*
    |--------------------------------------------------------------------------
    | ROUTES FOR THE ACOUNTANT MAIN
    |--------------------------------------------------------------------------
    */

    // Route::group(['prefix' => 'accountant_main', 'middleware' => 'is_accountant_main', 'as' => 'accountant_main.'], function () {
    //     Route::get('/pageSix', [\App\Http\Controllers\AccountantMain\DashboardController::class, 'pageSix'])->name('pageSix');
    //     Route::get('/pageOne', [\App\Http\Controllers\AccountantMain\DashboardController::class, 'pageOne'])->name('pageOne');
    //     Route::get('/pageTwo', [\App\Http\Controllers\AccountantMain\DashboardController::class, 'pageTwo'])->name('pageTwo');
    //     Route::get('/pageFour', [\App\Http\Controllers\AccountantMain\DashboardController::class, 'pageFour'])->name('pageFour');
    //     Route::get('/pageFive', [\App\Http\Controllers\AccountantMain\DashboardController::class, 'pageFive'])->name('pageFive');
    //     Route::get('/dashboard', [\App\Http\Controllers\AccountantMain\DashboardController::class, 'dashboard'])->name('dashboard');
    //     Route::get('/pageThree', [\App\Http\Controllers\AccountantMain\DashboardController::class, 'pageThree'])->name('pageThree');
    //     Route::get('/pageSeven', [\App\Http\Controllers\AccountantMain\DashboardController::class, 'pageSeven'])->name('pageSeven');
    // });



    /*
    |--------------------------------------------------------------------------
    | ROUTES FOR THE INTERNAL AUDITOR
    |--------------------------------------------------------------------------
    */

    // Route::group(['prefix' => 'internal_auditor', 'middleware' => 'is_internal_auditor', 'as' => 'internal_auditor.'], function () {
    //     Route::get('/pageSix', [\App\Http\Controllers\InternalAuditor\DashboardController::class, 'pageSix'])->name('pageSix');
    //     Route::get('/pageOne', [\App\Http\Controllers\InternalAuditor\DashboardController::class, 'pageOne'])->name('pageOne');
    //     Route::get('/pageTwo', [\App\Http\Controllers\InternalAuditor\DashboardController::class, 'pageTwo'])->name('pageTwo');
    //     Route::get('/pageFour', [\App\Http\Controllers\InternalAuditor\DashboardController::class, 'pageFour'])->name('pageFour');
    //     Route::get('/pageFive', [\App\Http\Controllers\InternalAuditor\DashboardController::class, 'pageFive'])->name('pageFive');
    //     Route::get('/dashboard', [\App\Http\Controllers\InternalAuditor\DashboardController::class, 'dashboard'])->name('dashboard');
    //     Route::get('/pageThree', [\App\Http\Controllers\InternalAuditor\DashboardController::class, 'pageThree'])->name('pageThree');
    //     Route::get('/pageSeven', [\App\Http\Controllers\InternalAuditor\DashboardController::class, 'pageSeven'])->name('pageSeven');
    // });

});






/*
|--------------------------------------------------------------------------
| ROTES FOR TESTING DURING DEVELOPMENT
|--------------------------------------------------------------------------
*/


    // Route::get('/trigger', function () {
    //     // public function getSellers(){
    //         return \App\Http\Resources\NotificationResource::collection(\App\Models\Notification::get());
    //     // }
    // // echo "<p>You have sent $data</p>";
    // // event(new App\Events\NewPostPublished($data));
    // });

    // Route::get('/trigger/{data}', function ($data) {
    //     echo "<p>You have sent $data</p>";
    //     event(new \App\Events\ApiSecretaryStudentEvent($data));
    //     });

    
    // Route::get('storagee/', function($fileName){
    //     return Storage::disk('public')->url('storage/systemFiles/images/1.jpg');
    // });

    //Add fake users for testing
    // Route::get('/add/users', function () {
    // // dd(\App\Models\User::with(['posts' => function($query) {
    // //     // $query->orderBy('id','desc');
    // // }])->get()->first());

    // // dd(\App\Models\Post::with(['user' => function($query) {
    // //     // $query->orderBy('id','desc');
    // // }])->get()->first());

    // // App\Models\User::factory()->count(100)->create();
    // });

    
    //Route for getting more posts on the scroll component
    // Route::middleware(['auth:sanctum', 'verified'])->get('/posts', function () {
    //     return Response::json([
    //         'data' => Post::paginate(9)
    //     ], 201);
    // })->name('posts');