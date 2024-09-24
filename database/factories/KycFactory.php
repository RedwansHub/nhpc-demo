<?php

namespace Database\Factories;

use App\Models\Kyc;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class KycFactory extends Factory
{
    protected $model = Kyc::class;

    public function definition(): array
    {
        return [
            'address' => $this->faker->address(),
            'email' => $this->faker->unique()->safeEmail(),
            'phone_number' => $this->faker->phoneNumber(),
            'document_type' => $this->faker->word(),
            'document_number' => $this->faker->word(),
            'document_upload' => $this->faker->word(),
            'status' => $this->faker->word(),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),

            'user_id' => User::factory(),
        ];
    }
}
