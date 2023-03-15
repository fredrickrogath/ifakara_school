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

        Route::get('/getStaffs', [\App\Http\Controllers\Head\Department\DepartmentController::class, 'getStaffs'])->name('getStaffs');
        Route::post('/addStaff', [\App\Http\Controllers\Head\Department\DepartmentController::class, 'addStaff'])->name('addStaff');
        Route::get('/getDepartments', [\App\Http\Controllers\Head\Department\DepartmentController::class, 'getDepartments'])->name('getDepartments');
    });


    /*
    |--------------------------------------------------------------------------
    | ROUTES FOR THE BISHOP
    |--------------------------------------------------------------------------
    */

    // Route::group(['prefix' => 'bishop', 'middleware' => 'is_bishop', 'as' => 'bishop.'], function () {
    //     Route::get('/pageSix', [\App\Http\Controllers\Bishop\DashboardController::class, 'pageSix'])->name('pageSix');
    //     Route::get('/pageOne', [\App\Http\Controllers\Bishop\DashboardController::class, 'pageOne'])->name('pageOne');
    //     Route::get('/pageTwo', [\App\Http\Controllers\Bishop\DashboardController::class, 'pageTwo'])->name('pageTwo');
    //     Route::get('/pageFour', [\App\Http\Controllers\Bishop\DashboardController::class, 'pageFour'])->name('pageFour');
    //     Route::get('/pageFive', [\App\Http\Controllers\Bishop\DashboardController::class, 'pageFive'])->name('pageFive');
    //     Route::get('/dashboard', [\App\Http\Controllers\Bishop\DashboardController::class, 'dashboard'])->name('dashboard');
    //     Route::get('/pageThree', [\App\Http\Controllers\Bishop\DashboardController::class, 'pageThree'])->name('pageThree');
    //     Route::get('/pageSeven', [\App\Http\Controllers\Bishop\DashboardController::class, 'pageSeven'])->name('pageSeven');
    // });



    /*
    |--------------------------------------------------------------------------
    | ROUTES FOR THE ACADEMIC
    |--------------------------------------------------------------------------
    */

    Route::group(['prefix' => 'academic', 'middleware' => 'is_academic', 'as' => 'academic.'], function () {
        Route::get('/dashboard', [\App\Http\Controllers\Academic\DashboardController::class, 'dashboard'])->name('dashboard');
        Route::get('/students_registration', [\App\Http\Controllers\Academic\DashboardController::class, 'students_registration'])->name('students_registration');
        Route::get('/upload_results', [\App\Http\Controllers\Academic\DashboardController::class, 'upload_results'])->name('upload_results');
        Route::get('/view', [\App\Http\Controllers\Academic\DashboardController::class, 'view'])->name('view');
        Route::get('/staffs', [\App\Http\Controllers\Academic\DashboardController::class, 'staffs'])->name('staffs');
        Route::get('/departiment', [\App\Http\Controllers\Academic\DashboardController::class, 'departiment'])->name('departiment');
        Route::get('/reports', [\App\Http\Controllers\Academic\DashboardController::class, 'reports'])->name('reports');

        Route::get('/getStudents', [\App\Http\Controllers\Academic\Student\StudentController::class, 'getStudents'])->name('getStudents');
        Route::post('/addStudent', [\App\Http\Controllers\Academic\Student\StudentController::class, 'addStudent'])->name('addStudent');
        Route::get('/getStudentClasses', [\App\Http\Controllers\Academic\Student\StudentController::class, 'getStudentClasses'])->name('getStudentClasses');
        // Route::post('/getInvoiceView', [\App\Http\Controllers\Academic\Student\StudentController::class, 'getInvoiceView'])->name('getInvoiceView');
        // Route::get('/getStarredInvoices', [\App\Http\Controllers\Academic\Student\StudentController::class, 'getStarredInvoices'])->name('getStarredInvoices');
        // Route::get('/getTrashedInvoices', [\App\Http\Controllers\Academic\Student\StudentController::class, 'getTrashedInvoices'])->name('getTrashedInvoices');
        // Route::post('/permanentDeleteInvoice', [\App\Http\Controllers\Academic\Student\StudentController::class, 'permanentDeleteInvoice'])->name('permanentDeleteInvoice');
        // Route::post('/restoreInvoice', [\App\Http\Controllers\Academic\Student\StudentController::class, 'restoreInvoice'])->name('restoreInvoice');
        // Route::post('/deleteInvoice', [\App\Http\Controllers\Academic\Student\StudentController::class, 'deleteInvoice'])->name('deleteInvoice');
        // Route::post('/starredInvoice', [\App\Http\Controllers\Academic\Student\StudentController::class, 'starredInvoice'])->name('starredInvoice');
        // Route::get('/acceptedInvoice', [\App\Http\Controllers\Academic\Student\StudentController::class, 'acceptedInvoice'])->name('acceptedInvoice');
        // Route::post('/acceptInvoice', [\App\Http\Controllers\Academic\Student\StudentController::class, 'acceptInvoice'])->name('acceptInvoice');
        // Route::get('/rejectedInvoice', [\App\Http\Controllers\Academic\Student\StudentController::class, 'rejectedInvoice'])->name('rejectedInvoice');
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
        Route::get('/dashboard', [\App\Http\Controllers\Accountant\DashboardController::class, 'dashboard'])->name('dashboard');
        Route::get('/chart_of_accounts', [\App\Http\Controllers\Accountant\DashboardController::class, 'chart_of_accounts'])->name('chart_of_accounts');
        Route::get('/payment_details', [\App\Http\Controllers\Accountant\DashboardController::class, 'payment_details'])->name('payment_details');
        Route::get('/uploads', [\App\Http\Controllers\Accountant\DashboardController::class, 'uploads'])->name('uploads');
        Route::get('/reports', [\App\Http\Controllers\Accountant\DashboardController::class, 'reports'])->name('reports');
        Route::get('/invoice', [\App\Http\Controllers\Accountant\DashboardController::class, 'invoice'])->name('invoice');


        Route::get('/getLegerEntries', [\App\Http\Controllers\Accountant\Invoice\ChatOfAccountController::class, 'getLegerEntries'])->name('getLegerEntries');
        Route::get('/getSpecificLegerEntries', [\App\Http\Controllers\Accountant\Invoice\ChatOfAccountController::class, 'getSpecificLegerEntries'])->name('getSpecificLegerEntries');
        Route::get('/searchStudent', [\App\Http\Controllers\Accountant\Invoice\ChatOfAccountController::class, 'searchStudent'])->name('searchStudent');
        Route::post('/submitTuitionFee', [\App\Http\Controllers\Accountant\Invoice\ChatOfAccountController::class, 'submitTuitionFee'])->name('submitTuitionFee');

        Route::get('/getChartOfAccounts', [\App\Http\Controllers\Accountant\Invoice\ChatOfAccountController::class, 'getChartOfAccounts'])->name('getChartOfAccounts');
        Route::post('/addChartOfAccounts', [\App\Http\Controllers\Accountant\Invoice\ChatOfAccountController::class, 'addChartOfAccounts'])->name('addChartOfAccounts');
        Route::post('/updateChartOfAccount', [\App\Http\Controllers\Accountant\Invoice\ChatOfAccountController::class, 'updateChartOfAccount'])->name('updateChartOfAccount');
        Route::post('/deleteChartOfAccounts', [\App\Http\Controllers\Accountant\Invoice\ChatOfAccountController::class, 'deleteChartOfAccounts'])->name('deleteChartOfAccounts');


        Route::get('/getInvoices', [\App\Http\Controllers\Accountant\Invoice\InvoiceController::class, 'getInvoices'])->name('getInvoices');
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
    });



    /*
    |--------------------------------------------------------------------------
    | ROUTES FOR THE PROCUREMENT
    |--------------------------------------------------------------------------
    */

    Route::group(['prefix' => 'procurement', 'middleware' => 'is_procurement', 'as' => 'procurement.'], function () {

        /*
        |--------------------------------------------------------------------------
        | ROUTES FOR THE NAVIGATIONS
        |--------------------------------------------------------------------------
        */

        Route::get('/dashboard', [\App\Http\Controllers\Procurement\DashboardController::class, 'dashboard'])->name('dashboard');
        Route::get('/tools', [\App\Http\Controllers\Procurement\DashboardController::class, 'tools'])->name('tools');
        Route::get('/invoice', [\App\Http\Controllers\Procurement\DashboardController::class, 'invoice'])->name('invoice');
        Route::get('/uploads', [\App\Http\Controllers\Procurement\DashboardController::class, 'uploads'])->name('uploads');
        Route::get('/reports', [\App\Http\Controllers\Procurement\DashboardController::class, 'reports'])->name('reports');

        /*
        |--------------------------------------------------------------------------
        | ROUTES FOR THE TOOLS
        |--------------------------------------------------------------------------
        */

        Route::post('/add_tool', [\App\Http\Controllers\Procurement\Tools\ToolsController::class, 'add_tool'])->name('add_tool');
        Route::get('/get_tools', [\App\Http\Controllers\Procurement\Tools\ToolsController::class, 'get_tools'])->name('get_tools');
        Route::get('/getStarredTools', [\App\Http\Controllers\Procurement\Tools\ToolsController::class, 'getStarredTools'])->name('getStarredTools');
        Route::get('/getTrashedTools', [\App\Http\Controllers\Procurement\Tools\ToolsController::class, 'getTrashedTools'])->name('getTrashedTools');
        Route::post('/updateTools', [\App\Http\Controllers\Procurement\Tools\ToolsController::class, 'updateTools'])->name('updateTools');
        Route::post('/deleteTools', [\App\Http\Controllers\Procurement\Tools\ToolsController::class, 'deleteTools'])->name('deleteTools');
        Route::post('/restoreTools', [\App\Http\Controllers\Procurement\Tools\ToolsController::class, 'restoreTools'])->name('restoreTools');
        Route::post('/permanentDeleteTools', [\App\Http\Controllers\Procurement\Tools\ToolsController::class, 'permanentDeleteTools'])->name('permanentDeleteTools');
        Route::post('/starredTools', [\App\Http\Controllers\Procurement\Tools\ToolsController::class, 'starredTools'])->name('starredTools');

        /*
        |--------------------------------------------------------------------------
        | ROUTES FOR THE INVOICE
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


        /*
        |--------------------------------------------------------------------------
        | ROUTES FOR THE UPLOAD
        |--------------------------------------------------------------------------
        */

        Route::post('/upload', [\App\Http\Controllers\Procurement\Upload\UploadController::class, 'upload'])->name('upload');
        Route::get('/getUploads', [\App\Http\Controllers\Procurement\Upload\UploadController::class, 'getUploads'])->name('getUploads');
        Route::get('/getNewUploads', [\App\Http\Controllers\Procurement\Upload\UploadController::class, 'getNewUploads'])->name('getNewUploads');
        Route::get('/getTrashedUploads', [\App\Http\Controllers\Procurement\Upload\UploadController::class, 'getTrashedUploads'])->name('getTrashedUploads');
        Route::post('/restoreUpload', [\App\Http\Controllers\Procurement\Upload\UploadController::class, 'restoreUpload'])->name('restoreUpload');
        Route::post('/permanentDeleteUpload', [\App\Http\Controllers\Procurement\Upload\UploadController::class, 'permanentDeleteUpload'])->name('permanentDeleteUpload');
        Route::post('/deleteUpload', [\App\Http\Controllers\Procurement\Upload\UploadController::class, 'deleteUpload'])->name('deleteUpload');
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


    Route::get('/trigger/{data}', function ($data) {
    echo "<p>You have sent $data</p>";
    event(new App\Events\NewPostPublished($data));
    });

    Route::get('storagee/', function($fileName){
        return Storage::disk('public')->url('storage/systemFiles/images/1.jpg');
    });

    //Add fake users for testing
    Route::get('/add/users', function () {
    // dd(\App\Models\User::with(['posts' => function($query) {
    //     // $query->orderBy('id','desc');
    // }])->get()->first());

    // dd(\App\Models\Post::with(['user' => function($query) {
    //     // $query->orderBy('id','desc');
    // }])->get()->first());

    // App\Models\User::factory()->count(100)->create();
    });

    
    //Route for getting more posts on the scroll component
    Route::middleware(['auth:sanctum', 'verified'])->get('/posts', function () {
        return Response::json([
            'data' => Post::paginate(9)
        ], 201);
    })->name('posts');