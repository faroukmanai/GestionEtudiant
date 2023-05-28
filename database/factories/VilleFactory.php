<?php

namespace Database\Factories;
use App\Models\Ville;
use Illuminate\Database\Eloquent\Factories\Factory;

class VilleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    protected $model = Ville::class;
    public function definition()
    {
        return [
            'nom' => $this->faker->city,
        ];
    }
}
