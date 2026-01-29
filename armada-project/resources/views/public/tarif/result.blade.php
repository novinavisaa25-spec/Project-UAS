@extends('layouts.public')

@section('title', 'Hasil Perhitungan Ongkir')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card shadow">
            <div class="card-body">
                <h1 class="text-center mb-4">
                    <i class="fas fa-calculator text-success"></i> Hasil Perhitungan Ongkir
                </h1>

                <div class="alert alert-success mt-4">
                    <h4 class="alert-heading">
                        <i class="fas fa-check-circle"></i> Hasil Perhitungan
                    </h4>
                    <hr>
                    <div class="row">
                        <div class="col-md-6">
                            <p><strong>Layanan:</strong><br>{{ $tarif->nama_layanan }}</p>
                        </div>
                        <div class="col-md-6">
                            <p><strong>Rute:</strong><br>{{ $rute->nama_rute }} ({{ $rute->jarak_km }} Km)</p>
                        </div>
                    </div>
                    <hr>
                    <h3 class="text-center mb-0">
                        <strong>Total Ongkir:</strong><br>
                        <span class="text-success">Rp {{ number_format($total, 0, ',', '.') }}</span>
                    </h3>
                </div>

                <a href="{{ route('public.tarif.index') }}" class="btn btn-secondary">
                    <i class="fas fa-arrow-left"></i> Kembali
                </a>

            </div>
        </div>
    </div>
</div>
@endsection