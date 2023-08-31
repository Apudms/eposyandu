<?php

namespace Database\Seeders;

use App\Models\Anak;
use App\Models\Dusun;
use App\Models\IbuHamil;
use App\Models\Imunisasi;
use App\Models\Kader;
use App\Models\Kontrasepsi;
use App\Models\PesertaKB;
use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::create(
            [
                'name' => 'Admin',
                'email' => 'admin@gmail.com',
                'role' => 'admin',
                'password' => bcrypt('admin123'), // admin123
                'remember_token' => Str::random(20),
            ]
        );

        User::create(
            [
                'name' => 'Kader Data Anak',
                'email' => 'kaderanak@gmail.com',
                'role' => 'kaderanak',
                'password' => bcrypt('kader123'), // kader123
                'remember_token' => Str::random(20),
            ]
        );

        User::create(
            [
                'name' => 'Kader Data Ibu Hamil',
                'email' => 'kaderbumil@gmail.com',
                'role' => 'kaderibuhamil',
                'password' => bcrypt('kader123'), // kader123
                'remember_token' => Str::random(20),
            ]
        );

        User::create(
            [
                'name' => 'Kader Data Peserta KB',
                'email' => 'kaderpesertakb@gmail.com',
                'role' => 'kaderpesertakb',
                'password' => bcrypt('kader123'), // kader123
                'remember_token' => Str::random(20),
            ]
        );

        Dusun::create(
            [
                'namaDusun' => 'Posyandu Mawar'
            ]
        );

        Dusun::create(
            [
                'namaDusun' => 'Posyandu Melati'
            ]
        );

        Dusun::create(
            [
                'namaDusun' => 'Posyandu Nusa Indah'
            ]
        );

        Dusun::create(
            [
                'namaDusun' => 'Posyandu Kenanga'
            ]
        );

        Kontrasepsi::create(
            [
                'jenisKontrasepsi' => 'IUD'
            ]
        );

        Kontrasepsi::create(
            [
                'jenisKontrasepsi' => 'Suntik'
            ]
        );

        Kontrasepsi::create(
            [
                'jenisKontrasepsi' => 'Implan'
            ]
        );

        Kontrasepsi::create(
            [
                'jenisKontrasepsi' => 'Kondom'
            ]
        );

        Kontrasepsi::create(
            [
                'jenisKontrasepsi' => 'Vasektomi / Tubektomi'
            ]
        );

        Kontrasepsi::create(
            [
                'jenisKontrasepsi' => 'Spermisida'
            ]
        );

        Kontrasepsi::create(
            [
                'jenisKontrasepsi' => 'Diapragma'
            ]
        );

        Kontrasepsi::create(
            [
                'jenisKontrasepsi' => 'Cervical Cap'
            ]
        );

        Kontrasepsi::create(
            [
                'jenisKontrasepsi' => 'Kalender'
            ]
        );

        Imunisasi::create(
            [
                'jenisImun' => 'DPT I'
            ]
        );

        Imunisasi::create(
            [
                'jenisImun' => 'DPT II'
            ]
        );

        Imunisasi::create(
            [
                'jenisImun' => 'DPT III'
            ]
        );

        Imunisasi::create(
            [
                'jenisImun' => 'Polio I'
            ]
        );

        Imunisasi::create(
            [
                'jenisImun' => 'Polio II'
            ]
        );

        Imunisasi::create(
            [
                'jenisImun' => 'Polio III'
            ]
        );

        Imunisasi::create(
            [
                'jenisImun' => 'Campak'
            ]
        );

        Imunisasi::create(
            [
                'jenisImun' => 'MR (Booster)'
            ]
        );

        // Kader::factory(5)->create();

        // IbuHamil::factory(4)->create();

        // PesertaKB::factory(2)->create();

        // Anak::factory(4)->create();
    }
}
