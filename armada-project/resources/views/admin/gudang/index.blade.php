@extends('layouts.admin')

@section('title', 'Manajemen Gudang')
@section('page-title', 'Manajemen Gudang')

@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Data Gudang</h3>
        <div class="card-tools">
            <a href="{{ route('admin.gudang.create') }}" class="btn btn-primary">
                <i class="fas fa-plus"></i> Tambah Gudang
            </a>
        </div>
    </div>
    <div class="card-body">
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Gudang</th>
                    <th>Alamat</th>
                    <th>Kapasitas</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($gudangs as $key => $gudang)
                <tr>
                    <td>{{ $key + 1 }}</td>
                    <td>{{ $gudang->nama_gudang }}</td>
                    <td>{{ $gudang->alamat }}</td>
                    <td>{{ number_format($gudang->kapasitas) }} unit</td>
                    <td>{{ ucfirst(str_replace('_', ' ', $gudang->status)) }}</td>
                    <td>
                        <a href="{{ route('admin.gudang.show', $gudang) }}" class="btn btn-info btn-sm">
                            <i class="fas fa-eye"></i> View
                        </a>
                        <a href="{{ route('admin.gudang.edit', $gudang) }}" class="btn btn-warning btn-sm">
                            <i class="fas fa-edit"></i> Edit
                        </a>
                        <form action="{{ route('admin.gudang.destroy', $gudang) }}" method="POST" style="display:inline;" 
                              onsubmit="return confirm('Yakin ingin menghapus?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">
                                <i class="fas fa-trash"></i> Delete
                            </button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" class="text-center">Belum ada data gudang</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection