<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Data_soal extends Model
{
   
    protected $table = 'data_soal';
    public function master_soal()
    {
    	return $this->belongsTo(Master_soal::class);
    }
    public function data_soal_jawaban()
    {
    	return $this->hasMany(data_soal_jawaban::class);
    }
     use HasFactory;
}
