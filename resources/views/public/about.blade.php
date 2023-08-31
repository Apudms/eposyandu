@extends('public.layouts.main')

@section('container')
  <div class="container-fluid bg-primary py-5 mb-5">
    <div class="row py-3">
      <div class="col-12 text-center">
        <h1 class="display-3 text-white animated zoomIn">{{ $title }} Kami</h1>
        <a href="/" class="h4 text-white">Halaman Utama</a>
        <i class="far fa-circle text-white px-2"></i>
        <a href="" class="h4 text-white">{{ $title }}</a>
      </div>
    </div>
  </div>

  @if ($tentang->count())
    <div class="container-fluid bg-light py-5 wow fadeInUp" data-wow-delay="0.1s">
      <div class="container">
        <div class="row g-5">
          <div class="col-lg-12">
            <div class="position-relative h-100">
              <img class="w-100 h-100 rounded wow zoomIn" data-wow-delay="0.3s" src="{{ asset('storage/'. $tentang[0]->foto ) }}" style="object-fit: cover;" alt="{{ $tentang[0]->judul }}">
            </div>
          </div>
          <div class="col-lg-12">
            <div class="section-title mb-4">
              <h5 class="position-relative d-inline-block text-primary text-uppercase">Tentang Kami</h5>
              <h1 class="mb-4">{{ $tentang[0]->judul }}</h1>
              {{ $tentang[0]->deskripsi }}
            </div>
          </div>
        </div>
      </div>
    </div>
  @else
    <div class="container">
      <div class="row g-5">
        <div class="col-lg-12">
          <div class="section-title mb-4">
            <h3 class="mb-4">Tentang Posyandu</h3>
          </div>
        </div>
      </div>
    </div>
  @endif
@endsection

