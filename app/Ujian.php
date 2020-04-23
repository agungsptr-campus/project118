<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ujian extends Model
{
    protected $table = "ujian";
    protected $fillable = ['nama_mk', 'dosen', 'jumlah_soal', 'keterangan'];
}
