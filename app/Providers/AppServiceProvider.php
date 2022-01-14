<?php

namespace App\Providers;

use App\Models\Task;
use App\Models\UserTask;
use Illuminate\Support\ServiceProvider;
use Carbon\Carbon;
use Doctrine\DBAL\Schema\Schema;
use Illuminate\Contracts\Pagination\Paginator;
use Illuminate\Pagination\Paginator as PaginationPaginator;
use Illuminate\Support\Facades\Schema as FacadesSchema;

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
        FacadesSchema::defaultStringLength(191);
        config(['app.locale' => 'id']);
        Carbon::setLocale('id');
        date_default_timezone_set('Asia/Jakarta');
        PaginationPaginator::useBootstrap();
        
        $thisTime = Carbon::now();
        $today = date('Y-m-d', strtotime($thisTime));
    }
}