<?php

namespace Database\Factories;

use App\Models\Worker;
use App\Models\Entity;
use App\Models\Area;
use Illuminate\Database\Eloquent\Factories\Factory;

class WorkerFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Worker::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
      return [
          'fullname'=>$this->faker->name(),
          'job'=>$this->faker->sentence(2),
          'categoria'=>$this->faker->randomElement(['Funcionario', 'Cuadro', 'Trabajador']),
          'entity_id'=>Entity::factory(),
          'area_id'=>Area::factory()
      ];
    }
}
