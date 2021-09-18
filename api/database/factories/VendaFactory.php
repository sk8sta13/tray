<?php

namespace Database\Factories;

use App\Models\Venda;
use App\Models\Vendedor;
use Illuminate\Database\Eloquent\Factories\Factory;

class VendaFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Venda::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'data_venda' => $this->faker->date('Y-m-d', 'now'),
            'valor_venda' => $this->faker->randomFloat(2, $min = 0.01, $max = 1000),
            'vendedor_id' => $this->faker->randomElement(Vendedor::all()->pluck('id')->toArray())
        ];
    }
}
