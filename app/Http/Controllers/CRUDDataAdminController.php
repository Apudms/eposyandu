<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CRUDDataAdminController extends Controller
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

        return view('admin.crud-akun.index', [
            'title' => 'Data Admin',
            'admin' => User::latest()->nama(request(['cari']))->paginate(10)->withQueryString(),
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

        return view('admin.crud-akun.create', [
            'title' => 'Tambah Data Akun Admin',
            'admin' => User::all(),
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
        $newAkun = new User();

        $newAkun->name = $request->input('name');
        $newAkun->email = $request->input('email');
        $newAkun->role = $request->input('role');

        if ($request->password) {
            $newAkun->password = bcrypt($request->input('password'));
        }

        $newAkun->save();
        return redirect('/admin/data-admin')->with('success', 'Data berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $akun
     * @return \Illuminate\Http\Response
     */
    public function show(User $akun)
    {
        // dd($akun);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $akun
     * @return \Illuminate\Http\Response
     */
    public function edit(User $akun)
    {
        if (Auth::user()->role !== 'admin') {
            abort(403);
        }

        $data = DB::table('users')
            ->selectRaw('id')
            ->selectRaw('name')
            ->selectRaw('role')
            ->where('id', $akun->id)
            ->get();

        // dd($data);
        // dd($akun->where('id', 2)->get()->toArray());
        return view('admin.crud-akun.edit', [
            'title' => 'Ubah Data Admin',
            'akun' => $akun,
            'role' => User::all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $akun
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $akun)
    {
        $newAkun = User::find($akun->id);

        $newAkun->name = $request->input('name');
        $newAkun->email = $request->input('email');
        $newAkun->role = $request->input('role');

        if ($request->password !== $newAkun->password) {
            $newAkun->password = bcrypt($request->input('password'));
        }

        $newAkun->save();
        return redirect('/admin/data-admin')->with('success', 'Data berhasil diubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $akun
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $akun)
    {
        // if ($akun->id != 1 && $akun->role !== 'admin') {
        //     abort(403);
        //     return back()->with('gagal', 'Tidak dapat menghapus akun utama!');
        // }
        User::destroy($akun->id);
        return redirect('/admin/data-admin')->with('success', 'Data berhasil dihapus!');
    }
}
