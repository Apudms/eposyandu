@extends('public.layouts.main')

@section('container')
	<!-- Hero Start -->
	<div class="container-fluid bg-primary py-5 mb-5">
		<div class="row py-3">
			<div class="col-12 text-center">
				<h1 class="display-3 text-white animated zoomIn">Petugas Kami</h1>
				<a href="" class="h4 text-white">Halaman Utama</a>
				<i class="far fa-circle text-white px-2"></i>
				<a href="" class="h4 text-white">Petugas</a>
			</div>
		</div>
	</div>
	<!-- Hero End -->

	<!-- Team Start -->
	<div class="container-fluid py-5">
		<div class="container">
			<div class="row g-5">
				@foreach ($ketua as $k)
					<div class="col-lg-4 wow slideInUp" data-wow-delay="0.3s">
						<div class="team-item">
							@if ($k->foto)
								<div class="position-relative rounded-top" style="z-index: 1;">
									<img class="img-fluid rounded-top w-100" src="{{ asset('storage/'. $k->foto) }}" style="width: 20rem; height: 20rem;"  alt="">
								</div>
							@else
								<div class="position-relative rounded-top" style="z-index: 1;">
									<img class="img-fluid rounded-top w-100" src="{{ asset('img') }}/user.png" style="width: 20rem; height: 20rem;"  alt="">
								</div>
							@endif
							<div class="team-text position-relative bg-light text-center rounded-bottom p-4 pt-5">
								<h4 class="mb-2">{{ $k->namaKader }}</h4>
								<h5 class="text-primary mb-2">{{ $k->jabatan }}</h5>
								<p class="text-primary mb-0">{{ $k->dusun->namaDusun }}</p>
							</div>
						</div>
					</div>
				@endforeach
				@foreach ($sekretaris as $k)
					<div class="col-lg-4 wow slideInUp" data-wow-delay="0.3s">
						<div class="team-item">
							@if ($k->foto)
								<div class="position-relative rounded-top" style="z-index: 1;">
									<img class="img-fluid rounded-top w-100" src="{{ asset('storage/'. $k->foto) }}" style="width: 20rem; height: 20rem;"  alt="">
								</div>
							@else
								<div class="position-relative rounded-top" style="z-index: 1;">
									<img class="img-fluid rounded-top w-100" src="{{ asset('img') }}/user.png" style="width: 20rem; height: 20rem;"  alt="">
								</div>
							@endif
							<div class="team-text position-relative bg-light text-center rounded-bottom p-4 pt-5">
								<h4 class="mb-2">{{ $k->namaKader }}</h4>
								<h5 class="text-primary mb-2">{{ $k->jabatan }}</h5>
								<p class="text-primary mb-0">{{ $k->dusun->namaDusun }}</p>
							</div>
						</div>
					</div>
				@endforeach
				@foreach ($bendahara as $k)
					<div class="col-lg-4 wow slideInUp" data-wow-delay="0.3s">
						<div class="team-item">
							@if ($k->foto)
								<div class="position-relative rounded-top" style="z-index: 1;">
									<img class="img-fluid rounded-top w-100" src="{{ asset('storage/'. $k->foto) }}" style="width: 20rem; height: 20rem;"  alt="">
								</div>
							@else
								<div class="position-relative rounded-top" style="z-index: 1;">
									<img class="img-fluid rounded-top w-100" src="{{ asset('img') }}/user.png" style="width: 20rem; height: 20rem;"  alt="">
								</div>
							@endif
							<div class="team-text position-relative bg-light text-center rounded-bottom p-4 pt-5">
								<h4 class="mb-2">{{ $k->namaKader }}</h4>
								<h5 class="text-primary mb-2">{{ $k->jabatan }}</h5>
								<p class="text-primary mb-0">{{ $k->dusun->namaDusun }}</p>
							</div>
						</div>
					</div>
				@endforeach
				@foreach ($anggota as $k)
					<div class="col-lg-4 wow slideInUp" data-wow-delay="0.3s">
						<div class="team-item">
							@if ($k->foto)
								<div class="position-relative rounded-top" style="z-index: 1;">
									<img class="img-fluid rounded-top w-100" src="{{ asset('storage/'. $k->foto) }}" style="width: 20rem; height: 20rem;"  alt="">
								</div>
							@else
								<div class="position-relative rounded-top" style="z-index: 1;">
									<img class="img-fluid rounded-top w-100" src="{{ asset('img') }}/user.png" style="width: 20rem; height: 20rem;"  alt="">
								</div>
							@endif
							<div class="team-text position-relative bg-light text-center rounded-bottom p-4 pt-5">
								<h4 class="mb-2">{{ $k->namaKader }}</h4>
								<h5 class="text-primary mb-2">{{ $k->jabatan }}</h5>
								<p class="text-primary mb-0">{{ $k->dusun->namaDusun }}</p>
							</div>
						</div>
					</div>
				@endforeach
			</div>
		</div>
	</div>
	<!-- Team End -->
@endsection