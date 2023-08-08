<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class ProfessorFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $nome = $this->faker->name;

        return [
            'nome' => $nome,
            'slug'=> Str::slug($nome),
            'morada' => $this->faker->address,
            'telefone' => $this->faker->phoneNumber,
        ];
    }
}
