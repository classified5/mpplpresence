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
        Schema::create('Admin', function (Blueprint $table){
            $table->increments('id_admin');
            $table->string('username_admin');
            $table->string('nama_admin');
            $table->string('pass_admin');
        });

        Schema::create('Kelas', function (Blueprint $table){
            $table->increments('id_kelas');
            $table->integer('id_admin');
            $table->string('nama_kelas');
        });

        // Schema::create('Matakuliah', function (Blueprint $table){
        //     $table->string('kode_matkul');
        //     $table->integer('id_kelas');
        //     $table->string('nama_matkul');
        //     $table->timestamps('waktu_mulai_kuliah');
        //     $table->timestamps('waktu_selesai_kuliah');
        // });

        Schema::create('Mengambil', function (Blueprint $table){
            $table->string('kode_matkul');
            $table->string('NRP');
            $table->integer('minggu');
            $table->integer('status_absen');
        });

        Schema::create('Mahasiswa', function (Blueprint $table){
            $table->string('NRP');
            $table->string('nama_mhs');
            $table->string('pass_mhs');
        });

        Schema::create('Mengajar', function (Blueprint $table){
            $table->string('NIP');
            $table->string('kode_matkul');
        });

        Schema::create('Dosen', function (Blueprint $table){
            $table->string('NIP');
            $table->string('nama_dosen');
            $table->string('pass_dosen');
        });

      

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('Admin');
        Schema::dropIfExists('Kelas');
        Schema::dropIfExists('Mata_Kuliah');
        Schema::dropIfExists('Mengambil');
        Schema::dropIfExists('Mahasiswa');
        Schema::dropIfExists('Mengajar');
        Schema::dropIfExists('Dosen');
    }
}
