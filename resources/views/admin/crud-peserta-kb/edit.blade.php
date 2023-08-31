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
              <form class="form-horizontal" action="/admin/peserta-kb/{{ $peserta->id }}" method="POST">
                @method('put')
                @csrf
                <div class="card-body">

                  <div class="form-group row">
                    <label for="namaPeserta" class="col-sm-2 col-form-label">Nama Peserta</label>
                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6">
                      <input type="text" class="form-control" id="namaPeserta" name="namaPeserta" placeholder="Nama Peserta" required value="{{ old('namaPeserta', $peserta->namaPeserta) }}">
                    </div>
                  </div>

                  <div class="form-group row">
                    <label for="tempatLahir" class="col-sm-2 col-form-label">Tempat Lahir</label>
                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6">
                      <input type="text" class="form-control" id="tempatLahir" name="tempatLahir" placeholder="Tempat Lahir" required value="{{ old('tempatLahir', $peserta->tempatLahir) }}">
                    </div>
                  </div>

                  <div class="form-group row">
                    <label for="tanggalLahir" class="col-sm-2 col-form-label">Tanggal Lahir</label>
                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6">
                      <input type="text" class="form-control" id="tanggalLahir" name="tanggalLahir" placeholder="Tanggal Lahir" disabled value="{{ old('tanggalLahir', $peserta->tanggalLahir) }}">
                    </div>
                  </div>
                  
                  <div class="form-group row">
                    <label for="tanggalLahir" class="col-sm-2 col-form-label"></label>
                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6">
                      <input type="date" class="form-control" id="tanggalLahir" name="tanggalLahir" placeholder="Tanggal Lahir" value="{{ old('tanggalLahir', $peserta->tanggalLahir) }}">
                    </div>
                  </div>
                  
                  <div class="form-group row">
                    <label for="namaPasangan" class="col-sm-2 col-form-label">Nama Pasangan</label>
                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6">
                      <input type="text" class="form-control" id="namaPasangan" name="namaPasangan" placeholder="Nama Pasangan" required value="{{ old('namaPasangan', $peserta->namaPasangan) }}">
                    </div>
                  </div>
                  
                  <div class="form-group row">
                    <label for="alamat" class="col-sm-2 col-form-label">Alamat</label>
                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6">
                      <input type="text" class="form-control" id="alamat" name="alamat" placeholder="Alamat" required value="{{ old('alamat', $peserta->alamat) }}">
                    </div>
                  </div>
                  
                  <div class="form-group row">
                    <label for="noTelp" class="col-sm-2 col-form-label">No Telepon</label>
                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6">
                      <input type="text" class="form-control" id="noTelp" name="noTelp" placeholder="No Telepon" required value="{{ old('noTelp', $peserta->noTelp) }}">
                    </div>
                  </div>
                  
                  <div class="form-group row">
                    <label for="kontrasepsi_id" class="col-sm-2 col-form-label">Jenis Kontrasepsi</label>
                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6">
                      <select class="form-control" id="kontrasepsi_id" name="kontrasepsi_id">
                        @foreach ($kontra as $k)
                          @if ($peserta->kontrasepsi_id == $k->id)
                            <option value="{{ $peserta->kontrasepsi_id }}" selected>{{ $peserta->kontrasepsi->jenisKontrasepsi }}</option>
                          @endif
                          @if ($peserta->kontrasepsi_id !== $k->id)
                            <option value="{{ $k->id }}">{{ $k->jenisKontrasepsi }}</option>
                          @endif
                        @endforeach
                      </select>
                    </div>
                  </div>
                  
                  <div class="form-group row">
                    <label for="dusun_id" class="col-sm-2 col-form-label">Posyandu</label>
                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6">
                      <select class="form-control" id="dusun_id" name="dusun_id">
                        @foreach ($pos as $p)
                          @if ($peserta->dusun_id == $p->id)
                            <option value="{{ $peserta->dusun_id }}" selected>{{ $peserta->dusun->namaDusun }}</option>
                          @endif
                          @if ($peserta->dusun_id !== $p->id)
                            <option value="{{ $p->id }}">{{ $p->namaDusun }}</option>
                          @endif
                        @endforeach
                      </select>
                    </div>
                  </div>

                  <div class="form-group row">
                    <label for="tanggalDaftar" class="col-sm-2 col-form-label">Tanggal Daftar</label>
                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6">
                      <input type="date" class="form-control" id="tanggalDaftar" name="tanggalDaftar" placeholder="Tanggal Daftar" required value="{{ old('tanggalDaftar', $peserta->tanggalDaftar) }}">
                    </div>
                  </div>
                  
                </div>
                <div class="card-footer">
                  <a href="/admin/peserta-kb" class="btn btn-secondary">Kembali</a>
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

@section('jsOpsi')
<script>
  var dateControl = document.querySelector('input[type="date"]');
  dateControl.value = 'TTT-BB-HH';
  console.log(dateControl.value); 
  console.log(dateControl.valueAsNumber); 
</script>
@endsection