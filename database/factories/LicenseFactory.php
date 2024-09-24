<?php

namespace Database\Factories;

use App\Models\Institution;
use App\Models\License;
use App\Models\Payment;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class LicenseFactory extends Factory
{
    protected $model = License::class;

    public function definition(): array
    {
        return [
            'type' => $this->faker->word(),
            'status' => $this->faker->word(),
            'issued_at' => Carbon::now(),
            'expires_at' => Carbon::now(),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),

            'user_id' => User::factory(),
            'institution_id' => Institution::factory(),
            'payment_id' => Payment::factory(),
        ];
    }
}
