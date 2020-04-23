<?php

use App\Ujian;
use Illuminate\Database\Seeder;

class UjianSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 1; $i < 25; $i++) {
            $ujian = new Ujian;
            $ujian->nama_mk = "Web Service - $i";
            $ujian->dosen = "Agung $i";
            $ujian->jumlah_soal = 25;
            $ujian->keterangan = "No Ket.";
            $ujian->save();
        }
    }
}
