@extends('admin.layouts.main')

@section('container')
  <div class="content-wrapper">
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">{{ $title }}</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
              <li class="breadcrumb-item active">{{ $title }}</li>
            </ol>
          </div>
        </div>
      </div>
    </div>
    
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col">
            <div class="card card-info">
              <div class="card-header">
                <h3 class="card-title">Informasi {{ $title }}</h3>
              </div>
              <form class="form-horizontal">
                <div class="card-body">

                  <div class="form-group row">
                    <span for="judul" class="col-sm-2">Judul</span>
                    <div class="col-xl-10 col-lg-6 col-md-6 col-sm-6">
                      <label>{{ $post->judul }}</label>
                    </div>
                  </div>

                  <div class="form-group row">
                    <span for="deskripsi" class="col-sm-2">Deskripsi</span>
                    <div class="col-xl-10 col-lg-6 col-md-6 col-sm-6">
                      <label>{{ $post->deskripsi }}</label>
                    </div>
                  </div>

                  <div class="form-group row">
                    <span for="judul" class="col-sm-2">Judul</span>
                    <div class="col-xl-10 col-lg-6 col-md-6 col-sm-6">
                      <div class="position-relative" style="z-index: 1;">
                        <img class="img-fluid" src="{{ asset('storage/'. $post->foto) }}" alt="">
                      </div>
                    </div>
                  </div>

                </div>
                <div class="card-footer">
                  <a href="/admin/post" class="btn btn-secondary">Kembali</a>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>

@endsection
