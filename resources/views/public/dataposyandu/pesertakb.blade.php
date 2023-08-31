@extends('public.layouts.main')

@section('container')
<div class="container-fluid bg-primary py-5 mb-4">
	<div class="row py-3">
		<div class="col-12 text-center">
			<h1 class="display-3 text-white animated zoomIn">Data {{ $title }}</h1>
			<a href="/" class="h4 text-white">Halaman Utama</a>
			<i class="far fa-circle text-white px-2"></i>
			<a href="" class="h4 text-white">Data Posyandu</a>
		</div>
	</div>
</div>

<div class="container-fluid bg-light mb-4 wow fadeInUp" data-wow-delay="0.1s" style="margin-top: 90px;">
	<div class="container">
		<div class="row gx-5">
			<div class="col-lg-6 py-2">
				<div class="py-5">
					<h1 class="mb-4">Perhitungan Data {{ $title }} Berdasarkan Jumlah Dalam Rentang Waktu 1 Bulan Yang Dikelompokan Berdasarkan Dusun</h1>
				</div>
			</div>
			<div class="col-lg-6">
				<div class="appointment-form h-100 d-flex flex-column justify-content-center text-center p-5 wow zoomIn" data-wow-delay="0.6s">
					<h4 class="mb-4">Lihat Data {{ $title }} Berdasarkan</h4>
					<form action="/data-peserta-kb">
						<div class="row g-3">
							<div class="col-12 col-sm-12">
								<select class="form-select bg-light border-0" style="height: 55px;" name="dusun">
									<option selected value="">Posyandu</option>
									@foreach ($dusun as $d)
										<option value="{{ $d->namaDusun }}">{{ $d->namaDusun }}</option>
									@endforeach
								</select>
							</div>
							<div class="col-12 col-sm-6">
								<select class="form-select bg-light border-0" style="height: 55px;" name="bulan">
									<option selected value="">Bulan</option>
									@foreach ($bulan as $b)
										<option value="{{ $loop->iteration }}">{{ $b->format('F') }}</option>
									@endforeach
								</select>
							</div>
							<div class="col-12 col-sm-6">
								<select class="form-select bg-light border-0" style="height: 55px;" name="tahun">
									<option selected value="">Tahun</option>
									<option value="2022">2022</option>
									<option value="2021">2021</option>
									<option value="2020">2020</option>
								</select>
							</div>
							<div class="col-12">
								<button class="btn btn-dark w-100 py-3" type="submit">Lihat</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>

@if (count($pkb))

<div class="container-fluid py-4 mb-4 wow fadeInUp" data-wow-delay="0.1s">
	<div class="container">
		<div class="row g-5">
			<div class="col-lg-12 wow zoomIn" data-wow-delay="0.3s">
				<div class="position-relative h-100">
					<div class="row mb-1">
						<div class="col" id="diagramPiePesertaKB"></div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<hr>
<div class="container-fluid py-4 mb-4 wow fadeInUp" data-wow-delay="0.1s">
	<div class="container">
		<div class="row g-5">
			<div class="col-lg-12 wow zoomIn" data-wow-delay="0.3s">
				<div class="position-relative h-100">
					<div class="row mb-1">
						<div class="col" id="diagramKolomPesertaKB"></div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

@else

<div class="container-fluid bg-light mb-4 mt-0 wow fadeInUp" data-wow-delay="0.1s" style="margin-top: 90px;">
	<div class="container">
		<div class="row gx-5">
			<div class="col-lg-12 py-2">
				<div class="py-4">
					<h5 class="mb-4 text-center">Tidak ada data {{ $title }} yang ditemukan.</h5>
				</div>
			</div>
		</div>
	</div>
</div>

@endif

@endsection

@section('diagram')
	<!-- Required chart.js -->
	<script src="https://code.highcharts.com/highcharts.js"></script>
	<script src="https://code.highcharts.com/highcharts-3d.js"></script>
	<script src="https://code.highcharts.com/modules/data.js"></script>
	<script src="https://code.highcharts.com/modules/drilldown.js"></script>
	<script src="https://code.highcharts.com/modules/exporting.js"></script>
	<script src="https://code.highcharts.com/modules/export-data.js"></script>
	<script src="https://code.highcharts.com/modules/accessibility.js"></script>

	<script>
		Highcharts.chart('diagramPiePesertaKB', {
			chart: {
				type: 'pie',
				options3d: {
					enabled: true,
					alpha: 45
				}
			},
			title: {
				text: '@if (request('dusun')) Data {{ $title }} {{ request('dusun') }} {{ request('bulan') }} {{ request('tahun') }} @else Data {{ $title }} @endif'
			},
			subtitle: {
				text: 'Sumber: <a href="">Posyandu Kampung Purworejo</a>'
			},
			plotOptions: {
				pie: {
					innerSize: 50,
					depth: 45
				}
			},
			series: [{
				name: 'Jumlah Pengguna',
				data: [
					['IUD', {{ $diagram['k1'] }}],
					['Suntik', {{ $diagram['k2'] }}],
					['Implan', {{ $diagram['k3'] }}],
					['Kondom', {{ $diagram['k4'] }}],
					['Vasektomi / Tubektomi', {{ $diagram['k5'] }}],
					['Spermisida', {{ $diagram['k6'] }}],
					['Diapragma', {{ $diagram['k7'] }}],
					['Cervical Cap', {{ $diagram['k8'] }}],
					['Kalender', {{ $diagram['k9'] }}]
				]
			}]
		});
	</script>

	<script>
		Highcharts.chart('diagramKolomPesertaKB', {
			chart: {
					type: 'column'
			},
			title: {
				text: "@if (request('tahun')) Data {{ $title }} {{ request('dusun') }} {{ request('tahun') }} @else Data {{ $title }} @endif"
			},
			subtitle: {
					text: 'Sumber: <a href="">Posyandu Kampung Purworejo</a>'
			},
			accessibility: {
					announceNewData: {
							enabled: true
					}
			},
			xAxis: {
					type: 'category'
			},
			yAxis: {
					title: {
							text: 'Jumlah {{ $title }} Terdaftar'
					}

			},
			legend: {
					enabled: false
			},
			plotOptions: {
					series: {
							borderWidth: 0,
							dataLabels: {
									enabled: true,
									format: '{point.y:f}'
							}
					}
			},

			tooltip: {
					headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
					pointFormat: '<span style="color:{point.color}">{point.name}</span>: <b> Total {point.y:f} Pengguna</b><br/>'
			},

			series: [
					{
							name: "Jumlah Pengguna",
							colorByPoint: true,
							data: [
									{
											name: "IUD",
											y: {{ $diagram['k1'] }},
									},
									{
											name: "Suntik",
											y: {{ $diagram['k2'] }},
									},
									{
											name: "Implan",
											y: {{ $diagram['k3'] }},
									},
									{
											name: "Kondom",
											y: {{ $diagram['k4'] }},
									},
									{
											name: "Vasektomi / Tubektomi",
											y: {{ $diagram['k5'] }},
									},
									{
											name: "Spermisida",
											y: {{ $diagram['k6'] }},
									},
									{
											name: "Diapragma",
											y: {{ $diagram['k7'] }},
									},
									{
											name: "Cervical Cap",
											y: {{ $diagram['k8'] }},
									},
									{
											name: "Kalender",
											y: {{ $diagram['k9'] }},
									}
							]
					}
			],
		});
	</script>

@endsection