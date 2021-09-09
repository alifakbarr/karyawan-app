<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class AddAndChangeColumnOnUserTaskTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('user_tasks', function(Blueprint $table){
            DB::statement("ALTER TABLE `user_tasks` CHANGE `progress` `progress` ENUM('proses','check','revisi', 'selesai', 'gagal') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'proses';");
            // $table->enum('progress',['proses','check', 'revisi','selesai','gagal'])->after('task_id')->change();
            $table->longText('alur')->after('progress');
            $table->longText('keterangan')->after('alur');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
