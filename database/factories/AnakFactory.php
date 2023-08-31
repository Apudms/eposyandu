<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class AnakFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'imunisasi_id' => mt_rand(1, 8),
            'dusun_id' => mt_rand(1, 4),
            'namaAnak' => $this->faker->name(),
            'tempatLahir' => $this->faker->city(),
            'tanggalLahir' => $this->faker->dateTimeBetween('-3 years', '-1 months'),
            'namaIbu' => $this->faker->name($gender = 'female'),
            'namaAyah' => $this->faker->name($gender = 'male'),
            'jenisKelamin' => $this->faker->randomElement(['Laki-laki', 'Perempuan']),
            'alamat' => $this->faker->address(),
        ];
    }
}
