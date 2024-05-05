<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * The current password being used by the factory.
     */
    protected static ?string $password;
    public $i= 0;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $this->i++;
        $prefixes = ['77', '78', '76', '70'];
        $sex = ['M','F'];
        $randomSex = $this->faker->randomElement($sex);
        $randomPrefix = $this->faker->randomElement($prefixes);
        $phoneNumber = $randomPrefix . $this->faker->unique()->numerify('#######');

        return [
            'firstname' => $this->faker->firstName(),
            'lastname' => $this->faker->lastName(),
            'phone' => $phoneNumber,
            'email' => $this->faker->unique()->safeEmail(),
            'id_unknown' => hash('sha1', $this->i),
            'email_verified_at' => now(),
            'password' => 'password',
            'sex' => $randomSex,
            'remember_token' => Str::random(10),
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     */
    public function unverified(): static
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}
