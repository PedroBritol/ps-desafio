<?php

namespace Database\Seeders;


use Illuminate\Database\Seeder;

use App\Models\Categoria;

class CategoriasTableSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    Categoria::factory()->count(10)->create();
  }
}
