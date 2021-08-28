<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnToKaryawansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('karyawans', function (Blueprint $table) {

            $table->foreignId('job_id')->after('id')->references('id')->on('jobs')->onDelete('cascade');
            $table->foreignId('user_id')->after('job_id')->references('id')->on('users')->onDelete('cascade');


            // $table->bigInteger('job_id')->unsigned()->index()->nullable();
            // $table->foreign('job_id')->references('id')->on('jobs')->onDelete('cascade');
            // $table->bigInteger('user_id')->unsigned()->index()->nullable();
            // $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

            // $table->foreignId('job_id')->constrained('jobs')->onUpdate('cascade');
            // $table->foreignId('user_id')->constrained('users')->onUpdate('cascade');
            
            // $table->unsignedInteger('job_id');
            // $table->unsignedInteger('user_id');
            // $table->foreign('job_id')->references('id')->on('jobs')->onDelete('cascade');
            // $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('karyawans', function (Blueprint $table) {
            //
        });
    }
}
