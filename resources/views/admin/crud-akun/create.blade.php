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
              <form class="form-horizontal" action="/admin/data-admin" method="POST">
                @csrf
                <div class="card-body">

                  <div class="form-group row">
                    <label for="name" class="col-sm-2 col-form-label">Nama Admin</label>
                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6">
                      <input type="text" class="form-control" id="name" name="name" placeholder="Nama Admin" required value="{{ old('name') }}">
                    </div>
                  </div>

                  <div class="form-group row">
                    <label for="email" class="col-sm-2 col-form-label">Email</label>
                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6">
                      <input type="email" class="form-control" id="email" name="email" placeholder="Email" required value="{{ old('email') }}">
                    </div>
                  </div>

                  <div class="form-group row">
                    <label for="role" class="col-sm-2 col-form-label">Level</label>
                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6">
                      <select class="form-control" id="role" name="role">
                        @foreach ($admin as $a)
                          @if ($a->role !== 'admin')
                            <option value="{{ $a->role }}">{{ $a->role }}</option>
                          @endif
                        @endforeach
                      </select>
                    </div>
                  </div>

                  <div class="form-group row">
                    <label for="password" class="col-sm-2 col-form-label">Password</label>
                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6">
                      <input type="password" class="form-control" id="password" name="password" placeholder="Password" required value="{{ old('password') }}">
                    </div>
                  </div>

                </div>
                <div class="card-footer">
                  <a href="/admin/data-admin" class="btn btn-secondary">Kembali</a>
                  <button type="submit" class="btn btn-success float-right">Tambah</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>

@endsection
