<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Data_penyakit extends Model
{

    protected $table= 'data_penyakit';

    use HasFactory;
    public function jenis_operasi()
    {
    	return $this->belongsTo(Jenis_operasi::class);
    }
    public function level_penanganan()
    {
    	return $this->belongsTo(Level_penanganan::class);
    }
}
