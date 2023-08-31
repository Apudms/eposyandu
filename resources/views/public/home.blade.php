@extends('public.layouts.main')

@section('container')
<div class="container-fluid p-0">
	<div id="header-carousel" class="carousel slide carousel-fade" data-bs-ride="carousel">
		<div class="carousel-inner">
			@if ($posts->count())
				<div class="carousel-item active">
					<img class="w-100" src="{{ asset('storage/'. $posts[0]->foto) }}" alt="{{ $posts[0]->judul }}">
					<div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
						<div class="p-3" style="max-width: 900px;">
							<h5 class="display-4 text-white animated zoomIn">{{ $posts[0]->judul }}</h5>
						</div>
					</div>
				</div>
			@endif
			@foreach ($posts->skip(1) as $post)
				<div class="carousel-item">
					<img class="w-100" src="{{ asset('storage/'. $post->foto) }}" alt="{{ $post->judul }}">
					<div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
						<div class="p-3" style="max-width: 900px;">
							<h5 class="display-4 text-white animated zoomIn">{{ $post->judul }}</h5>
						</div>
					</div>
				</div>
			@endforeach
		</div>
		<button class="carousel-control-prev" type="button" data-bs-target="#header-carousel" data-bs-slide="prev">
			<span class="carousel-control-prev-icon" aria-hidden="true"></span>
			<span class="visually-hidden">Previous</span>
		</button>
		<button class="carousel-control-next" type="button" data-bs-target="#header-carousel" data-bs-slide="next">
			<span class="carousel-control-next-icon" aria-hidden="true"></span>
			<span class="visually-hidden">Next</span>
		</button>
	</div>
</div>

<div class="container-fluid bg-light py-5 wow fadeInUp" data-wow-delay="0.1s">
	<div class="container">
		<div class="row">
			<div class="col-lg-5">
				<div class="position-relative h-100">
					<img class="position-absolute w-100 h-100 rounded wow zoomIn" data-wow-delay="0.3s" src="{{ asset('storage/'. $tentang[0]->foto) }}" style="object-fit: cover;" alt="{{ $tentang[0]->judul }}">
				</div>
			</div>
			<div class="col-lg-7">
				<div class="section-title mb-4">
					<h5 class="position-relative d-inline-block text-primary text-uppercase">Tentang Kami</h5>
					<h1 class="mb-0">{{ $tentang[0]->judul }}</h1>
				</div>
				<div class="row g-3">
					<div class="col-sm-6 wow zoomIn" data-wow-delay="0.5s">
						<h5 class="mb-3"><i class="fa fa-check-circle text-primary me-3"></i>Data Anak</h5>
						<h5 class="mb-3"><i class="fa fa-check-circle text-primary me-3"></i>Data Imunisasi</h5>
					</div>
					<div class="col-sm-6 wow zoomIn" data-wow-delay="0.7s">
						<h5 class="mb-3"><i class="fa fa-check-circle text-primary me-3"></i>Data Ibu Hamil</h5>
						<h5 class="mb-3"><i class="fa fa-check-circle text-primary me-3"></i>Data Peserta KB</h5>
					</div>
				</div>
				<a href="/tentang" class="btn btn-primary py-3 px-5 mt-4 wow zoomIn" data-wow-delay="0.9s">Selengkapnya</a>
			</div>
		</div>
	</div>
</div>

<!-- Data Posyandu Start -->
<div class="container-fluid py-5 wow fadeInUp" data-wow-delay="0.3s">
	<div class="container">
		<div class="row g-5">
			<div class="col-lg-5">
				<div class="section-title mb-4">
					<h5 class="position-relative d-inline-block text-primary text-uppercase">Data Posyandu</h5>
					<h1 class="mb-0">Perhitungan Data Berdasarkan Jumlah Dalam Rentang Waktu 1 Bulan</h1>
				</div>
			</div>
			<div class="col-lg-7">
				<div class="owl-carousel price-carousel wow zoomIn" data-wow-delay="0.6s">
					<div class="price-item pb-4">
						<div class="position-relative">
							<img class="img-fluid rounded-top" src="{{ asset('storage/'. $anak[0]->foto) }}" style="width: 100%; height: 170px;" alt="{{ $anak[0]->judul }}">
							<div class="d-flex align-items-center justify-content-center bg-light rounded pt-2 px-3 position-absolute top-100 start-50 translate-middle" style="z-index: 2;">
								<h2 class="text-primary m-0">{{ $a->count() }}</h2>
							</div>
						</div>
						<div class="position-relative text-center bg-light border-bottom border-primary py-5 p-4">
							<h4>Data Anak</h4>
							<hr class="text-primary w-50 mx-auto mt-0">
							<a href="{{ route('public.data.anak') }}" class="btn btn-primary py-2 px-4 position-absolute top-100 start-50 translate-middle">Selengkapnya</a>
						</div>
					</div>
					<div class="price-item pb-4">
						<div class="position-relative">
							<img class="img-fluid rounded-top" src="{{ asset('storage/'. $bumil[0]->foto) }}" style="width: 100%; height: 170px;" alt="{{ $bumil[0]->judul }}">
							<div class="d-flex align-items-center justify-content-center bg-light rounded pt-2 px-3 position-absolute top-100 start-50 translate-middle" style="z-index: 2;">
								<h2 class="text-primary m-0">{{ $b->count() }}</h2>
							</div>
						</div>
						<div class="position-relative text-center bg-light border-bottom border-primary py-5 p-4">
							<h4>Data Ibu Hamil</h4>
							<hr class="text-primary w-50 mx-auto mt-0">
							<a href="{{ route('public.data.ibuhamil') }}" class="btn btn-primary py-2 px-4 position-absolute top-100 start-50 translate-middle">Selengkapnya</a>
						</div>
					</div>
					<div class="price-item pb-4">
						<div class="position-relative">
							<img class="img-fluid rounded-top" src="{{ asset('storage/'. $peserta[0]->foto) }}" style="width: 100%; height: 170px;" alt="{{ $peserta[0]->judul }}">
							<div class="d-flex align-items-center justify-content-center bg-light rounded pt-2 px-3 position-absolute top-100 start-50 translate-middle" style="z-index: 2;">
								<h2 class="text-primary m-0">{{ $p->count() }}</h2>
							</div>
						</div>
						<div class="position-relative text-center bg-light border-bottom border-primary py-5 p-4">
							<h4>Data Peserta KB</h4>
							<hr class="text-primary w-50 mx-auto mt-0">
							<a href="{{ route('public.data.pesertakb') }}" class="btn btn-primary py-2 px-4 position-absolute top-100 start-50 translate-middle">Selengkapnya</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- Data Posyandu End -->

@endsection