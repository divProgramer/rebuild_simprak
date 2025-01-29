<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jurnal extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function user(){
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function instansi(){
        return $this->belongsTo(Instansi::class, 'instansi_id', 'id');
    }

    public function sekolah(){
        return $this->belongsTo(Sekolah::class, 'sekolah_id', 'id');
    }


}
