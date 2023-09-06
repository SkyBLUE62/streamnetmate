<?php

namespace Database\Seeders;

use App\Models\Chaine;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ChaineSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        Chaine::create([
            'chaine' => 'RMC Sport 1',
            'langue' => 'FR',
            'image' => 'assets/client/images/rmc-sport-1.png',
        ]);

    }
}
