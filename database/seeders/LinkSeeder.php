<?php

namespace Database\Seeders;

use App\Models\Link;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LinkSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Link::create([
            'url' =>'https://www.streamonsport365.top/hola.php?id=1/5',
            'chaine' => 'Canal+',
            'idChaine' => 4,
        ]);
    }
}
