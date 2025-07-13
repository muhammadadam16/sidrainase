@extends('layouts/app')

@section('content')
    <h1 class="h3 mb-4 text-gray-800">
        <i class="bi bi-person-add"></i>
        {{ $title }}
    </h1>

    <div class="card">
        <div class="card-header d-flex flex-wrap justify-content-center justify-content-xl-between">
            <div class="mb-1 mr-2">
                <a href="{{ route('pegawaiCreate') }}" class="btn btn-sm btn-primary">
                    <i class="bi bi-plus-lg"></i>
                    Tambah Data Pegawai</a>
            </div>
            <div>
                <a href="{{ route('pegawaiExcel') }}" class="btn btn-sm btn-success">
                    <i class="bi bi-file-earmark-excel"></i>
                    Excel</a>
                <a href="{{ route('pegawaiPdf') }}" class="btn btn-sm btn-danger" target='_blank'>
                    <i class="bi bi-file-earmark-pdf-fill"></i>
                    PDF</a>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
                    <thead class="bg-dark text-white">
                        <tr class="text-center">
                            <th>No</th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>Jabatan</th>
                            <th>Bidang</th>
                            <th>Status</th>
                            <th>
                                <i class="bi bi-gear"></i>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($user as $item)
                            <tr>
                                <td class="text-center">{{ $loop->iteration }}</td>
                                <td>{{ $item->nama }}</td>
                                <td class="text-center">
                                    <span class="badge badge-primary">{{ $item->email }}</span>
                                </td>
                                <td>{{ $item->jabatan }}</td>
                                <td>{{ $item->bidang }}</td>
                                <td class="text-center">
                                    @if ($item->status == 'Admin')
                                        <span class="badge badge-light">
                                            {{ $item->status }}
                                        </span>
                                    @else
                                        <span class="badge badge-dark">
                                            {{ $item->status }}
                                        </span>
                                    @endif
                                </td>
                                <td class="text-center">
                                    <a href="{{ route('pegawaiEdit', $item->id) }}" class="btn btn-sm btn-warning">
                                        <i class="bi bi-pencil-square"></i>
                                    </a>
                                    <button class="btn btn-sm btn-danger" data-toggle="modal"
                                        data-target="#hapus{{ $item->id }}">
                                        <i class="bi bi-trash"></i>
                                    </button>
                                    @include('admin/user/modal')
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
