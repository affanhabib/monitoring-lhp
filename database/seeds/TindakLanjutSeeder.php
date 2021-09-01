<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class TindakLanjutSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('tindak_lanjut')->insert([
            'jumlah_tindaklanjut' => 1,
            'tanggal_tindaklanjut' => Carbon::now()->format('Y-m-d'),
            'laporan_id' => 3,
            'file' => 'documents-1630418853.pdf',
            'keterangan' => 'laporan telah diterima receptionis dan akan diteruskan',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
    }
}
