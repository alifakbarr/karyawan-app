<?php

namespace App\Providers;

use App\Models\Task;
use App\Models\UserTask;
use Illuminate\Support\ServiceProvider;
use Carbon\Carbon;
use Illuminate\Contracts\Pagination\Paginator;
use Illuminate\Pagination\Paginator as PaginationPaginator;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        config(['app.locale' => 'id']);
        Carbon::setLocale('id');
        date_default_timezone_set('Asia/Jakarta');
        PaginationPaginator::useBootstrap();
        
        // $thisTime = Carbon::now();
        // $today = date('Y-m-d', strtotime($thisTime));
        // $tasks = Task::whereDate('deadLine','<',$today)->get()&& userTask::where('progress','selesai')->get();
        // // $userTask = userTask::where('progress','selesai')->get();
        // if($tasks){
        //     function update(){
                
        //     }
        //     update();
        // }else{
        //     dd('gagal');
        // }
        // dd($userTask);
    }
}