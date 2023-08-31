<?php

namespace App\Http\Controllers;

use App\Models\Kontrasepsi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CRUDDataKontrasepsiController extends Controller
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

        return view('admin.crud-kontrasepsi.index', [
            'title' => 'Data Kontrasepsi',
            'kontra' => Kontrasepsi::latest()->nama(request(['cari']))->paginate(10)->withQueryString(),
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

        return view('admin.crud-kontrasepsi.create', [
            'title' => 'Tambah Data Kontrasepsi',
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
        $newKontra = new Kontrasepsi;

        $newKontra->jenisKontrasepsi = $request->input('jenisKontrasepsi');

        $newKontra->save();
        return redirect('/admin/kontrasepsi')->with('success', 'Data berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Kontrasepsi  $kontrasepsi
     * @return \Illuminate\Http\Response
     */
    public function show(Kontrasepsi $kontrasepsi)
    {
        if (Auth::user()->role !== 'admin') {
            abort(403);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Kontrasepsi  $kontrasepsi
     * @return \Illuminate\Http\Response
     */
    public function edit(Kontrasepsi $kontrasepsi)
    {
        if (Auth::user()->role !== 'admin') {
            abort(403);
        }

        return view('admin.crud-kontrasepsi.edit', [
            'title' => 'Ubah Data Kontrasepsi',
            'kontra' => $kontrasepsi,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Kontrasepsi  $kontrasepsi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Kontrasepsi $kontrasepsi)
    {
        $newKontra = Kontrasepsi::find($kontrasepsi->id);

        $newKontra->jenisKontrasepsi = $request->input('jenisKontrasepsi');

        $newKontra->save();
        return redirect('/admin/kontrasepsi')->with('success', 'Data berhasil diubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Kontrasepsi  $kontrasepsi
     * @return \Illuminate\Http\Response
     */
    public function destroy(Kontrasepsi $kontrasepsi)
    {
        if (Auth::user()->role !== 'admin') {
            abort(403);
        }

        Kontrasepsi::destroy($kontrasepsi->id);
        return redirect('/admin/kontrasepsi')->with('success', 'Data berhasil dihapus!');
    }
}
