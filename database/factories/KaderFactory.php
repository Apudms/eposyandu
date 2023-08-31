<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class KaderFactory extends Factory
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
            'namaKader' => $this->faker->name($gender = 'female'),
            'jabatan' => $this->faker->randomElement(['Ketua', 'Sekretaris', 'Bendahara', 'Anggota']),
            'tempatLahir' => $this->faker->city(),
            'tanggalLahir' => $this->faker->dateTimeBetween('-35 years', '-19 months'),
            'noTelp' => $this->faker->phoneNumber(),
            'alamat' => $this->faker->address(),
        ];
    }
}
