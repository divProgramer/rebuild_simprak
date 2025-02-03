<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function users(){
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function sekolah(){
        return $this->belongsTo(Sekolah::class, 'sekolah_id', 'id');
    }

    public function jurusan(){
        return $this->belongsTo(Jurusan::class, 'jurusan_id', 'id');
    }

    public function kelompok(){
        return $this->belongsTo(Kelompok::class, 'kelompok_id', 'id');
    }

    public function instansi(){
        return $this->belongsTo(Instansi::class, 'instansi_id', 'id');
    }

    public function user(){
        return $this->hasMany(User::class, 'id', 'user_id');
    }
}
