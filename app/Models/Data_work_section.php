<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Data_work_section extends Model
{
    protected $table = 'data_work_section';
    public function user()
    {
    	return $this->hasMany(User::class);
    }
    use HasFactory;
}
