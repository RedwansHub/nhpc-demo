<?php

namespace Database\Factories;

use App\Models\Country;
use App\Models\Language;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class CountryFactory extends Factory
{
    protected $model = Country::class;

    public function definition(): array
    {
        return [
            'country_name' => $this->faker->name(),
            'country_flag' => $this->faker->word(),
            'country_shortcode' => $this->faker->word(),
            'continent' => $this->faker->word(),
            'phone_code' => $this->faker->phoneNumber(),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),

            'user_id' => User::factory(),
            'language_id' => Language::factory(),
        ];
    }
}
