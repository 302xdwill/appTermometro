<?php

namespace Database\Seeders;

use App\Models\Church;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ChurchSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Church::create([
            'name' => 'Buenas nuevas',
            'address' => 'Sanjose N193'
        ]);
        Church::create([
            'name' => 'Buenas nuevas2.0',
            'address' => 'San jorge N193'
        ]);
    }
}
