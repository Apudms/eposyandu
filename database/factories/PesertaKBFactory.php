<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class PesertaKBFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'kontrasepsi_id' => mt_rand(1, 9),
            'dusun_id' => mt_rand(1, 4),
            'namaPeserta' => $this->faker->name($gender = 'female'),
            'tempatLahir' => $this->faker->city(),
            'tanggalLahir' => $this->faker->dateTime(),
            'namaPasangan' => $this->faker->name($gender = 'male'),
            'tanggalDaftar' => $this->faker->dateTimeBetween('-35 years', '-19 months'),
            'noTelp' => $this->faker->phoneNumber(),
            'alamat' => $this->faker->address(),
        ];
    }
}
