@extends('layouts/app')

@section('content')
    <h1 class="h3 mb-4 text-gray-800">
        <i class="bi bi-droplet-half"></i>
        {{ $title }}
    </h1>

    <div class="card">
        <div class="card-header d-flex flex-wrap justify-content-center justify-content-xl-between">
            <div class="mb-1 mr-2">
                <a href="{{ route('salurandrainaseCreate') }}" class="btn btn-sm btn-primary">
                    <i class="bi bi-plus-lg"></i>
                    Tambah Data Saluran Drainase</a>
            </div>
            <div>
                <a href="{{ route('salurandrainaseExcel') }}" class="btn btn-sm btn-success">
                    <i class="bi bi-file-earmark-excel"></i>
                    Excel</a>
                <a href="{{ route('salurandrainasePdf') }}" class="btn btn-sm btn-danger" target='_blank'>
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
                            <th>Nama Ruas Jalan</th>
                            <th>Jenis Drainase</th>
                            <th>Panjang Kiri</th>
                            <th>Lebar Kiri</th>
                            <th>Panjang Kanan</th>
                            <th>Lebar Kanan</th>
                            <th>Tipe Drainase</th>
                            <th>Kondisi Drainase</th>
                            <th>
                                <i class="bi bi-gear"></i>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($salurandrainase as $item)
                            <tr>
                                <td class="text-center">{{ $loop->iteration }}</td>
                                <td>{{ $item->nama_ruas_jalan }}</td>
                                <td>{{ $item->jenis_drainase }}</td>
                                <td>{{ $item->panjang_kiri }}</td>
                                <td>{{ $item->lebar_kiri }}</td>
                                <td>{{ $item->panjang_kanan }}</td>
                                <td>{{ $item->lebar_kanan }}</td>
                                <td>{{ $item->tipe_drainase }}</td>
                                <td>{{ $item->kondisi_drainase }}</td>

                                <td class="text-center">
                                    <button class="btn btn-sm btn-info" data-toggle="modal"
                                        data-target="#modalSaluranDrainaseShow{{ $item->id }}">
                                        <i class="bi bi-eye-fill"></i>
                                    </button>
                                    <a href="{{ route('salurandrainaseEdit', $item->id) }}" class="btn btn-sm btn-warning">
                                        <i class="bi bi-pencil-square"></i>
                                    </a>
                                    <button class="btn btn-sm btn-danger" data-toggle="modal"
                                        data-target="#modalSaluranDrainaseDestroy{{ $item->id }}">
                                        <i class="bi bi-trash"></i>
                                    </button>
                                    @include('admin/salurandrainase/modal')
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
