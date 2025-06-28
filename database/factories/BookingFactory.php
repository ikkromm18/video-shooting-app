<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Booking>
 */
class BookingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => $this->faker->numberBetween(1, 2),
            'nama' => $this->faker->name(),
            'email' => $this->faker->safeEmail(),
            'no_hp' => $this->faker->phoneNumber(),
            'layanan_id' => $this->faker->numberBetween(1, 4),
            'tambahan_id' => $this->faker->numberBetween(1, 2),
            'tgl_acara' => $this->faker->dateTimeBetween('+1 days', '+1 month')->format('Y-m-d'),
            'alamat' => $this->faker->address(),
            'total_harga' => $this->faker->numberBetween(500000, 5000000),
            'status' => $this->faker->randomElement(['menunggu', 'noted', 'DP', 'lunas', 'batal']),
        ];
    }
}
