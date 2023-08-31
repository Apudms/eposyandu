<?php

namespace App\Http\Controllers;

use App\Models\Anak;
use App\Models\IbuHamil;
use App\Models\Kader;
use App\Models\PesertaKB;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        return view('admin.index', [
            'title' => 'Dashboard',
            // 'role' => User::where('id', auth()->user->id)->get(),
            'anaks' => Anak::all(),
            'bumils' => IbuHamil::all(),
            'pesertakbs' => PesertaKB::all(),
            'petugass' => Kader::all(),
        ]);
    }
}
