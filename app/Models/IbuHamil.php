<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IbuHamil extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function scopeDusun($query, array $dusuns = [])
    {
        $query->when($dusuns['dusun'] ?? false, function ($query, $dusun) {
            return $query->whereHas('dusun', function ($query) use ($dusun) {
                $query->where('dusun_id', $dusun);
            });
        });

        $query->when($dusuns['bulan'] ?? false, function ($query, $bulan) {
            return $query->whereMonth('tanggalDaftar', $bulan);
        });

        $query->when($dusuns['tahun'] ?? false, function ($query, $tahun) {
            return $query->whereYear('tanggalDaftar', $tahun);
        });
    }

    public function scopeNama($query, array $namas)
    {
        $query->when($namas['cari'] ?? false, function ($query, $cari) {
            return $query->whereHas('dusun', function ($query) use ($cari) {
                $query->where('namaDusun', 'like', '%' . $cari . '%');
            })
                ->orwhere('namaIbuHamil', 'like', '%' . $cari . '%');
        });
    }

    public function dusun()
    {
        return $this->belongsTo(Dusun::class);
    }
}
