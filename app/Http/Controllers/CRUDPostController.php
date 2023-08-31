<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CRUDPostController extends Controller
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

        return view('admin.crud-post.index', [
            'title' => 'Data Post',
            'posts' => Post::latest()->nama(request(['cari']))->paginate(10)->withQueryString(),
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

        return view('admin.crud-post.create', [
            'title' => 'Tambah Data Post',
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
        $validasi = $request->validate([
            'judul' => 'required',
            'deskripsi' => 'required',
            'post' => 'required',
            'foto' => 'nullable',
        ]);

        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $imagemimes = ['mimes:png,jpg,jpeg'];

            if (in_array($file->getMimeType(), $imagemimes)) {
                $validasi['foto'] = 'mimes:png,jpg,jpeg|file|max:5120';
            }

            $validasi['foto'] = $request->file('foto')->store('foto-posts');
        }

        Post::create($validasi);
        return redirect('/admin/post')->with('success', 'Data berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        if (Auth::user()->role != 'admin') {
            abort(403);
        }

        return view('admin.crud-post.show', [
            'title' => 'Data Post',
            'post' => $post,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        if (Auth::user()->role != 'admin') {
            abort(403);
        }

        return view('admin.crud-post.edit', [
            'title' => 'Data Post',
            'post' => $post,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $newPost = Post::find($post->id);

        $newPost->judul = $request->input('judul');
        $newPost->deskripsi = $request->input('deskripsi');
        $newPost->post = $request->input('post');

        if ($request->foto) {
            if ($request->hasFile('foto')) {
                $file = $request->file('foto');
                $imagemimes = ['mimes:png,jpg,jpeg'];

                if (in_array($file->getMimeType(), $imagemimes)) {
                    $newPost->foto = 'mimes:png,jpg,jpeg|file|max:5120';
                }

                $newPost->foto = $request->file('foto')->store('foto-posts');
            }
        }

        $newPost->save();
        return redirect('/admin/post')->with('success', 'Data berhasil ditambahkan!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        if (Auth::user()->role != 'admin') {
            abort(403);
        }

        Post::destroy($post->id);
        return redirect('/admin/post')->with('success', 'Data berhasil dihapus!');
    }
}
