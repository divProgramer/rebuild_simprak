<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kelompok extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function siswa(){
        return $this->hasMany(Siswa::class, 'kelompok_id', 'id');
    }

    public function fasilitator(){
        return $this->hasMany(Fasilitator::class, 'fasilitator_id', 'id');
    }
}
