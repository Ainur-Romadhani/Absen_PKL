<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Absensi extends Model
{
    protected $table =  'absensi';
    protected $primaryKey = 'id_absen';
    protected $fillable = [
        'id_siswa',
        'id',
        'lokasi',
        'SIA',
        'keterangan',
        'laporan',
        'status',
    ];
}