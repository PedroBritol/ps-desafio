<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Produto;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class ProdutoFactory extends Factory
{
  /**
   * Define the model's default state.
   *
   * @return array
   */
  public function definition()
  {
    return [
      'categoria_id' => $this->faker->numberbetween(1, 10),
      'name' => $this->faker->name(),
      'price' => $this->faker->randomNumber(6, false),
      'description' => $this->faker->text(),
      'amount' => $this->faker->randomNumber(2, false),
      'photo' => '',
    ];
  }
}
