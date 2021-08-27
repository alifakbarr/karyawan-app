<?php

use App\Http\Controllers\AdminPageController;
use App\Http\Controllers\HeadOfPageController;
use App\Http\Controllers\JobController;
use App\Http\Controllers\KaryawanController;
use App\Http\Controllers\KusionerController;
use App\Http\Controllers\PenilaianController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\UserPageController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::group(['middleware' => ['role:admin|headOf|user']], function () {
    // manage Head Of Page
    Route::resource('karyawan', KaryawanController::class);
});


Route::group(['middleware' => ['role:admin']], function () {
    // manage Admin Page
    Route::resource('adminPage', AdminPageController::class);
    
    // manage job
    Route::resource('job', JobController::class);
    // Route::get('job/{job:id}/delete', [JobController::class,'delete'])->name('job.delete');
    
    // manage kusioner
    Route::resource('kusioner', KusionerController::class);
    
    // manage task
    Route::resource('task', TaskController::class);
    
    // manage penilaian
    Route::resource('penilaian', PenilaianController::class);
});

Route::group(['middleware' => ['role:headOf']], function () {
    // manage Head Of Page
    Route::resource('headOfPage', HeadOfPageController::class);
});

Route::group(['middleware' => ['role:user']], function () {
    // manage User Page
    Route::resource('userPage', UserPageController::class);
});


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
