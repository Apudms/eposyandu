<?php

namespace App\Http\Controllers;

use App\Helpers\Helper;
use App\Models\Dusun;
use App\Models\Kader;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CRUDKaderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::user()->role != 'admin') {
            abort(403);
        }

        return view('admin.crud-kader.index', [
            'title' => 'Data Kader / Petugas',
            'kaders' => Kader::latest()->nama(request(['cari']))->paginate(10)->withQueryString(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (Auth::user()->role != 'admin') {
            abort(403);
        }

        return view('admin.crud-kader.create', [
            'title' => 'Tambah Data Kader / Petugas',
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
        $id = Helper::IDGenerator(new Kader, 'kader_id', 4, 'K');
        $newKader = new Kader;
        $newKader->kader_id = $id;
        $newKader->namaKader = $request->input('namaKader');
        $newKader->jabatan = $request->input('jabatan');
        $newKader->tempatLahir = $request->input('tempatLahir');
        $newKader->tanggalLahir = $request->input('tanggalLahir');
        $newKader->noTelp = $request->input('noTelp');
        $newKader->alamat = $request->input('alamat');
        $newKader->dusun_id = $request->input('dusun_id');
        $newKader->alamat = $request->input('alamat');
        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $imagemimes = ['mimes:png,jpg,jpeg'];

            if (in_array($file->getMimeType(), $imagemimes)) {
                $newKader->foto = 'mimes:png,jpg,jpeg|file|max:5120';
            }

            $newKader->foto = $request->file('foto')->store('foto-kaders');
        }
        $newKader->save();
        return redirect('/admin/kader')->with('success', 'Data berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Kader  $kader
     * @return \Illuminate\Http\Response
     */
    public function show(Kader $kader)
    {
        if (Auth::user()->role != 'admin') {
            abort(403);
        }

        return view('admin.crud-kader.show', [
            'title' => 'Detail Data Kader / Petugas',
            'kader' => $kader,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Kader  $kader
     * @return \Illuminate\Http\Response
     */
    public function edit(Kader $kader)
    {
        if (Auth::user()->role != 'admin') {
            abort(403);
        }

        return view('admin.crud-kader.edit', [
            'title' => 'Ubah Data Kader / Petugas',
            'kader' => $kader,
            'pos' => Dusun::all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Kader  $kader
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Kader $kader)
    {
        $newKader = Kader::find($kader->id);

        $newKader->namaKader = $request->input('namaKader');
        $newKader->jabatan = $request->input('jabatan');
        $newKader->tempatLahir = $request->input('tempatLahir');
        $newKader->tanggalLahir = $request->input('tanggalLahir');
        $newKader->noTelp = $request->input('noTelp');
        $newKader->alamat = $request->input('alamat');
        $newKader->dusun_id = $request->input('dusun_id');

        if ($request->foto) {
            if ($request->hasFile('foto')) {
                $file = $request->file('foto');
                $imagemimes = ['mimes:png,jpg,jpeg'];

                if (in_array($file->getMimeType(), $imagemimes)) {
                    $newKader->foto = 'mimes:png,jpg,jpeg|file|max:5120';
                }

                $newKader->foto = $request->file('foto')->store('foto-kaders');
            }
        }

        $newKader->save();
        return redirect('/admin/kader')->with('success', 'Data berhasil diubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Kader  $kader
     * @return \Illuminate\Http\Response
     */
    public function destroy(Kader $kader)
    {
        if (Auth::user()->role != 'admin') {
            abort(403);
        }

        Kader::destroy($kader->id);
        return redirect('/admin/kader')->with('success', 'Data berhasil dihapus!');
    }
}
