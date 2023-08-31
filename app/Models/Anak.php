<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Anak extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    protected $with = ['imunisasi', 'dusun'];

    public function scopeDusun($query, array $dusuns = [])
    {
        $query->when($dusuns['dusun'] ?? false, function ($query, $dusun) {
            return $query->whereHas('dusun', function ($query) use ($dusun) {
                $query->where('namaDusun', $dusun);
            });
        });

        $query->when($dusuns['bulan'] ?? false, function ($query, $bulan) {
            return $query->whereMonth('tanggalLahir', $bulan);
        });

        $query->when($dusuns['tahun'] ?? false, function ($query, $tahun) {
            return $query->whereYear('tanggalLahir', $tahun);
        });
    }

    public function scopeNama($query, array $namas)
    {
        $query->when($namas['cari'] ?? false, function ($query, $cari) {
            return $query->whereHas('dusun', function ($query) use ($cari) {
                $query->where('namaDusun', 'like', '%' . $cari . '%');
            })
                ->orwhere('namaAnak', 'like', '%' . $cari . '%');
        });
    }

    public function dusun()
    {
        return $this->belongsTo(Dusun::class);
    }

    public function imunisasi()
    {
        return $this->belongsTo(Imunisasi::class);
    }

    // public static function boot()
    // {
    //     parent::boot();

    //     static::creating(function ($model) {
    //         $model->id = Anak::where('id', $model->id)->max('id') + 1;
    //     });
    // }
}
