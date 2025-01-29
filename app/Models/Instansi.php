<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Instansi extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function fasilitator(){
        return $this->hasMany(Fasilitator::class, 'fasilitator_id', 'id');
    }
}
