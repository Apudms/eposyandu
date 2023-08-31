<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kontrasepsi extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function scopeNama($query, array $namas)
    {
        $query->when($namas['cari'] ?? false, function ($query, $cari) {
            return $query->where('jenisKontrasepsi', 'like', '%' . $cari . '%');
        });
    }

    public function pesertaKbs()
    {
        return $this->hasMany(PesertaKB::class);
    }
}
