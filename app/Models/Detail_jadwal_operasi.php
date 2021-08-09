<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Detail_jadwal_operasi extends Model
{
    protected $table = 'detail_jadwal_operasi';

    use HasFactory;
    public function data_jadwal_operasi()
    {
        return $this->belongsTo(Data_jadwal_operasi::class);
    }
    public function users()
    {
        return $this->belongsTo(Users::class);
    }
}
