<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Doctor>
 */
class DoctorFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->name,
            'image' => $this->faker->imageUrl(200, 200, 'people'),
            'experience' => $this->faker->numberBetween(1, 30) . ' years',
            'phone' => $this->faker->phoneNumber,
            'email' => $this->faker->unique()->safeEmail,
            'location' => $this->faker->city,
            'working_hours' => '9am-5pm',
            'certifications' => $this->faker->words(2, true),
            'about' => $this->faker->sentence(10),
        ];
    }
}
