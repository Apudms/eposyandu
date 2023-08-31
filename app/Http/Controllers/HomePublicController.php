<?php

namespace App\Http\Controllers;

use App\Models\Anak;
use App\Models\IbuHamil;
use App\Models\Kader;
use App\Models\PesertaKB;
use App\Models\Post;
use Illuminate\Http\Request;

class HomePublicController extends Controller
{
    public function index()
    {
        return view('public.home', [
            'title' => 'Halaman Utama',
            'posts' => Post::where('post', 'Banner')->latest()->get(),
            'tentang' => Post::where('post', 'Tentang')->latest()->get(),
            'anak' => Post::where('post', 'Anak')->latest()->get(),
            'bumil' => Post::where('post', 'Bumil')->latest()->get(),
            'peserta' => Post::where('post', 'Peserta')->latest()->get(),
            'a' => Anak::all(),
            'b' => IbuHamil::all(),
            'p' => PesertaKB::all(),
        ]);
    }

    public function about()
    {
        return view('public.about', [
            'title' => 'Tentang',
            'tentang' => Post::where('post', 'Tentang')->latest()->get(),
        ]);
    }

    public function contact()
    {
        return view('public.contact', [
            'title' => 'Kontak',
        ]);
    }

    public function petugas()
    {
        return view('public.kader', [
            'title' => 'Kader',
            'ketua' => Kader::where('jabatan', 'Ketua')->latest()->get(),
            'sekretaris' => Kader::where('jabatan', 'Sekretaris')->latest()->get(),
            'bendahara' => Kader::where('jabatan', 'Bendahara')->latest()->get(),
            'anggota' => Kader::where('jabatan', 'Anggota')->latest()->get(),
        ]);
    }
}
