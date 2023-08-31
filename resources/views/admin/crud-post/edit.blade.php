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
            <form class="form-horizontal" action="/admin/post/{{ $post->id }}" method="POST"
              enctype="multipart/form-data">
              @method('put')
              @csrf
              <div class="card-body">

                <div class="form-group row">
                  <label for="judul" class="col-sm-2 col-form-label">Judul</label>
                  <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6">
                    <input type="text" class="form-control" id="judul" name="judul" placeholder="Judul" required
                      value="{{ old('judul', $post->judul) }}">
                  </div>
                </div>

                <div class="form-group row mt-4">
                  <label for="deskripsi" class="col-sm-2 col-form-label">Deskripsi</label>
                  <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6" id="editor">
                    <textarea class="form-control" placeholder="Deskripsi..." name="deskripsi" id="deskripsi" cols="30"
                      rows="5">{{ old('deskripsi', $post->deskripsi) }}</textarea>
                  </div>
                </div>

                <div class="form-group row">
                  <label for="post" class="col-sm-2 col-form-label">Post</label>
                  <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6">
                    <select class="form-control" id="post" name="post"">
                        @if ($post->post == " Banner") <option value="Banner" selected>Banner</option>
                      <option value="Tentang">Tentang</option>
                      <option value="Anak">Anak</option>
                      <option value="Bumil">Ibu Hamil</option>
                      <option value="Peserta">Peserta</option>
                      @elseif ($post->post == "Tentang")
                      <option value="Banner">Banner</option>
                      <option value="Tentang" selected>Tentang</option>
                      <option value="Anak">Anak</option>
                      <option value="Bumil">Ibu Hamil</option>
                      <option value="Peserta">Peserta</option>
                      @elseif ($post->post == "Anak")
                      <option value="Banner">Banner</option>
                      <option value="Tentang">Tentang</option>
                      <option value="Anak" selected>Anak</option>
                      <option value="Bumil">Ibu Hamil</option>
                      <option value="Peserta">Peserta</option>
                      @elseif ($post->post == "Bumil")
                      <option value="Banner">Banner</option>
                      <option value="Tentang">Tentang</option>
                      <option value="Anak">Anak</option>
                      <option value="Bumil" selected>Ibu Hamil</option>
                      <option value="Peserta">Peserta</option>
                      @elseif ($post->post == "Peserta")
                      <option value="Banner">Banner</option>
                      <option value="Tentang">Tentang</option>
                      <option value="Anak">Anak</option>
                      <option value="Bumil">Ibu Hamil</option>
                      <option value="Peserta" selected>Peserta</option>
                      @endif
                    </select>
                  </div>
                </div>

                <div class="form-group row">
                  <label for="foto" class="col-sm-2 col-form-label">Foto</label>
                  <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6">
                    <div class="position-relative rounded-top" style="z-index: 1;">
                      <img class="img-fluid rounded-top w-100" src="{{ asset('storage/'. $post->foto) }}"
                        style="width: 19rem; height: 19rem;" alt="">
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
                <a href="/admin/post" class="btn btn-secondary">Kembali</a>
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
</script>

<script>
  ClassicEditor
      .create( document.querySelector( '#editor' ) )
      .then( editor => {
          console.log( editor );
      } )
      .catch( error => {
          console.error( error );
      } );
</script>
@endsection