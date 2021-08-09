<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Data_jadwal_operasi extends Model
{
    protected $table = 'data_jadwal_operasi';

    use HasFactory;

    public function data_ruangan()
    {
        return $this->belongsTo(Data_ruangan::class);
    }
    public function data_penyakit()
    {
        return $this->belongsTo(Data_penyakit::class);
    }
    public function detail_jadwal_operasi()
    {
        return $this->hasMany(Detail_jadwal_operasi::class);
    }
    public function laporan_operasi()
    {
        return $this->hasMany(Laporan_operasi::class);
    }
}
