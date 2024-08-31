<?php

namespace Database\Factories;

<<<<<<< HEAD
use App\Models\Team;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use Laravel\Jetstream\Features;
=======
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
>>>>>>> bcc3e1df25726a20f9ea9081bc5085bd70630e9d

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
<<<<<<< HEAD
=======
     * The current password being used by the factory.
     */
    protected static ?string $password;
    public $i= 0;

    /**
>>>>>>> bcc3e1df25726a20f9ea9081bc5085bd70630e9d
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
<<<<<<< HEAD
        return [
            'name' => $this->faker->name(),
            'email' => $this->faker->unique()->safeEmail(),
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'two_factor_secret' => null,
            'two_factor_recovery_codes' => null,
            'remember_token' => Str::random(10),
            'profile_photo_path' => null,
            'current_team_id' => null,
=======
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
>>>>>>> bcc3e1df25726a20f9ea9081bc5085bd70630e9d
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     */
    public function unverified(): static
    {
<<<<<<< HEAD
        return $this->state(function (array $attributes) {
            return [
                'email_verified_at' => null,
            ];
        });
    }

    /**
     * Indicate that the user should have a personal team.
     */
    public function withPersonalTeam(callable $callback = null): static
    {
        if (! Features::hasTeamFeatures()) {
            return $this->state([]);
        }

        return $this->has(
            Team::factory()
                ->state(fn (array $attributes, User $user) => [
                    'name' => $user->name.'\'s Team',
                    'user_id' => $user->id,
                    'personal_team' => true,
                ])
                ->when(is_callable($callback), $callback),
            'ownedTeams'
        );
=======
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
>>>>>>> bcc3e1df25726a20f9ea9081bc5085bd70630e9d
    }
}
