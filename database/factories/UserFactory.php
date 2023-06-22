<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        static $firstRecord = true;

        if ($firstRecord) {
            $firstRecord = false;
            return [
                'name' => 'Teste',
                'email' => 'teste@teste.com',
                'password' => Hash::make('1234'),
            ];
        }

        return [
            'name' => $this->faker->name(),
            'email' => Str::random(10).'@gmail.com',
            'password' => Hash::make('password'),
        ];
    }
}
