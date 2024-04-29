<?php

use Illuminate\Support\Facades\Route;

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


Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name("homepage");


Route::resource('p', App\Http\Controllers\profileController::class)->middleware('auth');
Route::post('p/ajax/{id}', [App\Http\Controllers\profileController::class, 'ajax'])->name('p.ajax');

//Route::post('/p', [App\Http\Controllers\profileController::class, 'store'])->name('profile.store');
//Route::get('/p/{user_id}', [App\Http\Controllers\profileController::class, 'index'])->name('profile.show');


Route::get('/c/', [App\Http\Controllers\CausesController::class, 'index'])->name('causes');
Route::get('c/create', [App\Http\Controllers\CausesController::class, 'create'])->name('c.create')->middleware('web');
Route::get('c/{c_id}', [App\Http\Controllers\CausesController::class, 'show'])->name('c.show');
Route::post('c', [App\Http\Controllers\CausesController::class, 'store'])->name('c.store')->middleware('web');
Route::delete('c/{id}', [App\Http\Controllers\CausesController::class, 'destroy'])->name('c.destroy');




Route::get('/j/', [App\Http\Controllers\JobController::class, 'index'])->name('jobs');
Route::get('/j/cat/{job_cat_id}', [App\Http\Controllers\JobController::class, 'show_cat'])->name('j.showcat');
Route::post('j', [App\Http\Controllers\JobController::class, 'store'])->name('j.store')->middleware('web');

Route::get('j/post', [App\Http\Controllers\JobController::class, 'create'])->name('j.create');
Route::get('/j/{job_id}', [App\Http\Controllers\JobController::class, 'show_job'])->name('j.show');
Route::post('/j/{job_id}', [App\Http\Controllers\JobController::class, 'update'])->name('j.update');





Route::get('/p/pj/{job_id}', [App\Http\Controllers\profileController::class, 'postedJobs'])->name('profile.postedjobs')->middleware('auth');
Route::get('/p/pd/{don_id}', [App\Http\Controllers\profileController::class, 'postedDonations'])->name('profile.posteddonations')->middleware('auth');


Route::get('Blog', [App\Http\Controllers\BlogController::class, 'index'])->name('Blog');
Route::get('Blog/{blog_id}', [App\Http\Controllers\BlogController::class, 'show'])->name('Blog.show');
require __DIR__ . '/auth.php';




//Admin


Route::namespace("Admin")->prefix("admin")->name("admin.")->group(function(){
    Route::namespace("Auth")->middleware('guest:admin')->group(function(){
        //middleware guest:admin will prevent login screen after login
        //Login Route
        Route::get('login', [App\Http\Controllers\Admin\Auth\AuthenticatedSessionController::class, 'create'])->name('login');
        Route::post('login', [App\Http\Controllers\Admin\Auth\AuthenticatedSessionController::class, 'store'])->name('adminlogin');

    });
    Route::middleware('admin')->group(function(){
        Route::get('/', [App\Http\Controllers\Admin\AdminController::class, 'dashboard'])->name('Dashboard');

    });
    Route::get('logout', [App\Http\Controllers\Admin\Auth\AuthenticatedSessionController::class, 'destroy'])->name('logout');


});


Route::group(['prefix'=>'admin'], function(){
    Route::resource('slider', App\Http\Controllers\Admin\AdminsliderController::class);
    Route::resource('service', App\Http\Controllers\Admin\AdminServiceController::class);
    Route::resource('blog', App\Http\Controllers\Admin\AdminBlogController::class);
    Route::resource('blog_cat', App\Http\Controllers\Admin\AdminBlogCatController::class);
    Route::resource('fund_cat', App\Http\Controllers\Admin\AdminFundraisingCatController::class);
    Route::resource('jobs_cat', App\Http\Controllers\Admin\AdminJobCatController::class);
    Route::resource('transactions', App\Http\Controllers\Admin\AdminTransactionController::class);
    Route::resource('trans_cat', App\Http\Controllers\Admin\AdminTransactionCatController::class);
    Route::resource('emp', App\Http\Controllers\Admin\AdminEmployeeController::class);
    Route::resource('web', App\Http\Controllers\Admin\AdminWebsiteDetailController::class);
    Route::resource('profile', App\Http\Controllers\Admin\AdminProfileController::class);

    //Delete
    Route::get('fund_cat/destroy/{cat_id}', 'App\Http\Controllers\Admin\AdminFundraisingCatController@destroy')->name('fund_cat.destroy');
    Route::get('jobs_cat/destroy/{cat_id}', 'App\Http\Controllers\Admin\AdminJobCatController@destroy')->name('jobs_cat.destroy');
    Route::get('blog/destroy/{blog_id}', 'App\Http\Controllers\Admin\AdminBlogController@destroy')->name('blog.destroy');
    Route::get('blog_cat/destroy/{cat_id}', 'App\Http\Controllers\Admin\AdminBlogCatController@destroy')->name('blog_cat.destroy');
    Route::get('trans_cat/destroy/{cat_id}', 'App\Http\Controllers\Admin\AdminTransactionCatController@destroy')->name('trans_cat.destroy');
    Route::get('emp/destroy/{emp_id}', 'App\Http\Controllers\Admin\AdminEmployeeController@destroy')->name('emp.destroy');
    Route::get('slider/destroy/{slider_id}', 'App\Http\Controllers\Admin\AdminsliderController@destroy')->name('slider.destroy');
    Route::get('service/destroy/{service_id}', 'App\Http\Controllers\Admin\AdminServiceController@destroy')->name('service.destroy');

    //Reject & Verify
    Route::get('unfund/reject/{cause_id}', 'App\Http\Controllers\Admin\AdminFundraisingController@reject')->name('unfund.reject');
    Route::get('unjobs/reject/{cause_id}', 'App\Http\Controllers\Admin\AdminJobsController@reject')->name('unjobs.reject');
    Route::get('unfund/verify/{cause_id}', 'App\Http\Controllers\Admin\AdminFundraisingController@verify')->name('unfund.verify');
    Route::get('unjobs/verify/{cause_id}', 'App\Http\Controllers\Admin\AdminJobsController@verify')->name('unjobs.verify');


    //Admin Fundraising
    Route::get('fund', [App\Http\Controllers\Admin\AdminFundraisingController::class, 'index']);
    Route::get('unfund', [App\Http\Controllers\Admin\AdminFundraisingController::class, 'unindex']);
    Route::get('don', [App\Http\Controllers\Admin\AdminFundraisingController::class, 'doindex']);

    //Admin Jobs
    Route::get('jobs', [App\Http\Controllers\Admin\AdminJobsController::class, 'index']);
    Route::get('unjobs', [App\Http\Controllers\Admin\AdminJobsController::class, 'unindex']);

    //Admin Transactions
    Route::get('dtransactions', [App\Http\Controllers\Admin\AdminTransactionController::class, 'draftIndex']);
    Route::get('transactions/cancel/{trans_id}',[App\Http\Controllers\Admin\AdminTransactionController::class, 'cancel'])->name('transactions.cancel');
    Route::get('transactions/approve/{trans_id}',[App\Http\Controllers\Admin\AdminTransactionController::class, 'approve'])->name('transactions.approve');

    //Reports
    Route::get('report', [App\Http\Controllers\Admin\AdminReportController::class, 'index']);
    Route::get('report/generate', 'App\Http\Controllers\Admin\AdminReportController@show')->name('report.show');

});


