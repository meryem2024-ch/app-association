<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Ville;

class VilleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Ville::create(['nom' => 'Casablanca', 'image' => 'images/casablanca.jpg']);
        Ville::create(['nom' => 'Rabat', 'image' => 'images/rabat.jpg']);
        Ville::create(['nom' => 'Marrakech', 'image' => 'images/marrakech.jpg']);
        Ville::create(['nom' => 'Fès', 'image' => 'images/fes.jpg']);
        Ville::create(['nom' => 'Tanger', 'image' => 'images/tanger.jpg']);  //
    
    }
}
