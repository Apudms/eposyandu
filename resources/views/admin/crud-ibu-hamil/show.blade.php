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
                    <span for="namaIbuHamil" class="col-sm-2">Nama Bumil</span>
                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6">
                      <span>: <label>{{ $bumil->namaIbuHamil }}</label></span>
                    </div>
                  </div>

                  <div class="form-group row">
                    <span for="tempatLahir" class="col-sm-2">Tempat Lahir</span>
                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6">
                      <span>: <label>{{ $bumil->tempatLahir }}</label></span>
                    </div>
                  </div>

                  <div class="form-group row">
                    <span for="tanggalLahir" class="col-sm-2">Tanggal Lahir</span>
                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6">
                      <span>: <label>{{ $bumil->tanggalLahir }}</label></span>
                    </div>
                  </div>

                  <div class="form-group row">
                    <span for="namaSuami" class="col-sm-2">Nama Suami</span>
                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6">
                      <span>: <label>{{ $bumil->namaSuami }}</label></span>
                    </div>
                  </div>

                  <div class="form-group row">
                    <span for="alamat" class="col-sm-2">Alamat</span>
                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6">
                      <span>: <label>{{ $bumil->alamat }}</label></span>
                    </div>
                  </div>

                  <div class="form-group row">
                    <span for="dusun_id" class="col-sm-2">Posyandu</span>
                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6">
                      <span>: <label>{{ $bumil->dusun->namaDusun }}</label></span>
                    </div>
                  </div>

                  <div class="form-group row">
                    <span for="tanggalDaftar" class="col-sm-2">Tanggal Daftar</span>
                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6">
                      <span>: <label>{{ $bumil->tanggalDaftar }}</label></span>
                    </div>
                  </div>

                </div>
                <div class="card-footer">
                  <a href="/admin/peserta-kb" class="btn btn-secondary">Kembali</a>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>

@endsection
