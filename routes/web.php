<?php

use App\Http\Controllers\JobController;
use App\Http\Controllers\KusionerController;
use App\Http\Controllers\PostController;
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

// manage post
Route::get('/',[PostController::class,'index'])->name('post.index');

// manage job
Route::resource('job', JobController::class);
// Route::get('job/{job:id}/delete', [JobController::class,'delete'])->name('job.delete');

// manage kusioner
Route::resource('kusioner', KusionerController::class);
