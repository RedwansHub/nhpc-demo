<?php

namespace Database\Factories;

use App\Models\Application;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class ApplicationFactory extends Factory
{
    protected $model = Application::class;

    public function definition(): array
    {
        return [
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
            'type' => $this->faker->word(),
            'status' => $this->faker->word(),
            'submitted_at' => Carbon::now(),
            'reviewed_at' => Carbon::now(),
            'approved_at' => Carbon::now(),

            'user_id' => User::factory(),
        ];
    }
}
