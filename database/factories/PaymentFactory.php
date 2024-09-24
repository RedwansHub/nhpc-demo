<?php

namespace Database\Factories;

use App\Models\Application;
use App\Models\Payment;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class PaymentFactory extends Factory
{
    protected $model = Payment::class;

    public function definition(): array
    {
        return [
            'amount' => $this->faker->word(),
            'method' => $this->faker->word(),
            'reference' => $this->faker->word(),
            'status' => $this->faker->word(),
            'paid_at' => Carbon::now(),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),

            'application_id' => Application::factory(),
        ];
    }
}
