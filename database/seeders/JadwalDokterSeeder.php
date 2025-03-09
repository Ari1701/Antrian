<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class JadwalDokterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('jadwal_dokter')->insert([
            [
                'nip' => '123001',
                'nama_dokter' => 'Dr. Andi Wijaya',
                'poli' => 'umum',
                'sesi' => 'Pagi',
                'jam_mulai' => '07:00:00',
                'jam_selesai' => '10:00:00',
            ],
            [
                'nip' => '123002',
                'nama_dokter' => 'Dr. Rani Susanti',
                'poli' => 'gigi',
                'sesi' => 'Sore',
                'jam_mulai' => '15:00:00',
                'jam_selesai' => '18:00:00',
            ],
            [
                'nip' => '123003',
                'nama_dokter' => 'Dr. Budi Santoso',
                'poli' => 'tht',
                'sesi' => 'Pagi',
                'jam_mulai' => '08:00:00',
                'jam_selesai' => '12:00:00',
            ],
            [
                'nip' => '123004',
                'nama_dokter' => 'Dr. Clara Dewi',
                'poli' => 'lansia & disabilitas',
                'sesi' => 'Siang',
                'jam_mulai' => '10:00:00',
                'jam_selesai' => '14:00:00',
            ],
            [
                'nip' => '123005',
                'nama_dokter' => 'Dr. Eka Purnama',
                'poli' => 'balita',
                'sesi' => 'Pagi',
                'jam_mulai' => '09:00:00',
                'jam_selesai' => '11:00:00',
            ],
            [
                'nip' => '123006',
                'nama_dokter' => 'Dr. Fahri Ananda',
                'poli' => 'kia & kb',
                'sesi' => 'Siang',
                'jam_mulai' => '13:00:00',
                'jam_selesai' => '15:00:00',
            ],
            [
                'nip' => '123007',
                'nama_dokter' => 'Dr. Gina Maharani',
                'poli' => 'nifas/pnc',
                'sesi' => 'Sore',
                'jam_mulai' => '15:00:00',
                'jam_selesai' => '17:00:00',
            ],
        ]);
    }
}
