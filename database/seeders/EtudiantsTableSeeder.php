<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Etudiant;
use App\Models\User;
use Illuminate\Support\Facades\Schema;

class EtudiantsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Désactive les contraintes de clé étrangère
        Schema::disableForeignKeyConstraints();

        // Vide les tables
        User::truncate();
        Etudiant::truncate();

        // Réactive les contraintes de clé étrangère
        Schema::enableForeignKeyConstraints();

        // Rempli les tables avec 100 nouveaux enregistrements
        Etudiant::factory()->count(100)->create();
    }
}

