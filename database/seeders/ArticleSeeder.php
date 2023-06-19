<?php

namespace Database\Seeders;
use App\Models\Article;
use App\Models\Etudiant;
use Illuminate\Database\Seeder;

class ArticleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Récupérez tous les étudiants
        $etudiants = Etudiant::all();

        // Générez des articles pour chaque étudiant
        foreach ($etudiants as $etudiant) {
            // Utilisez la factory pour créer un article avec des attributs fictifs
            Article::factory()->create([
                'etudiant_id' => $etudiant->id,
            ]);
        }
    }
}
