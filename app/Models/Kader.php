<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kader extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function scopeNama($query, array $namas)
    {
        $query->when($namas['cari'] ?? false, function ($query, $cari) {
            return $query->whereHas('dusun', function ($query) use ($cari) {
                $query->where('namaDusun', 'like', '%' . $cari . '%');
            })
                ->orwhere('namaKader', 'like', '%' . $cari . '%');
        });
    }

    public function dusun()
    {
        return $this->belongsTo(Dusun::class);
    }
}
