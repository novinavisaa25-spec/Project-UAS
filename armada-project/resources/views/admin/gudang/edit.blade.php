@extends('layouts.admin')

@section('title', 'Edit Gudang')
@section('page-title', 'Edit Data Gudang')

@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Form Edit Gudang</h3>
    </div>
    <form action="{{ route('admin.gudang.update', $gudang) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="card-body">
            
            <div class="form-group">
                <label for="nama_gudang">Nama Gudang <span class="text-danger">*</span></label>
                <input type="text" class="form-control @error('nama_gudang') is-invalid @enderror" 
                       id="nama_gudang" name="nama_gudang" value="{{ old('nama_gudang', $gudang->nama_gudang) }}" 
                       placeholder="Contoh: Gudang Pusat Bandung">
                @error('nama_gudang')
                    <span class="invalid-feedback">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label for="alamat">Alamat Lengkap <span class="text-danger">*</span></label>
                <textarea class="form-control @error('alamat') is-invalid @enderror" 
                          id="alamat" name="alamat" rows="4" 
                          placeholder="Alamat lengkap gudang...">{{ old('alamat', $gudang->alamat) }}</textarea>
                @error('alamat')
                    <span class="invalid-feedback">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="kapasitas">Kapasitas (Unit) <span class="text-danger">*</span></label>
                    <input type="number" class="form-control @error('kapasitas') is-invalid @enderror" 
                           id="kapasitas" name="kapasitas" value="{{ old('kapasitas', $gudang->kapasitas) }}" 
                           placeholder="Contoh: 1000" min="0">
                    @error('kapasitas')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group col-md-6">
                    <label for="status">Status <span class="text-danger">*</span></label>
                    <select id="status" name="status" class="form-control @error('status') is-invalid @enderror">
                        <option value="aktif" {{ old('status', $gudang->status) == 'aktif' ? 'selected' : '' }}>Aktif</option>
                        <option value="tidak_aktif" {{ old('status', $gudang->status) == 'tidak_aktif' ? 'selected' : '' }}>Tidak Aktif</option>
                        <option value="penuh" {{ old('status', $gudang->status) == 'penuh' ? 'selected' : '' }}>Penuh</option>
                        <option value="maintenance" {{ old('status', $gudang->status) == 'maintenance' ? 'selected' : '' }}>Maintenance</option>
                    </select>
                    @error('status')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <div class="form-group">
                <label for="catatan">Catatan</label>
                <textarea class="form-control @error('catatan') is-invalid @enderror" id="catatan" name="catatan" rows="3">{{ old('catatan', $gudang->catatan) }}</textarea>
                @error('catatan')
                    <span class="invalid-feedback">{{ $message }}</span>
                @enderror
            </div>

        </div>
        <div class="card-footer">
            <button type="submit" class="btn btn-primary">
                <i class="fas fa-save"></i> Update
            </button>
            <a href="{{ route('admin.gudang.index') }}" class="btn btn-secondary">
                <i class="fas fa-arrow-left"></i> Kembali
            </a>
        </div>
    </form>
</div>
@endsection