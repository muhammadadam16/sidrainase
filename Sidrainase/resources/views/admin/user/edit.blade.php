@extends('layouts/app')

@section('content')
    <h1 class="h3 mb-4 text-gray-800">
        <i class="bi bi-pencil-square"></i>
        {{ $title }}
    </h1>

    <div class="card">
        <div class="card-header bg-primary">
            <a href="{{ route('pegawai') }}" class="btn btn-sm btn-secondary">
                <i class="bi bi-skip-backward-fill"></i>
                Kembali</a>
        </div>
        <div class="card-body">
            <form action="{{ route('pegawaiUpdate', $user->id) }}" method="post">
                @csrf
                <div class="row mb-2">
                    <div class="col-xl-6 mb-1">
                        <label class="form-label">
                            <span class="text-danger">*</span>
                            Nama :
                        </label>
                        <input type="text" name="nama" class="form-control @error('nama') is-invalid @enderror"
                            value="{{ $user->nama }}">
                        @error('nama')
                            <small class="text-danger">
                                {{ $message }}
                            </small>
                        @enderror
                    </div>
                    <div class="col-xl-6 mb-1">
                        <label class="form-label">
                            <span class="text-danger">*</span>
                            Email :
                        </label>
                        <input type="email" name="email" class="form-control  @error('email') is-invalid @enderror"
                            value="{{ $user->email }}">
                        @error('email')
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
                            Jabatan :
                        </label>
                        <input type="text" name="jabatan" class="form-control @error('jabatan') is-invalid @enderror"
                            value="{{ $user->jabatan }}">
                        @error('jabatan')
                            <small class="text-danger">
                                {{ $message }}
                            </small>
                        @enderror
                    </div>
                    <div class="col-xl-6 mb-1">
                        <label class="form-label">
                            <span class="text-danger">*</span>
                            Bidang :
                        </label>
                        <input type="text" name="bidang" class="form-control @error('bidang') is-invalid @enderror"
                            value="{{ $user->bidang }}">
                        @error('bidang')
                            <small class="text-danger">
                                {{ $message }}
                            </small>
                        @enderror
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-12 mb-1">
                        <label class="form-label">
                            <span class="text-danger">*</span>
                            Status :
                        </label>
                        <select name="status" class="form-control @error('status') is-invalid @enderror">
                            <option selected disabled>--pilih status--</option>
                            <option value="Admin"{{ $user->status == 'Admin' ? 'selected' : '' }}>Admin</option>
                            <option value="Karyawan"{{ $user->status == 'Karyawan' ? 'selected' : '' }}>Karyawan</option>
                        </select>
                        @error('status')
                            <small class="text-danger">
                                {{ $message }}
                            </small>
                        @enderror
                    </div>
                    <div class="col-xl-6 mb-1">
                        <label class="form-label">
                            <span class="text-danger">*</span>
                            Password :
                        </label>
                        <input type="password" name="password" class="form-control @error('password') is-invalid @enderror">
                        @error('password')
                            <small class="text-danger">
                                {{ $message }}
                            </small>
                        @enderror
                    </div>
                    <div class="col-xl-6 mb-1">
                        <label class="form-label">
                            <span class="text-danger">*</span>
                            Password Konfirmasi :
                        </label>
                        <input type="password" name="password_confirmation" class="form-control">
                    </div>
                </div>

                <div>
                    <button type="submit" class="btn btn-sm btn-primary">
                        <i class="bi bi-pencil-fill mr-2"></i>Edit Simpan</i>
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
