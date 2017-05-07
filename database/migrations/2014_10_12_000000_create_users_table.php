<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('User_Role', function (Blueprint $table){
            $table->increments('id_role');
            $table->string('nama_role');
    
        });

        Schema::create('User', function (Blueprint $table){
            $table->string('id_user');
            $table->integer('id_role');
            $table->string('nama');
            $table->string('password');
            $table->string('remember_token');
        });

        Schema::create('Mengajar', function (Blueprint $table){
            $table->increments('id_mengajar');
            $table->string('id_user');
            $table->string('kode');
            $table->date('tanggal');
            $table->time('jam_masuk');
            $table->time('jam_keluar');
            $table->string('deskripsi_perkuliahan');
        });


        Schema::create('Mengambil', function (Blueprint $table){
            $table->increments('id_mengambil');
            $table->string('id_user');
            $table->string('kode');
            $table->integer('minggu');
            $table->integer('status_absen')->default('1');
        });

        Schema::create('Kelas', function (Blueprint $table){
            $table->increments('id_kelas');
            $table->string('nama_kelas');
        });

        Schema::create('Mata_Kuliah', function (Blueprint $table){
            $table->string('kode');
            $table->integer('id_kelas');
            $table->string('nama_matkul');
            $table->time('waktu_mulai_kuliah');
            $table->time('waktu_selesai_kuliah');
            $table->string('hari');
            $table->integer('semester');

        });

      

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('User_Role');
        Schema::dropIfExists('Kelas');
        Schema::dropIfExists('Mata_Kuliah');
        Schema::dropIfExists('Mengambil');
        Schema::dropIfExists('User');
        Schema::dropIfExists('Mengajar');
        
    }
}
