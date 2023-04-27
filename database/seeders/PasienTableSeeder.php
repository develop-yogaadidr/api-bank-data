<?php

namespace Database\Seeders;

use App\Models\Pasien;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class PasienTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Pasien::create([
            'nama' => 'Sumadyo', 
            'nik' => '33730001',
            'alamat' => 'RT 021/RW 007 Dusun Ngablak, Desa Kadirejo, Kec Pabelan, Kab Semarang',
            'foto' => '{}'
        ]);

        Pasien::create([
            'nama' => 'Wagiman', 
            'nik' => '33730002',
            'alamat' => 'RT 11 / RW 04, Desa Kadirejo, Kecamatan Pabelan, Kabupaten Semarang',
            'foto' => '{}'
        ]);

        Pasien::create([
            'nama' => 'Nur Sholikin', 
            'nik' => '33730003',
            'alamat' => 'RT 020, RW 007 Dusun Daleman, Desa Kadirejo ,Kecamatan Pabelan ,Kabupaten Semarang',
            'foto' => '{}'
        ]);

        Pasien::create([
            'nama' => 'Mukhamat Aji Saputro', 
            'nik' => '33730004',
            'alamat' => 'RT.22/RW.07, Dsn Ngablak, Kadirejo, Pabelan, Kabupaten Semarang, Jawa Tengah',
            'foto' => '{}'
        ]);
    }
}
