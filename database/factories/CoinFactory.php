<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class CoinFactory extends Factory
{
    protected $model = Coin::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'coin_id' => $this->faker->unique()->word(),
            'symbol' => $this->faker->unique()->currencyCode(),
            'name' => $this->faker->unique()->word(),
            'platforms' => [
                'ethereum' => $this->faker->unique()->md5(),
                'polygon-pos' => $this->faker->unique()->md5(),
                //.....
            ],
        ];
    }
}
