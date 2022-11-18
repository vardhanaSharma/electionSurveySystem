<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\AddCandidateController;
use App\Http\Controllers\CandidatePointsController;
use App\Http\Controllers\ViewCandidateController;
use App\Http\Controllers\CandidateProfileContoller;
use App\Http\Controllers\ExportController;
use App\Http\Controllers\PDF;



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
    return view('welcome');
});

// Route::get('/admin', function () {
//     return view('admin.dashboard');
// });
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['middleware' => ['auth','admin']], function(){
    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    });

    Route::get("/admin/viewcandidate",[ViewCandidateController::class,'viewcand'])->name('viewcand');
    Route::get("/admin/addcandidates",[AddCandidateController::class,'add'])->name('add');

    Route::get("/admin/viewcandidate/{id}",[ViewCandidateController::class,'showData'])->name('show');
    Route::get('/admin/get_value',[ViewCandidateController::class,'ajax'])->name('ajax');
    Route::post("/admin/viewcandidate",[ViewCandidateController::class,'update'])->name('update');


    Route::post('/admin/addcandidate',[AddCandidateController::class,'store'])->name('store');
    
    Route::get('/admin/get_value',[AddCandidateController::class,'ajax'])->name('ajax');
    Route::get('/admin/candidateprofile/{id}',[CandidateProfileContoller::class,'profile'])->name('profile');

    Route::get('/admin/candidatepoint',[CandidatePointsController::class,'addp'])->name('addp');
    Route::post('/admin/get_value',[CandidatePointsController::class,'ajax'])->name('ajax');
    Route::any('/admin/get_value1',[CandidatePointsController::class,'ajax1'])->name('ajax1');
    Route::any('/admin/candidatepoints',[CandidatePointsController::class,'pstore'])->name('pstore');
  

    Route::get('/admin/export',[ExportController::class,'exaddp'])->name('exaddp');
    Route::post('/admin/exget_value',[ExportController::class,'exajax'])->name('exajax');
    Route::any('/admin/exget_value1',[ExportController::class,'exajax1'])->name('exajax1');
    Route::post('/admin/pdf',[ExportController::class,'getpdf'])->name('getpdf');
    Route::get('/admin/pdf',[ExportController::class,'getpdf'])->name('pdf');
    Route::get('/admin/downloadpdf',[ExportController::class,'downloadpdf'])->name('downloadpdf');

});


