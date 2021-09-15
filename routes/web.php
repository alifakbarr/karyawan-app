<?php

use App\Http\Controllers\AdminPageController;
use App\Http\Controllers\HandleKaryawanController;
use App\Http\Controllers\HeadOfPageController;
use App\Http\Controllers\JobController;
use App\Http\Controllers\KaryawanController;
use App\Http\Controllers\KusionerController;
use App\Http\Controllers\PenilaianController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\TaskKaryawanController;
use App\Http\Controllers\UserPageController;
use App\Http\Controllers\UserTaskController;
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

Route::group(['middleware' => ['role:admin']], function () {
    // manage handle karyawan
    Route::resource('handleKaryawan', HandleKaryawanController::class);
    // manage job
    Route::resource('job', JobController::class);
    // Route::get('job/{job:id}/delete', [JobController::class,'delete'])->name('job.delete');
    
    
    // manage task
    Route::resource('task', TaskController::class);
});


Route::get('/', function () {
    return view('welcome');
});

Route::group(['middleware' => ['role:admin|headOf|user']], function () {
    // manage Head Of Page
    Route::resource('karyawan', KaryawanController::class);
});



Route::group(['middleware' => ['role:headOf|admin']], function () {
    // manage handle karyawan
    Route::resource('handleKaryawan', HandleKaryawanController::class);
    Route::get('/handleKaryawan/editRole/{Karyawan:id}',[HandleKaryawanController::class, 'editRole'])->name('handleKaryawan.editRole');
    Route::get('/handleKaryawan/updateRole/{id}',[HandleKaryawanController::class, 'updateRole'])->name('handleKaryawan.updateRole');
    Route::get('/handleKaryawan/delete/{karyawan:id}',[HandleKaryawanController::class, 'delete'])->name('handleKaryawan.delete');
    Route::get('/handleKaryawan/showTaskProses/{UserTask:user_id}',[HandleKaryawanController::class, 'showTaskProses'])->name('handleKaryawan.showTaskProses');
    Route::get('/handleKaryawan/showTaskCheck/{UserTask:user_id}',[HandleKaryawanController::class, 'showTaskCheck'])->name('handleKaryawan.showTaskCheck');
    Route::get('/handleKaryawan/showTaskRevisi/{UserTask:user_id}',[HandleKaryawanController::class, 'showTaskRevisi'])->name('handleKaryawan.showTaskRevisi');
    Route::get('/handleKaryawan/showTaskSelesai/{UserTask:user_id}',[HandleKaryawanController::class, 'showTaskSelesai'])->name('handleKaryawan.showTaskSelesai');
    Route::get('/handleKaryawan/showTaskGagal/{UserTask:user_id}',[HandleKaryawanController::class, 'showTaskGagal'])->name('handleKaryawan.showTaskGagal');
    Route::get('/handleKaryawan/showTaskKaryawan/{UserTask:id}',[HandleKaryawanController::class, 'showTaskKaryawan'])->name('handleKaryawan.showTaskKaryawan');




    
    // manage Head Of Page
    // Route::resource('headOfPage', HeadOfPageController::class);
});

Route::group(['middleware' => ['role:user']], function () {
    // manage User Page
    // Route::resource('userPage', UserPageController::class);

    // manage usertask
    Route::resource('userTask', UserTaskController::class);
    // manage TaskKaryawan
    Route::resource('taskKaryawan', TaskKaryawanController::class);
    Route::get('/taskKaryawan/myTask/{User:id}',[TaskKaryawanController::class, 'myTask'])->name('taskKaryawan.myTask');
    Route::get('/taskKaryawan/showMyTask/{Task:id}',[TaskKaryawanController::class, 'showMyTask'])->name('taskKaryawan.showMyTask');
});


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
