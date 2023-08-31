<?php

namespace App\Http\Controllers;

use App\Models\Anak;
use App\Models\Dusun;
use App\Models\IbuHamil;
use App\Models\PesertaKB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CRUDDataDusunController extends Controller
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

        return view('admin.crud-dusun.index', [
            'title' => 'Daftar Posyandu',
            'dusun' => Dusun::latest()->paginate(10)->withQueryString(),
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
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Dusun  $dusun
     * @return \Illuminate\Http\Response
     */
    public function show(Dusun $dusun)
    {
        if (Auth::user()->role !== 'admin') {
            abort(403);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Dusun  $dusun
     * @return \Illuminate\Http\Response
     */
    public function edit(Dusun $dusun)
    {
        if (Auth::user()->role !== 'admin') {
            abort(403);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Dusun  $dusun
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Dusun $dusun)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Dusun  $dusun
     * @return \Illuminate\Http\Response
     */
    public function destroy(Dusun $dusun)
    {
        //
    }
}
