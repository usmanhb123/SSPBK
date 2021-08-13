<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Data_jawaban_ujian extends Model
{
    
    protected $table = 'data_jawaban_ujian';
    public function data_soal_jawaban()
    {
    	return $this->belongsTo(Data_soal_jawaban::class);
    }
    use HasFactory;
}
