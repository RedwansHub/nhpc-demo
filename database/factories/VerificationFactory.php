<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Verification;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class VerificationFactory extends Factory
{
    protected $model = Verification::class;

    public function definition(): array
    {
        return [
            'status' => $this->faker->word(),
            'verified_at' => Carbon::now(),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),

            'user_id' => User::factory(),
        ];
    }
}
