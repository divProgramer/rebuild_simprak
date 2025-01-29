<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sekolah extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function guru(){
        return $this->hasMany(Guru::class, 'sekolah_id', 'id');
    }

    public function siswa(){
        return $this->hasMany(Siswa::class, 'sekolah_id', 'id');
    }

    public function jurnal(){
        return $this->hasMany(Jurnal::class, 'sekolah_id', 'id');
    }
}
