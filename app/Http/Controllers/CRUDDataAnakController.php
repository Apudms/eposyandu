<?php

namespace App\Http\Controllers;

use App\Helpers\Helper;
use App\Models\Anak;
use App\Models\Dusun;
use App\Models\Imunisasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CRUDDataAnakController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::user()->role !== 'kaderanak' && Auth::user()->role !== 'admin') {
            abort(403);
        }

        return view('admin.crud-anak.index', [
            'title' => 'Data Anak',
            'anak' => Anak::latest()->nama(request(['cari']))->paginate(10)->withQueryString(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (Auth::user()->role !== 'kaderanak' && Auth::user()->role !== 'admin') {
            abort(403);
        }

        return view('admin.crud-anak.create', [
            'title' => 'Tambah Data Anak',
            'pos' => Dusun::all(),
            'imun' => Imunisasi::all(),
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
        $idd = Helper::IDGenerator(new Anak, 'anak_id', 4, 'A');
        $newAnak = new Anak;
        $newAnak->anak_id = $idd;
        $newAnak->namaAnak = $request->input('namaAnak');
        $newAnak->tempatLahir = $request->input('tempatLahir');
        $newAnak->tanggalLahir = $request->input('tanggalLahir');
        $newAnak->jenisKelamin = $request->input('jenisKelamin');
        $newAnak->namaIbu = $request->input('namaIbu');
        $newAnak->namaAyah = $request->input('namaAyah');
        $newAnak->alamat = $request->input('alamat');
        $newAnak->imunisasi_id = $request->input('imunisasi_id');
        $newAnak->dusun_id = $request->input('dusun_id');

        $newAnak->save();
        return redirect('/admin/anak')->with('success', 'Data berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Anak  $anak
     * @return \Illuminate\Http\Response
     */
    public function show(Anak $anak)
    {
        if (Auth::user()->role !== 'kaderanak' && Auth::user()->role !== 'admin') {
            abort(403);
        }

        return view('admin.crud-anak.show', [
            'title' => 'Detail Data Anak',
            'anak' => $anak,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Anak  $anak
     * @return \Illuminate\Http\Response
     */
    public function edit(Anak $anak)
    {
        if (Auth::user()->role !== 'kaderanak' && Auth::user()->role !== 'admin') {
            abort(403);
        }

        return view('admin.crud-anak.edit', [
            'title' => 'Ubah Data Anak',
            'anak' => $anak,
            'pos' => Dusun::all(),
            'imun' => Imunisasi::all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Anak  $anak
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Anak $anak)
    {
        $newAnak = Anak::find($anak->id);

        $newAnak->namaAnak = $request->input('namaAnak');
        $newAnak->tempatLahir = $request->input('tempatLahir');
        $newAnak->tanggalLahir = $request->input('tanggalLahir');
        $newAnak->jenisKelamin = $request->input('jenisKelamin');
        $newAnak->namaIbu = $request->input('namaIbu');
        $newAnak->namaAyah = $request->input('namaAyah');
        $newAnak->alamat = $request->input('alamat');
        $newAnak->imunisasi_id = $request->input('imunisasi_id');
        $newAnak->dusun_id = $request->input('dusun_id');

        $newAnak->save();
        return redirect('/admin/anak')->with('success', 'Data berhasil diubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Anak  $anak
     * @return \Illuminate\Http\Response
     */
    public function destroy(Anak $anak)
    {
        Anak::destroy($anak->id);
        return redirect('/admin/anak')->with('success', 'Data berhasil dihapus!');
    }
}
