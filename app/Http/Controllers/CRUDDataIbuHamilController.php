<?php

namespace App\Http\Controllers;

use App\Helpers\Helper;
use App\Models\Dusun;
use App\Models\IbuHamil;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CRUDDataIbuHamilController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::user()->role !== 'kaderibuhamil' && Auth::user()->role !== 'admin') {
            abort(403);
        }

        return view('admin.crud-ibu-hamil.index', [
            'title' => 'Data Ibu Hamil',
            'bumils' => IbuHamil::latest()->nama(request(['cari']))->paginate(10)->withQueryString(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (Auth::user()->role !== 'kaderibuhamil' && Auth::user()->role !== 'admin') {
            abort(403);
        }

        return view('admin.crud-ibu-hamil.create', [
            'title' => 'Tambah Data Ibu Hamil',
            'pos' => Dusun::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $id = Helper::IDGenerator(new IbuHamil, 'ibuHamil_id', 4, 'IH');
        $newBumil = new IbuHamil;
        $newBumil->ibuHamil_id = $id;
        $newBumil->namaIbuHamil = $request->input('namaIbuHamil');
        $newBumil->tempatLahir = $request->input('tempatLahir');
        $newBumil->tanggalLahir = $request->input('tanggalLahir');
        $newBumil->namaSuami = $request->input('namaSuami');
        $newBumil->tanggalDaftar = $request->input('tanggalDaftar');
        $newBumil->noTelp = $request->input('noTelp');
        $newBumil->alamat = $request->input('alamat');
        $newBumil->dusun_id = $request->input('dusun_id');

        $newBumil->save();
        return redirect('/admin/ibu-hamil')->with('success', 'Data berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\IbuHamil  $ibuHamil
     * @return \Illuminate\Http\Response
     */
    public function show(IbuHamil $ibuHamil)
    {
        if (Auth::user()->role !== 'kaderibuhamil' && Auth::user()->role !== 'admin') {
            abort(403);
        }

        return view('admin.crud-ibu-hamil.show', [
            'title' => 'Detail Data Ibu Hamil',
            'bumil' => $ibuHamil,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\IbuHamil  $ibuHamil
     * @return \Illuminate\Http\Response
     */
    public function edit(IbuHamil $ibuHamil)
    {
        if (Auth::user()->role !== 'kaderibuhamil' && Auth::user()->role !== 'admin') {
            abort(403);
        }

        return view('admin.crud-ibu-hamil.edit', [
            'title' => 'Ubah Data Admin',
            'bumil' => $ibuHamil,
            'pos' => Dusun::all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\IbuHamil  $ibuHamil
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, IbuHamil $ibuHamil)
    {
        $newBumil = IbuHamil::find($ibuHamil->id);

        $newBumil->namaIbuHamil = $request->input('namaIbuHamil');
        $newBumil->tempatLahir = $request->input('tempatLahir');
        $newBumil->tanggalLahir = $request->input('tanggalLahir');
        $newBumil->namaSuami = $request->input('namaSuami');
        $newBumil->tanggalDaftar = $request->input('tanggalDaftar');
        $newBumil->noTelp = $request->input('noTelp');
        $newBumil->alamat = $request->input('alamat');
        $newBumil->dusun_id = $request->input('dusun_id');

        $newBumil->save();
        return redirect('/admin/ibu-hamil')->with('success', 'Data berhasil diubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\IbuHamil  $ibuHamil
     * @return \Illuminate\Http\Response
     */
    public function destroy(IbuHamil $ibuHamil)
    {
        if (Auth::user()->role !== 'kaderibuhamil' && Auth::user()->role !== 'admin') {
            abort(403);
        }

        IbuHamil::destroy($ibuHamil->id);
        return redirect('/admin/ibu-hamil')->with('success', 'Data berhasil dihapus!');
    }
}
