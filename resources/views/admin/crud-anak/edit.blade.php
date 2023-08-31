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
              <form class="form-horizontal" action="/admin/anak/{{ $anak->id }}" method="POST">
                @method('put')
                @csrf
                <div class="card-body">

                  <div class="form-group row">
                    <label for="namaAnak" class="col-sm-2 col-form-label">Nama Anak</label>
                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6">
                      <input type="text" class="form-control" id="namaAnak" name="namaAnak" placeholder="Nama Anak" required value="{{ old('namaAnak', $anak->namaAnak) }}">
                    </div>
                  </div>

                  <div class="form-group row">
                    <label for="tempatLahir" class="col-sm-2 col-form-label">Tempat Lahir</label>
                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6">
                      <input type="text" class="form-control" id="tempatLahir" name="tempatLahir" placeholder="Tempat Lahir" required value="{{ old('tempatLahir', $anak->tempatLahir) }}">
                    </div>
                  </div>

                  <div class="form-group row">
                    <label for="tanggalLahir" class="col-sm-2 col-form-label">Tanggal Lahir</label>
                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6">
                      <input type="text" class="form-control" id="tanggalLahir" name="tanggalLahir" placeholder="Tanggal Lahir" disabled value="{{ old('tanggalLahir', $anak->tanggalLahir) }}">
                    </div>
                  </div>

                  <div class="form-group row">
                    <label for="tanggalLahir" class="col-sm-2 col-form-label"></label>
                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6">
                      <input type="date" class="form-control" id="tanggalLahir" name="tanggalLahir" placeholder="Tanggal Lahir" required>
                    </div>
                  </div>

                  <div class="form-group row">
                    <label for="namaIbu" class="col-sm-2 col-form-label">Nama Ibu</label>
                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6">
                      <input type="text" class="form-control" id="namaIbu" name="namaIbu" placeholder="Nama Ibu" required value="{{ old('namaIbu', $anak->namaIbu) }}">
                    </div>
                  </div>

                  <div class="form-group row">
                    <label for="namaAyah" class="col-sm-2 col-form-label">Nama Ayah</label>
                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6">
                      <input type="text" class="form-control" id="namaAyah" name="namaAyah" placeholder="Nama Ayah" required value="{{ old('namaAyah', $anak->namaAyah) }}">
                    </div>
                  </div>

                  <div class="form-group row">
                    <label for="jenisKelamin" class="col-sm-2 col-form-label">Jenis Kelamin</label>
                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6">
                      <select class="form-control" id="jenisKelamin" name="jenisKelamin"">
                        @if ($anak->jenisKelamin == "Laki-laki")
                          <option value="Laki-laki" selected>Laki-laki</option>
                          <option value="Perempuan">Perempuan</option>
                        @else
                          <option value="Laki-laki">Laki-laki</option>
                          <option value="Perempuan" selected>Perempuan</option>
                        @endif
                      </select>
                    </div>
                  </div>

                  <div class="form-group row">
                    <label for="alamat" class="col-sm-2 col-form-label">Alamat</label>
                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6">
                      <input type="text" class="form-control" id="alamat" name="alamat" placeholder="Alamat" required value="{{ old('alamat', $anak->alamat) }}">
                    </div>
                  </div>
                  
                  <div class="form-group row">
                    <label for="imunisasi_id" class="col-sm-2 col-form-label">Jenis Imunisasi</label>
                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6">
                      <select class="form-control" id="imunisasi_id" name="imunisasi_id">
                        @foreach ($imun as $i)
                          @if ($anak->imunisasi_id == $i->id)
                            <option value="{{ $anak->imunisasi_id }}" selected>{{ $anak->imunisasi->jenisImun }}</option>
                          @endif
                          @if ($anak->imunisasi_id !== $i->id)
                            <option value="{{ $i->id }}">{{ $i->jenisImun }}</option>
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
                          @if ($anak->dusun_id == $p->id)
                            <option value="{{ $anak->dusun_id }}" selected>{{ $anak->dusun->namaDusun }}</option>
                          @endif
                          @if ($anak->dusun_id !== $p->id)
                            <option value="{{ $p->id }}">{{ $p->namaDusun }}</option>
                          @endif
                        @endforeach
                      </select>
                    </div>
                  </div>

                </div>
                <div class="card-footer">
                  <a href="/admin/anak" class="btn btn-secondary">Kembali</a>
                  <button type="submit" class="btn btn-info float-right">Tambah</button>
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
  dateControl.value = 'TTTT-BB-HH';
  console.log(dateControl.value); 
  console.log(dateControl.valueAsNumber); 
</script>
@endsection