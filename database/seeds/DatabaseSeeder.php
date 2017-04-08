<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        $userrole = new \App\Userrole([
        	'nama_role' => 'Admin'
        	]);
        $userrole->timestamps = false;
        $userrole->save();

        $userrole = new \App\Userrole([
        	'nama_role' => 'Dosen'
        	]);
        $userrole->timestamps = false;
        $userrole->save();

        $userrole = new \App\Userrole([
        	'nama_role' => 'Mahasiswa'
        	]);
        $userrole->timestamps = false;
        $userrole->save();

        $user = new \App\User([
        	'id_user' => 'admin',
        	'id_role' => 1,
        	'nama' => 'Admin',
        	'password' => 'admin'
        	]);
        $user->timestamps = false;
        $user->save();

       	$user = new \App\User([
        	'id_user' => '5114100001',
        	'id_role' => 3,
        	'nama' => 'Muhammad Nezar Mahardika',
        	'password' => 'mahasiswa'
        	]);
       	$user->timestamps = false;
        $user->save();

        $user = new \App\User([
        	'id_user' => '131285253',
        	'id_role' => 2,
        	'nama' => '	Ir. F.X. Arunanto. M.Sc',
        	'password' => 'dosen'
        	]);
        $user->timestamps = false;
        $user->save();

        $user = new \App\User([
        	'id_user' => '5114100002',
        	'id_role' => 3,
        	'nama' => 'William Suhud',
        	'password' => 'mahasiswa'
        	]);
        $user->timestamps = false;
        $user->save();

        $kelas = new \App\Kelas([
        	'nama_kelas' => 'IF-101'
        	]);
        $kelas->timestamps = false;
        $kelas->save();

        $kelas = new \App\Kelas([
        	'nama_kelas' => 'IF-102'
        	]);
        $kelas->timestamps = false;
        $kelas->save();

        $kelas = new \App\Kelas([
        	'nama_kelas' => 'IF-103'
        	]);
        $kelas->timestamps = false;
        $kelas->save();

        $kelas = new \App\Kelas([
        	'nama_kelas' => 'IF-104'
        	]);
        $kelas->timestamps = false;
        $kelas->save();


        $matkul = new \App\Matakuliah([
        	'kode' => 'KI141301',
        	'id_kelas' => 1,
        	'nama_matkul' => 'Dasar Pemrograman A',
        	'waktu_mulai_kuliah' => '07:00',
        	'waktu_selesai_kuliah' => '09:30',
        	'hari' => 'Senin',
        	'semester' => 1
        	]);
        $matkul->timestamps = false;
        $matkul->save();

        $matkul = new \App\Matakuliah([
        	'kode' => 'KI141307',
        	'id_kelas' => 2,
        	'nama_matkul' => 'Struktur Data A',
        	'waktu_mulai_kuliah' => '09:30',
        	'waktu_selesai_kuliah' => '12:00',
        	'hari' => 'Selasa',
        	'semester' => 2
        	]);
        $matkul->timestamps = false;
        $matkul->save();

        // $mengajar = new \App\Mengajar([
        // 	'id_user' => '131285253',
        // 	'kode' => 'KI141307',
        // 	'tanggal' => '2017-04-04',
        // 	'jam_masuk' => '09:30',
        // 	'jam_keluar' => '12:00',
        // 	'deskripsi_perkuliahan' => 'Perkenalan materi'
        // 	]);
        // $mengajar->timestamps = false;
        // $mengajar->save();

        // $mengambil = new \App\Mengajar([
        // 	'id_user' => '5114100001',
        // 	'kode' => 'KI141307',
        // 	'minggu' => 1,
        // 	'status_absen' => 1
        // 	]);
        // $mengambil->timestamps = false;
        // $mengambil->save();

        // $mengambil = new \App\Mengajar([
        // 	'id_user' => '5114100002',
        // 	'kode' => 'KI141307',
        // 	'minggu' => 2,
        // 	'status_absen' => 2
        // 	]);
        // $mengambil->timestamps = false;
        // $mengambil->save();



    }
}
