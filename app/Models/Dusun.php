<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dusun extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function kaders()
    {
        return $this->hasMany(Kader::class);
    }

    public function anaks()
    {
        return $this->hasMany(Anak::class);
    }

    public function ibuHamils()
    {
        return $this->hasMany(IbuHamil::class);
    }

    public function pesertaKbs()
    {
        return $this->hasMany(PesertaKB::class);
    }
}
