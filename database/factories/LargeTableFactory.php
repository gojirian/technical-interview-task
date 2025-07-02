<?php

namespace Database\Factories;

use App\Models\LargeTable;
use Illuminate\Database\Eloquent\Factories\Factory;

class LargeTableFactory extends Factory
{
    protected $model = LargeTable::class;

    public function definition(): array
    {
        return [
            'task_id' => null, // Set in seeder
            'title' => $this->faker->randomElement(['Event A', 'Event B', 'Event C', 'Event D']),
            'description' => $this->faker->sentence(),
            'priority' => $this->faker->numberBetween(1, 5),
            'cost' => $this->faker->randomFloat(2, 10, 1000),
            'due_date' => $this->faker->date(),
            'is_active' => $this->faker->boolean(),
            'metadata' => json_encode(['info' => $this->faker->word()]),
            'user_id' => null, // Set in seeder if needed
        ];
    }
}
