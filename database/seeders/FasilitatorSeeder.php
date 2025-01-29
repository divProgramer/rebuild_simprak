<?php

namespace Database\Seeders;

use App\Models\Fasilitator;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FasilitatorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Fasilitator::create([
            'user_id' => 4,
            'nim' => '12345678',
            'nama' => 'Fasilitator',
            'no_hp' => '08123456789',
            'alamat' => 'Jl. Raya, No. 123, Jakarta',
        ]);
    }
}
