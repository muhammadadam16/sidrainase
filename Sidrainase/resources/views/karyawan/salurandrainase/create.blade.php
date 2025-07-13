@extends('layouts/app')

@section('content')
    <h1 class="h3 mb-4 text-gray-800">
        <i class="bi bi-droplet"></i>
        {{ $title }}
    </h1>

    <div class="card">
        <div class="card-header">
            <a href="{{ route('salurandrainase') }}" class="btn btn-sm btn-secondary">
                <i class="bi bi-skip-backward-fill"></i>
                Kembali</a>
        </div>
        <div class="card-body">
            <form action="{{ route('salurandrainaseStore') }}" method="post">
                @csrf
                <div class="row mb-2">
                    <div class="col-xl-6 mb-1">
                        <label class="form-label">
                            <span class="text-danger">*</span>
                            Nama Ruas Jalan :
                        </label>
                        <input type="text" name="nama_ruas_jalan"
                            class="form-control @error('nama_ruas_jalan') is-invalid @enderror"
                            value="{{ old('nama_ruas_jalan') }}">
                        @error('nama_ruas_jalan')
                            <small class="text-danger">
                                {{ $message }}
                            </small>
                        @enderror
                    </div>
                    <div class="col-xl-6 mb-1">
                        <label class="form-label">
                            <span class="text-danger">*</span>
                            Jenis Drainase :
                        </label>
                        <input type="jenis_drainase" name="jenis_drainase"
                            class="form-control  @error('jenis_drainase') is-invalid @enderror"
                            value="{{ old('jenis_drainase') }}">
                        @error('jenis_drainase')
                            <small class="text-danger">
                                {{ $message }}
                            </small>
                        @enderror
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-6 mb-1">
                        <label class="form-label">
                            <span class="text-danger">*</span>
                            Panjang Kiri :
                        </label>
                        <input type="panjang_kiri" name="panjang_kiri"
                            class="form-control @error('panjang_kiri') is-invalid @enderror"
                            value="{{ old('panjang_kiri') }}">
                        @error('panjang_kiri')
                            <small class="text-danger">
                                {{ $message }}
                            </small>
                        @enderror
                    </div>
                    <div class="col-xl-6 mb-1">
                        <label class="form-label">
                            <span class="text-danger">*</span>
                            Lebar Kiri :
                        </label>
                        <input type="lebar_kiri" name="lebar_kiri"
                            class="form-control @error('lebar_kiri') is-invalid @enderror" value="{{ old('lebar_kiri') }}">
                        @error('lebar_kiri')
                            <small class="text-danger">
                                {{ $message }}
                            </small>
                        @enderror
                    </div>
                    <div class="col-xl-6 mb-1">
                        <label class="form-label">
                            <span class="text-danger">*</span>
                            Panjang Kanan :
                        </label>
                        <input type="panjang_kanan" name="panjang_kanan"
                            class="form-control @error('panjang_kanan') is-invalid @enderror"
                            value="{{ old('panjang_kanan') }}">
                        @error('panjang_kanan')
                            <small class="text-danger">
                                {{ $message }}
                            </small>
                        @enderror
                    </div>
                    <div class="col-xl-6 mb-1">
                        <label class="form-label">
                            <span class="text-danger">*</span>
                            Lebar Kanan :
                        </label>
                        <input type="lebar_kanan" name="lebar_kanan"
                            class="form-control @error('lebar_kanan') is-invalid @enderror"
                            value="{{ old('lebar_kanan') }}">
                        @error('lebar_kanan')
                            <small class="text-danger">
                                {{ $message }}
                            </small>
                        @enderror
                    </div>
                    <div class="col-xl-6 mb-1">
                        <label class="form-label">
                            <span class="text-danger">*</span>
                            Tipe Drainase :
                        </label>
                        <input type="tipe_drainase" name="tipe_drainase"
                            class="form-control @error('tipe_drainase') is-invalid @enderror"
                            value="{{ old('tipe_drainase') }}">
                        @error('tipe_drainase')
                            <small class="text-danger">
                                {{ $message }}
                            </small>
                        @enderror
                    </div>
                    <div class="col-xl-6 mb-1">
                        <label class="form-label">
                            <span class="text-danger">*</span>
                            Kondisi Drainase :
                        </label>
                        <input type="kondisi_drainase" name="kondisi_drainase"
                            class="form-control @error('kondisi_drainase') is-invalid @enderror"
                            value="{{ old('kondisi_drainase') }}">
                        @error('kondisi_drainase')
                            <small class="text-danger">
                                {{ $message }}
                            </small>
                        @enderror
                    </div>
                </div>
                <div>
                    <button type="submit" class="btn btn-sm btn-info">
                        <i class="bi bi-floppy mr-2">Simpan</i>
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
