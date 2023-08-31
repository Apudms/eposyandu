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
                <h3 class="card-title">Form {{ $title }}</h3>
              </div>
              <form class="form-horizontal" action="/admin/imunisasi/{{ $imun->id }}" method="POST">
                @method('put')
                @csrf
                <div class="card-body">

                  <div class="form-group row">
                    <label for="jenisImun" class="col-sm-2 col-form-label">Jenis Imunisasi</label>
                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6">
                      <input type="text" class="form-control" id="jenisImun" name="jenisImun" placeholder="Jenis Imunisasi" required value="{{ old('jenisImun', $imun->jenisImun) }}">
                    </div>
                  </div>

                </div>
                <div class="card-footer">
                  <a href="/admin/imunisasi" class="btn btn-secondary">Kembali</a>
                  <button type="submit" class="btn btn-info float-right">Ubah</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>

@endsection
