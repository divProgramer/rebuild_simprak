<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fasilitator extends Model
{
    use HasFactory;

    // protected $table = 'fasilitators';

    protected $guarded = [];

    public function users()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function kelompok(){
        return $this->belongsTo(Kelompok::class, 'kelompok_id', 'id');
    }

    public function instansi(){
        return $this->belongsTo(Instansi::class, 'instansi_id', 'id');
    }

}
