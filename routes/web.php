<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
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
    App\Models\User::factory()->count(100)->create();
    App\Models\Post::factory()->count(1000)->create();
    /*
    |--------------------------------------------------------------------------
    | END OF FAKE DATE GENERATING ROUTE
    |--------------------------------------------------------------------------
    */
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
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

    /*
    |--------------------------------------------------------------------------
    | ROUTES FOR THE HEAD
    |--------------------------------------------------------------------------
    */

    Route::group(['prefix' => 'head', 'middleware' => 'is_head', 'as' => 'head.'], function () {
        Route::get('/pageSix', [\App\Http\Controllers\Head\DashboardController::class, 'pageSix'])->name('pageSix');
        Route::get('/pageOne', [\App\Http\Controllers\Head\DashboardController::class, 'pageOne'])->name('pageOne');
        Route::get('/pageTwo', [\App\Http\Controllers\Head\DashboardController::class, 'pageTwo'])->name('pageTwo');
        Route::get('/pageFour', [\App\Http\Controllers\Head\DashboardController::class, 'pageFour'])->name('pageFour');
        Route::get('/pageFive', [\App\Http\Controllers\Head\DashboardController::class, 'pageFive'])->name('pageFive');
        Route::get('/dashboard', [\App\Http\Controllers\Head\DashboardController::class, 'dashboard'])->name('dashboard');
        Route::get('/pageThree', [\App\Http\Controllers\Head\DashboardController::class, 'pageThree'])->name('pageThree');
        Route::get('/pageSeven', [\App\Http\Controllers\Head\DashboardController::class, 'pageSeven'])->name('pageSeven');
    });


    /*
    |--------------------------------------------------------------------------
    | ROUTES FOR THE BISHOP
    |--------------------------------------------------------------------------
    */

    Route::group(['prefix' => 'bishop', 'middleware' => 'is_bishop', 'as' => 'bishop.'], function () {
        Route::get('/pageSix', [\App\Http\Controllers\Bishop\DashboardController::class, 'pageSix'])->name('pageSix');
        Route::get('/pageOne', [\App\Http\Controllers\Bishop\DashboardController::class, 'pageOne'])->name('pageOne');
        Route::get('/pageTwo', [\App\Http\Controllers\Bishop\DashboardController::class, 'pageTwo'])->name('pageTwo');
        Route::get('/pageFour', [\App\Http\Controllers\Bishop\DashboardController::class, 'pageFour'])->name('pageFour');
        Route::get('/pageFive', [\App\Http\Controllers\Bishop\DashboardController::class, 'pageFive'])->name('pageFive');
        Route::get('/dashboard', [\App\Http\Controllers\Bishop\DashboardController::class, 'dashboard'])->name('dashboard');
        Route::get('/pageThree', [\App\Http\Controllers\Bishop\DashboardController::class, 'pageThree'])->name('pageThree');
        Route::get('/pageSeven', [\App\Http\Controllers\Bishop\DashboardController::class, 'pageSeven'])->name('pageSeven');
    });



    /*
    |--------------------------------------------------------------------------
    | ROUTES FOR THE ACADEMIC
    |--------------------------------------------------------------------------
    */

    Route::group(['prefix' => 'academic', 'middleware' => 'is_academic', 'as' => 'academic.'], function () {
        Route::get('/pageSix', [\App\Http\Controllers\Academic\DashboardController::class, 'pageSix'])->name('pageSix');
        Route::get('/pageOne', [\App\Http\Controllers\Academic\DashboardController::class, 'pageOne'])->name('pageOne');
        Route::get('/pageTwo', [\App\Http\Controllers\Academic\DashboardController::class, 'pageTwo'])->name('pageTwo');
        Route::get('/pageFour', [\App\Http\Controllers\Academic\DashboardController::class, 'pageFour'])->name('pageFour');
        Route::get('/pageFive', [\App\Http\Controllers\Academic\DashboardController::class, 'pageFive'])->name('pageFive');
        Route::get('/dashboard', [\App\Http\Controllers\Academic\DashboardController::class, 'dashboard'])->name('dashboard');
        Route::get('/pageThree', [\App\Http\Controllers\Academic\DashboardController::class, 'pageThree'])->name('pageThree');
        Route::get('/pageSeven', [\App\Http\Controllers\Academic\DashboardController::class, 'pageSeven'])->name('pageSeven');
    });



    /*
    |--------------------------------------------------------------------------
    | ROUTES FOR THE SECRETARY
    |--------------------------------------------------------------------------
    */

    Route::group(['prefix' => 'secretary', 'middleware' => 'is_secretary', 'as' => 'secretary.'], function () {
        Route::get('/pageSix', [\App\Http\Controllers\Secretary\DashboardController::class, 'pageSix'])->name('pageSix');
        Route::get('/pageOne', [\App\Http\Controllers\Secretary\DashboardController::class, 'pageOne'])->name('pageOne');
        Route::get('/pageTwo', [\App\Http\Controllers\Secretary\DashboardController::class, 'pageTwo'])->name('pageTwo');
        Route::get('/pageFour', [\App\Http\Controllers\Secretary\DashboardController::class, 'pageFour'])->name('pageFour');
        Route::get('/pageFive', [\App\Http\Controllers\Secretary\DashboardController::class, 'pageFive'])->name('pageFive');
        Route::get('/dashboard', [\App\Http\Controllers\Secretary\DashboardController::class, 'dashboard'])->name('dashboard');
        Route::get('/pageThree', [\App\Http\Controllers\Secretary\DashboardController::class, 'pageThree'])->name('pageThree');
        Route::get('/pageSeven', [\App\Http\Controllers\Secretary\DashboardController::class, 'pageSeven'])->name('pageSeven');
    });



    /*
    |--------------------------------------------------------------------------
    | ROUTES FOR THE ACCOUNTANT
    |--------------------------------------------------------------------------
    */

    Route::group(['prefix' => 'accountant', 'middleware' => 'is_accountant', 'as' => 'accountant.'], function () {
        Route::get('/pageSix', [\App\Http\Controllers\Accountant\DashboardController::class, 'pageSix'])->name('pageSix');
        Route::get('/pageOne', [\App\Http\Controllers\Accountant\DashboardController::class, 'pageOne'])->name('pageOne');
        Route::get('/pageTwo', [\App\Http\Controllers\Accountant\DashboardController::class, 'pageTwo'])->name('pageTwo');
        Route::get('/pageFour', [\App\Http\Controllers\Accountant\DashboardController::class, 'pageFour'])->name('pageFour');
        Route::get('/pageFive', [\App\Http\Controllers\Accountant\DashboardController::class, 'pageFive'])->name('pageFive');
        Route::get('/dashboard', [\App\Http\Controllers\Accountant\DashboardController::class, 'dashboard'])->name('dashboard');
        Route::get('/pageThree', [\App\Http\Controllers\Accountant\DashboardController::class, 'pageThree'])->name('pageThree');
        Route::get('/pageSeven', [\App\Http\Controllers\Accountant\DashboardController::class, 'pageSeven'])->name('pageSeven');
    });



    /*
    |--------------------------------------------------------------------------
    | ROUTES FOR THE PROCUREMENT
    |--------------------------------------------------------------------------
    */

    Route::group(['prefix' => 'procurement', 'middleware' => 'is_procurement', 'as' => 'procurement.'], function () {
        Route::get('/pageSix', [\App\Http\Controllers\Procurement\DashboardController::class, 'pageSix'])->name('pageSix');
        Route::get('/pageOne', [\App\Http\Controllers\Procurement\DashboardController::class, 'pageOne'])->name('pageOne');
        Route::get('/pageTwo', [\App\Http\Controllers\Procurement\DashboardController::class, 'pageTwo'])->name('pageTwo');
        Route::get('/pageFour', [\App\Http\Controllers\Procurement\DashboardController::class, 'pageFour'])->name('pageFour');
        Route::get('/pageFive', [\App\Http\Controllers\Procurement\DashboardController::class, 'pageFive'])->name('pageFive');
        Route::get('/dashboard', [\App\Http\Controllers\Procurement\DashboardController::class, 'dashboard'])->name('dashboard');
        Route::get('/pageThree', [\App\Http\Controllers\Procurement\DashboardController::class, 'pageThree'])->name('pageThree');
        Route::get('/pageSeven', [\App\Http\Controllers\Procurement\DashboardController::class, 'pageSeven'])->name('pageSeven');
    });



    /*
    |--------------------------------------------------------------------------
    | ROUTES FOR THE ACOUNTANT MAIN
    |--------------------------------------------------------------------------
    */

    Route::group(['prefix' => 'accountant_main', 'middleware' => 'is_accountant_main', 'as' => 'accountant_main.'], function () {
        Route::get('/pageSix', [\App\Http\Controllers\AccountantMain\DashboardController::class, 'pageSix'])->name('pageSix');
        Route::get('/pageOne', [\App\Http\Controllers\AccountantMain\DashboardController::class, 'pageOne'])->name('pageOne');
        Route::get('/pageTwo', [\App\Http\Controllers\AccountantMain\DashboardController::class, 'pageTwo'])->name('pageTwo');
        Route::get('/pageFour', [\App\Http\Controllers\AccountantMain\DashboardController::class, 'pageFour'])->name('pageFour');
        Route::get('/pageFive', [\App\Http\Controllers\AccountantMain\DashboardController::class, 'pageFive'])->name('pageFive');
        Route::get('/dashboard', [\App\Http\Controllers\AccountantMain\DashboardController::class, 'dashboard'])->name('dashboard');
        Route::get('/pageThree', [\App\Http\Controllers\AccountantMain\DashboardController::class, 'pageThree'])->name('pageThree');
        Route::get('/pageSeven', [\App\Http\Controllers\AccountantMain\DashboardController::class, 'pageSeven'])->name('pageSeven');
    });



    /*
    |--------------------------------------------------------------------------
    | ROUTES FOR THE INTERNAL AUDITOR
    |--------------------------------------------------------------------------
    */

    Route::group(['prefix' => 'internal_auditor', 'middleware' => 'is_internal_auditor', 'as' => 'internal_auditor.'], function () {
        Route::get('/pageSix', [\App\Http\Controllers\InternalAuditor\DashboardController::class, 'pageSix'])->name('pageSix');
        Route::get('/pageOne', [\App\Http\Controllers\InternalAuditor\DashboardController::class, 'pageOne'])->name('pageOne');
        Route::get('/pageTwo', [\App\Http\Controllers\InternalAuditor\DashboardController::class, 'pageTwo'])->name('pageTwo');
        Route::get('/pageFour', [\App\Http\Controllers\InternalAuditor\DashboardController::class, 'pageFour'])->name('pageFour');
        Route::get('/pageFive', [\App\Http\Controllers\InternalAuditor\DashboardController::class, 'pageFive'])->name('pageFive');
        Route::get('/dashboard', [\App\Http\Controllers\InternalAuditor\DashboardController::class, 'dashboard'])->name('dashboard');
        Route::get('/pageThree', [\App\Http\Controllers\InternalAuditor\DashboardController::class, 'pageThree'])->name('pageThree');
        Route::get('/pageSeven', [\App\Http\Controllers\InternalAuditor\DashboardController::class, 'pageSeven'])->name('pageSeven');
    });

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