<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Aluno>
 */
class AlunoFactory extends Factory
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
            'pai' => $this->faker->name,
            'mae' => $this->faker->name,
             'morada' => $this->faker->address,
             'telefone' => $this->faker->phoneNumber,
             'curso' => $this->faker->word(),
             'classe' => $this->faker->randomNumber(1),
             'periodo' => $this->faker->word(),
             'sala' => $this->faker->randomNumber(1),
             'turma' => $this->faker->word(),
        ];
    }
}
