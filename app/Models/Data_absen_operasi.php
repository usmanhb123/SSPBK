<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Data_absen_operasi extends Model
{
    protected $table = 'data_absen_operasi';

    use HasFactory;
    public function data_jadwal_operasi()
    {
        return $this->belongto(data_jadwal_operasi::class);
    }
    public function users()
    {
        return $this->belongsTo(Users::class);
    }
}
