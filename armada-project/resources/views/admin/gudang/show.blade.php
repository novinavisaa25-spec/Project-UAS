@extends('layouts.admin')

@section('title', 'Detail Gudang')
@section('page-title', 'Detail Gudang')

@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Detail Gudang - {{ $gudang->nama_gudang }}</h3>
        <div class="card-tools">
            <a href="{{ route('admin.gudang.index') }}" class="btn btn-secondary btn-sm"><i class="fas fa-arrow-left"></i> Kembali</a>
            <a href="{{ route('admin.gudang.edit', $gudang) }}" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i> Edit</a>
        </div>
    </div>
    <div class="card-body">
        <table class="table table-striped">
            <tr><th>Nama Gudang</th><td>{{ $gudang->nama_gudang }}</td></tr>
            <tr><th>Alamat</th><td>{{ $gudang->alamat }}</td></tr>
            <tr><th>Kapasitas</th><td>{{ number_format($gudang->kapasitas) }} unit</td></tr>
            <tr><th>Status</th><td>{{ ucfirst(str_replace('_', ' ', $gudang->status)) }}</td></tr>
            <tr><th>Catatan</th><td>{{ $gudang->catatan ?? '-' }}</td></tr>
        </table>
    </div>
    <div class="card-footer">
        <form action="{{ route('admin.gudang.destroy', $gudang) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus gudang ini?')" style="display:inline;">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger"><i class="fas fa-trash"></i> Hapus</button>
        </form>
    </div>
</div>
@endsection
