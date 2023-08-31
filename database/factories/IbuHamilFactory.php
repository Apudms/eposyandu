<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class IbuHamilFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'dusun_id' => mt_rand(1, 4),
            'namaIbuHamil' => $this->faker->name($gender = 'female'),
            'tempatLahir' => $this->faker->city(),
            'tanggalLahir' => $this->faker->dateTimeBetween('-35 years', '-19 months'),
            'namaSuami' => $this->faker->name($gender = 'male'),
            'tanggalDaftar' => $this->faker->dateTimeBetween('-10 months', '-1 week'),
            'noTelp' => $this->faker->phoneNumber(),
            'alamat' => $this->faker->address(),
        ];
    }
}
