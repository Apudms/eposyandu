<?php

namespace App\Http\Controllers;

use App\Models\Anak;
use App\Models\Dusun;
use App\Models\IbuHamil;
use App\Models\PesertaKB;
use Carbon\Carbon;
use Carbon\CarbonPeriod;

class DataPublicController extends Controller
{
	public function index()
	{
		$startMonth = Carbon::now()->startOfYear()->format('M');
		$endMonth = Carbon::now()->endOfYear()->format('M');
		$monthRange = CarbonPeriod::create($startMonth, '1 month', $endMonth);

		$to = Carbon::now();
		$a = Carbon::now()->subMonth(6);
		$b = Carbon::now()->subMonth(11);
		$c = Carbon::now()->subMonth(23);
		$d = Carbon::now()->subMonth(59);

		return view('public.dataposyandu.anak', [
			'title' => 'Anak',
			'anaks' => Anak::all(),
			'dusun' => Dusun::all(),
			'diagram' => [
				'u1' => Anak::latest()->dusun(request(['dusun', 'bulan', 'tahun']))->select('*')->whereBetween('tanggalLahir', [$a, $to])->count(),
				'u2' => Anak::latest()->dusun(request(['dusun', 'bulan', 'tahun']))->select('*')->whereBetween('tanggalLahir', [$b, $a])->count(),
				'u3' => Anak::latest()->dusun(request(['dusun', 'bulan', 'tahun']))->select('*')->whereBetween('tanggalLahir', [$c, $b])->count(),
				'u4' => Anak::latest()->dusun(request(['dusun', 'bulan', 'tahun']))->select('*')->whereBetween('tanggalLahir', [$d, $c])->count(),
			],
			'bulan' => $monthRange,
		]);
	}

	public function ibuhamil()
	{
		$startMonth = Carbon::now()->startOfYear()->format('M');
		$endMonth = Carbon::now()->endOfYear()->format('M');
		$monthRange = CarbonPeriod::create($startMonth, '1 month', $endMonth);

		$a = Carbon::now()->subMonth(2);
		$b = Carbon::now()->subMonth(3);
		$c = Carbon::now()->subMonth(5);
		$d = Carbon::now()->subMonth(7);
		$e = Carbon::now()->subMonth(9);
		$f = Carbon::now()->subMonth(9)->subWeek(3);
		// dd(IbuHamil::select('*')->whereBetween('tanggalDaftar', [$f, $e])->get()->toArray());
		return view('public.dataposyandu.ibuhamil', [
			'title' => 'Ibu Hamil',
			'bumils' => IbuHamil::all(),
			'dusun' => Dusun::all(),
			'diagram' => [
				'uk1' => IbuHamil::latest()->dusun(request(['dusun', 'bulan', 'tahun']))->select('*')->whereBetween('tanggalDaftar', [$b, $a])->count(),
				'uk2' => IbuHamil::latest()->dusun(request(['dusun', 'bulan', 'tahun']))->select('*')->whereBetween('tanggalDaftar', [$c, $b])->count(),
				'uk3' => IbuHamil::latest()->dusun(request(['dusun', 'bulan', 'tahun']))->select('*')->whereBetween('tanggalDaftar', [$d, $c])->count(),
				'uk4' => IbuHamil::latest()->dusun(request(['dusun', 'bulan', 'tahun']))->select('*')->whereBetween('tanggalDaftar', [$e, $d])->count(),
				'uk5' => IbuHamil::latest()->dusun(request(['dusun', 'bulan', 'tahun']))->select('*')->whereBetween('tanggalDaftar', [$f, $e])->count(),
			],
			'bulan' => $monthRange,
		]);
	}

	public function pesertakb()
	{
		$startMonth = Carbon::now()->startOfYear()->format('M');
		$endMonth = Carbon::now()->endOfYear()->format('M');
		$monthRange = CarbonPeriod::create($startMonth, '1 month', $endMonth);

		return view('public.dataposyandu.pesertakb', [
			'title' => 'Peserta KB',
			'pkb' => PesertaKB::all(),
			'dusun' => Dusun::all(),
			'diagram' => [
				'k1' => PesertaKB::latest()->dusun(request(['dusun', 'bulan', 'tahun']))->where('kontrasepsi_id', 1)->count(),
				'k2' => PesertaKB::latest()->dusun(request(['dusun', 'bulan', 'tahun']))->where('kontrasepsi_id', 2)->count(),
				'k3' => PesertaKB::latest()->dusun(request(['dusun', 'bulan', 'tahun']))->where('kontrasepsi_id', 3)->count(),
				'k4' => PesertaKB::latest()->dusun(request(['dusun', 'bulan', 'tahun']))->where('kontrasepsi_id', 4)->count(),
				'k5' => PesertaKB::latest()->dusun(request(['dusun', 'bulan', 'tahun']))->where('kontrasepsi_id', 5)->count(),
				'k6' => PesertaKB::latest()->dusun(request(['dusun', 'bulan', 'tahun']))->where('kontrasepsi_id', 6)->count(),
				'k7' => PesertaKB::latest()->dusun(request(['dusun', 'bulan', 'tahun']))->where('kontrasepsi_id', 7)->count(),
				'k8' => PesertaKB::latest()->dusun(request(['dusun', 'bulan', 'tahun']))->where('kontrasepsi_id', 8)->count(),
				'k9' => PesertaKB::latest()->dusun(request(['dusun', 'bulan', 'tahun']))->where('kontrasepsi_id', 9)->count(),
			],
			'bulan' => $monthRange,
		]);
	}
}
