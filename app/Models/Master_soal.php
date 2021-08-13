<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Master_soal extends Model
{
    
    protected $table = 'master_soal';
    use HasFactory;
    public function data_soal()
    {
    	return $this->hasMany(Data_soal::class);
    }
}
