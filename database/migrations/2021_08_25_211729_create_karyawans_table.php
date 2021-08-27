<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKaryawansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('karyawans', function (Blueprint $table) {
            // $table->unsignedInteger('job_id')->nullable();
            // $table->unsignedInteger('user_id')->nullable();
            $table->id();
            $table->foreignId('job_id')->constraine('jobs')->nullable();
            $table->foreignId('user_id')->constraine('users')->nullable();
            // $table->foreign('job_id')->references('id')->on('jobs')->onDelete('cascade');
            // $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->integer('nip')->nullable();
            $table->string('nama')->nullable();
            $table->text('foto')->nullable();
            $table->enum('jenis_kelamin',['l','p'])->nullable();
            $table->date('tanggal_lahir')->nullable();
            $table->string('tempat_lahir')->nullable();
            $table->string('no_hp')->nullable();
            $table->string('email')->nullable();
            $table->text('alamat')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('karyawans');
    }
}
