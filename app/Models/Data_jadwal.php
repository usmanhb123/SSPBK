<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Data_jadwal extends Model
{
    protected $table= 'data_jadwal';

    use HasFactory;

    public function data_ruangan()
    {
    	return $this->belongsTo(Data_ruangan::class);
    }   public function data_shift()
    {
    	return $this->belongsTo(Data_shift::class);
    }
    
}
