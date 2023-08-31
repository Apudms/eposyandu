<?php

namespace App\Http\Controllers;

use App\Models\Imunisasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CRUDDataImunisasiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::user()->role !== 'admin') {
            abort(403);
        }

        return view('admin.crud-imunisasi.index', [
            'title' => 'Data Imunisasi',
            'imun' => Imunisasi::latest()->nama(request(['cari']))->paginate(10)->withQueryString(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (Auth::user()->role !== 'admin') {
            abort(403);
        }

        return view('admin.crud-imunisasi.create', [
            'title' => 'Tambah Data Imunisasi',
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
        $newImun = new Imunisasi;

        $newImun->jenisImun = $request->input('jenisImun');

        $newImun->save();
        return redirect('/admin/imunisasi')->with('success', 'Data berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Imunisasi  $imunisasi
     * @return \Illuminate\Http\Response
     */
    public function show(Imunisasi $imunisasi)
    {
        if (Auth::user()->role !== 'admin') {
            abort(403);
        }

        // return view('admin.crud-imunisasi.show', [
        //     'title' => 'Detail Data Anak',
        //     'imun' => $imunisasi,
        // ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Imunisasi  $imunisasi
     * @return \Illuminate\Http\Response
     */
    public function edit(Imunisasi $imunisasi)
    {
        if (Auth::user()->role !== 'admin') {
            abort(403);
        }

        return view('admin.crud-imunisasi.edit', [
            'title' => 'Ubah Data Imunisasi',
            'imun' => $imunisasi,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Imunisasi  $imunisasi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Imunisasi $imunisasi)
    {
        $newImun = Imunisasi::find($imunisasi->id);

        $newImun->jenisImun = $request->input('jenisImun');

        $newImun->save();
        return redirect('/admin/imunisasi')->with('success', 'Data berhasil diubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Imunisasi  $imunisasi
     * @return \Illuminate\Http\Response
     */
    public function destroy(Imunisasi $imunisasi)
    {
        if (Auth::user()->role !== 'admin') {
            abort(403);
        }

        Imunisasi::destroy($imunisasi->id);
        return redirect('/admin/imunisasi')->with('success', 'Data berhasil dihapus!');
    }
}
