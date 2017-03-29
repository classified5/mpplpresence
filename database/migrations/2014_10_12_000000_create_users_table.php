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
        Schema::create('USER', function (Blueprint $table){
            $table->string('ID_USER');
            $table->integer('ID_ROLE');
            $table->string('NAMA');
            $table->string('ALAMAT');
            $table->string('PASSWORD');
            $table->rememberToken();
            $table->softDeletes();
            $table->timestamps();
        });

        Schema::create('USER_CLASS', function (Blueprint $table){
            $table->increments('ID_UC');
            $table->string('ID_USER');
            $table->integer('ID_KELAS');
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('KELAS', function (Blueprint $table){
            $table->increments('ID_KELAS');
            $table->string('NAMA_KELAS', 20);
            $table->string('KODE_MK',10);
            $table->integer('MAX');
            $table->integer('COUNT');
            $table->string('TAHUN_AJARAN', 4);
            $table->integer('SEMESTER');
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('PRESENCE', function (Blueprint $table){
            $table->increments('ID_PRESENCE');
            $table->string('ID_USER');
            $table->integer('ID_TYPE');
            $table->integer('ID_DETAIL_SCHEDULE');
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('SCHEDULE', function (Blueprint $table){
            $table->increments('ID_SCHEDULE');
            $table->integer('ID_KELAS');
            $table->string('ID_DOSEN');
            $table->string('ID_ASDOS');
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('ROLE', function (Blueprint $table){
            $table->increments('ID_ROLE');
            $table->string('NAMA_ROLE', 100);
            $table->string('DESC', 100);
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('TYPE_PRESENCE', function (Blueprint $table){
            $table->increments('ID_TYPE');
            $table->string('NAME_TYPE', 100);
            $table->string('DESC', 100);
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('SCANNER', function (Blueprint $table){
            $table->increments('ID_SCANNER');
            $table->string('NAME_SCANNER', 15);
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('ROOM', function (Blueprint $table){
            $table->increments('ID_ROOM');
            $table->integer('ID_SCANNER');
            $table->string('NAMA_ROOM', 10);
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('DETAIL_SCHEDULE', function (Blueprint $table){
            $table->increments('ID_DETAIL_SCHEDULE');
            $table->integer('ID_SCHEDULE');
            $table->integer('ID_ROOM');
            $table->time('START_HOUR');
            $table->time('END_HOUR');
            $table->date('KELAS_DATE');
            $table->boolean('IS_ACTIVE');
            $table->timestamps();
            $table->softDeletes();
        });


    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('USER');
        Schema::dropIfExists('USER_CLASS');
        Schema::dropIfExists('KELAS');
        Schema::dropIfExists('PRESENCE');
        Schema::dropIfExists('ROLE');
        Schema::dropIfExists('TYPE_PRESENCE');
        Schema::dropIfExists('SCHEDULE');

        Schema::dropIfExists('SCANNER');
        Schema::dropIfExists('ROOM');
        Schema::dropIfExists('DETAIL_SCHEDULE');
    }
}
