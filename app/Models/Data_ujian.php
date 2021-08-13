<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Data_ujian extends Model
{
    protected $table = 'data_ujian';
    public function master_soal()
    {
    	return $this->belongsTo(Master_soal::class);
    }
    public function data_work_section()
    {
    	return $this->belongsTo(Data_work_section::class);
    }
    use HasFactory;
}
