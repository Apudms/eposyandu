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
          <div class="col-12">
            <div class="card">

              @if (session()->has('success'))
                <div class="alert alert-success alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <h5><i class="icon fas fa-check"></i> Berhasil!</h5>
                  {{ session('success') }}
                </div>
              @endif
  
              <div class="card-header row">
                <a href="/admin/ibu-hamil/create" class="btn btn-success d-flex justify-content-start">Tambah {{ $title }}</a>
                <form action="/admin/ibu-hamil" class="col d-flex justify-content-end">
                  <div class="input-group" style="width: 150px;">
                    <input type="text" name="cari" class="form-control" placeholder="Cari..." value="{{ request('cari') }}">
                      <button type="submit" class="btn btn-default">
                        <i class="fas fa-search"></i>
                      </button>
                  </div>
                </form>
              </div>
              <div class="card-body table-responsive p-0">
                @if ($bumils->count())
                <table class="table table-hover text-nowrap">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>ID Bumil</th>
                      <th>Nama Bumil</th>
                      <th>Tanggal Daftar</th>
                      <th>Posyandu</th>
                      <th class="text-center">Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($bumils as $a)
                    <tr>
                      <td>{{ ($bumils->currentPage() - 1) * $bumils->perPage() + $loop->iteration }}</td>
                      <td>{{ $a->ibuHamil_id }}</td>
                      <td>{{ $a->namaIbuHamil }}</td>
                      <td>{{ $a->tanggalDaftar }}</td>
                      <td>{{ $a->dusun->namaDusun }}</td>
                      <td class="text-center">
                        <a href="/admin/ibu-hamil/{{ $a->id }}" class="text-secondary"><i class="fas fa-eye"></i></a>
                        <a href="/admin/ibu-hamil/{{ $a->id }}/edit" class="text-primary m-2"><i class="fas fa-edit"></i></a>
                        <form action="/admin/ibu-hamil/{{ $a->id }}" method="post" class="d-inline">
                          @method('delete')
                          @csrf
                          <button class="badge btn-none bg-light border-0" onclick="return confirm('Yakin ingin menghapus data?')"><i class="fas fa-trash text-danger"></i></button>
                        </form>
                      </td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
                @else
                <table class="table table-hover text-nowrap">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>ID Bumil</th>
                      <th>Nama Bumil</th>
                      <th>Tanggal Daftar</th>
                      <th>Posyandu</th>
                      <th class="text-center">Aksi</th>
                    </tr>
                  </thead>
                </table>
                <span class="h5 d-flex m-3 justify-content-center text-danger">*Tidak Ada Data Yang Ditemukan.</span>
                @endif
              </div>
            </div>
          </div>
        </div>
        <div class="d-flex justify-content-end">
          {{ $bumils->links() }}
        </div>
      </div>
    </section>
  </div>
@endsection

