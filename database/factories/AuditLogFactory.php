<?php

namespace Database\Factories;

use App\Models\AuditLog;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class AuditLogFactory extends Factory
{
    protected $model = AuditLog::class;

    public function definition(): array
    {
        return [
            'action' => $this->faker->word(),
            'details' => $this->faker->word(),
            'ip_address' => $this->faker->ipv4(),
            'user_agent' => $this->faker->word(),
            'location' => $this->faker->word(),
            'is_successful' => $this->faker->word(),
            'error_message' => $this->faker->word(),
            'notes' => $this->faker->word(),
            'audit_type' => $this->faker->word(),
            'related_transaction_id' => $this->faker->word(),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),

            'user_id' => User::factory(),
        ];
    }
}
