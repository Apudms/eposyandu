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
              <form class="form-horizontal" action="/admin/kader/{{ $kader->id }}" method="POST" enctype="multipart/form-data">
                @method('put')
                @csrf
                <div class="card-body">

                  <div class="form-group row">
                    <label for="namaKader" class="col-sm-2 col-form-label">Nama</label>
                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6">
                      <input type="text" class="form-control" id="namaKader" name="namaKader" placeholder="Nama" required value="{{ old('namaKader', $kader->namaKader) }}">
                    </div>
                  </div>

                  <div class="form-group row">
                    <label for="tempatLahir" class="col-sm-2 col-form-label">Tempat Lahir</label>
                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6">
                      <input type="text" class="form-control" id="tempatLahir" name="tempatLahir" placeholder="Tempat Lahir" required value="{{ old('tempatLahir', $kader->tempatLahir) }}">
                    </div>
                  </div>

                  <div class="form-group row">
                    <label for="tanggalLahir" class="col-sm-2 col-form-label">Tanggal Lahir</label>
                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6">
                      <input type="text" class="form-control" id="tanggalLahir" name="tanggalLahir" placeholder="Tanggal Lahir" disabled value="{{ old('tanggalLahir', $kader->tanggalLahir) }}">
                    </div>
                  </div>
                  
                  <div class="form-group row">
                    <label for="tanggalLahir" class="col-sm-2 col-form-label"></label>
                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6">
                      <input type="date" class="form-control" id="tanggalLahir" name="tanggalLahir" placeholder="Tanggal Lahir" required value="{{ old('tanggalLahir', $kader->tanggalLahir) }}">
                    </div>
                  </div>
                  
                  <div class="form-group row">
                    <label for="alamat" class="col-sm-2 col-form-label">Alamat</label>
                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6">
                      <input type="text" class="form-control" id="alamat" name="alamat" placeholder="Alamat" required value="{{ old('alamat', $kader->alamat) }}">
                    </div>
                  </div>
                  
                  <div class="form-group row">
                    <label for="noTelp" class="col-sm-2 col-form-label">No Telepon</label>
                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6">
                      <input type="number" class="form-control" id="noTelp" name="noTelp" placeholder="No Telepon" required value="{{ old('noTelp', $kader->noTelp) }}">
                    </div>
                  </div>
                  
                  <div class="form-group row">
                    <label for="dusun_id" class="col-sm-2 col-form-label">Posyandu</label>
                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6">
                      <select class="form-control" id="dusun_id" name="dusun_id">
                        @foreach ($pos as $p)
                          @if ($kader->dusun_id == $p->id)
                            <option value="{{ $kader->dusun_id }}" selected>{{ $kader->dusun->namaDusun }}</option>
                          @endif
                          @if ($kader->dusun_id !== $p->id)
                            <option value="{{ $p->id }}">{{ $p->namaDusun }}</option>
                          @endif
                        @endforeach
                      </select>
                    </div>
                  </div>

                  <div class="form-group row">
                    <label for="jabatan" class="col-sm-2 col-form-label">Jabatan</label>
                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6">
                      <select class="form-control" id="jabatan" name="jabatan"">
                        @if ($kader->jabatan == "Ketua")
                          <option value="Ketua" selected>Ketua</option>
                          <option value="Sekretaris">Sekretaris</option>
                          <option value="Bendahara">Bendahara</option>
                          <option value="Anggota">Anggota</option>
                        @elseif ($kader->jabatan == "Sekretaris")
                          <option value="Ketua">Ketua</option>
                          <option value="Sekretaris" selected>Sekretaris</option>
                          <option value="Bendahara">Bendahara</option>
                          <option value="Anggota">Anggota</option>
                        @elseif ($kader->jabatan == "Bendahara")
                          <option value="Ketua">Ketua</option>
                          <option value="Sekretaris">Sekretaris</option>
                          <option value="Bendahara" selected>Bendahara</option>
                          <option value="Anggota">Anggota</option>
                        @elseif ($kader->jabatan == "Anggota")
                          <option value="Ketua">Ketua</option>
                          <option value="Sekretaris">Sekretaris</option>
                          <option value="Bendahara">Bendahara</option>
                          <option value="Anggota" selected>Anggota</option>
                        @endif
                      </select>
                    </div>
                  </div>

                  <div class="form-group row">
                    <label for="foto" class="col-sm-2 col-form-label">Foto</label>
                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6">
                      <div class="position-relative rounded-top" style="z-index: 1;">
                        <img class="img-fluid rounded-top w-100" src="{{ asset('storage/'. $kader->foto) }}" style="width: 19rem; height: 19rem;"  alt="">
                      </div>
                    </div>
                  </div>

                  <div class="form-group row">
                    <label for="foto" class="col-sm-2 col-form-label"></label>
                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6">
                      <div class="custom-file">
                        <label class="custom-file-label" for="foto">Ubah foto</label>
                        <input type="file" class="custom-file-input" id="foto" name="foto">
                      </div>
                    </div>
                  </div>

                </div>
                <div class="card-footer">
                  <a href="/admin/kader" class="btn btn-secondary">Kembali</a>
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
  <script src="{{ asset('/assets/admin') }}/plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
  <script>
    $(function () {
      bsCustomFileInput.init();
    });

    var dateControl = document.querySelector('input[type="date"]');
    dateControl.value = 'TTT-BB-HH';
    console.log(dateControl.value); 
    console.log(dateControl.valueAsNumber); 
  </script>
@endsection