<?php

namespace App\Http\Controllers;

use App\Helpers\Helper;
use App\Models\Dusun;
use App\Models\Kontrasepsi;
use App\Models\PesertaKB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CRUDDataPesertaKBController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::user()->role !== 'kaderpesertakb' && Auth::user()->role !== 'admin') {
            abort(403);
        }

        return view('admin.crud-peserta-kb.index', [
            'title' => 'Data Peserta KB',
            'peserta' => PesertaKB::latest()->nama(request(['cari']))->paginate(10)->withQueryString(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (Auth::user()->role !== 'kaderpesertakb' && Auth::user()->role !== 'admin') {
            abort(403);
        }

        return view('admin.crud-peserta-kb.create', [
            'title' => 'Tambah Data Peserta KB',
            'pos' => Dusun::all(),
            'kontra' => Kontrasepsi::all(),
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
        $id = Helper::IDGenerator(new PesertaKB, 'pesertaKB_id', 4, 'PKB');
        $newPeserta = new PesertaKB;
        $newPeserta->pesertaKB_id = $id;
        $newPeserta->namaPeserta = $request->input('namaPeserta');
        $newPeserta->tempatLahir = $request->input('tempatLahir');
        $newPeserta->tanggalLahir = $request->input('tanggalLahir');
        $newPeserta->namaPasangan = $request->input('namaPasangan');
        $newPeserta->tanggalDaftar = $request->input('tanggalDaftar');
        $newPeserta->noTelp = $request->input('noTelp');
        $newPeserta->alamat = $request->input('alamat');
        $newPeserta->dusun_id = $request->input('dusun_id');
        $newPeserta->kontrasepsi_id = $request->input('kontrasepsi_id');

        $newPeserta->save();
        return redirect('/admin/peserta-kb')->with('success', 'Data berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PesertaKB  $peserta_kb
     * @return \Illuminate\Http\Response
     */
    public function show(PesertaKB $peserta_kb)
    {
        if (Auth::user()->role !== 'kaderpesertakb' && Auth::user()->role !== 'admin') {
            abort(403);
        }

        return view('admin.crud-peserta-kb.show', [
            'title' => 'Detail Data Peserta KB',
            'peserta' => $peserta_kb,
            'pos' => Dusun::all(),
            'kontra' => Kontrasepsi::all(),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PesertaKB  $peserta_kb
     * @return \Illuminate\Http\Response
     */
    public function edit(PesertaKB $peserta_kb)
    {
        if (Auth::user()->role !== 'kaderpesertakb' && Auth::user()->role !== 'admin') {
            abort(403);
        }

        return view('admin.crud-peserta-kb.edit', [
            'title' => 'Ubah Data Peserta KB',
            'peserta' => $peserta_kb,
            'pos' => Dusun::all(),
            'kontra' => Kontrasepsi::all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PesertaKB  $peserta_kb
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PesertaKB $peserta_kb)
    {
        $newPeserta = PesertaKB::find($peserta_kb->id);

        $newPeserta->namaPeserta = $request->input('namaPeserta');
        $newPeserta->tempatLahir = $request->input('tempatLahir');

        if ($request->tanggalLahir !== $newPeserta->tanggalLahir) {
            $newPeserta->tanggalLahir = $request->input('tanggalLahir');
        }

        $newPeserta->namaPasangan = $request->input('namaPasangan');
        $newPeserta->tanggalDaftar = $request->input('tanggalDaftar');
        $newPeserta->noTelp = $request->input('noTelp');
        $newPeserta->alamat = $request->input('alamat');
        $newPeserta->dusun_id = $request->input('dusun_id');
        $newPeserta->kontrasepsi_id = $request->input('kontrasepsi_id');

        $newPeserta->save();
        return redirect('/admin/peserta-kb')->with('success', 'Data berhasil diubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PesertaKB  $peserta_kb
     * @return \Illuminate\Http\Response
     */
    public function destroy(PesertaKB $peserta_kb)
    {
        if (Auth::user()->role !== 'kaderpesertakb' && Auth::user()->role !== 'admin') {
            abort(403);
        }

        PesertaKB::destroy($peserta_kb->id);
        return redirect('/admin/ibu-hamil')->with('success', 'Data berhasil dihapus!');
    }
}
