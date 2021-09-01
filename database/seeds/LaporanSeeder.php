<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class LaporanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('table_laporan')->insert([
            'nama_laporan' => 'Laporan 1',
            'instansi_penerima' => 'ITS',
            'alamat_instansi'=> 'Keputih Sukolilo Surabaya',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('table_laporan')->insert([
            'nama_laporan' => 'Laporan 2',
            'pengirim_id' => 3,
            'instansi_penerima' => 'ITB',
            'nama_penerima'=> 'Affan Ahsanul',
            'alamat_instansi'=> 'Keputih Sukolilo Surabaya',
            'keterangan' =>'laporan telah diterima receptionis dan akan diteruskan',
            'image' => 'Capture2-1630418853.png',
            'longitude' => '112.7986343',
            'latitude' => '-7.2941646',
            'isTerkirim' => 2,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('table_laporan')->insert([
            'nama_laporan' => 'Laporan 3',
            'pengirim_id' => 3,
            'instansi_penerima' => 'ITK',
            'nama_penerima'=> 'Affan Ahsanul',
            'alamat_instansi'=> 'Keputih Sukolilo Surabaya',
            'image' => 'Capture2-1630418853.png',
            'longitude' => '112.7986343',
            'latitude' => '-7.2941646',
            'keterangan' =>'laporan telah diterima receptionis dan akan diteruskan',
            'isTerkirim' => 2,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
    }
}
