<!-- Modal Delete -->
<div class="modal fade" id="modalSaluranDrainaseDestroy{{ $item->id }}" tabindex="-1"
    aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header bg-danger text-white">
                <h5 class="modal-title" id="exampleModalLabel"> Hapus {{ $title }} ?</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" class="text-white">&times;</span>
                </button>
            </div>
            <div class="modal-body text-left">
                <div class="row">
                    <div class="col-6">
                        Nama Ruas Jalan
                    </div>
                    <div class="col-6">
                        : {{ $item->nama_ruas_jalan }}
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        Jenis Drainase
                    </div>
                    <div class="col-6">
                        : {{ $item->jenis_drainase }}
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        Panjang Kiri
                    </div>
                    <div class="col-6">
                        : {{ $item->panjang_kiri }}
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        Lebar Kiri
                    </div>
                    <div class="col-6">
                        : {{ $item->lebar_kiri }}
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        Panjang Kanan
                    </div>
                    <div class="col-6">
                        : {{ $item->panjang_kanan }}
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        Lebar Kanan
                    </div>
                    <div class="col-6">
                        : {{ $item->lebar_kanan }}
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        Tipe Drainase
                    </div>
                    <div class="col-6">
                        : {{ $item->tipe_drainase }}
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        Kondisi Drainase
                    </div>
                    <div class="col-6">
                        : {{ $item->kondisi_drainase }}
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">
                    <i class="bi bi-x-lg"></i>
                    Tutup
                </button>
                <form action="{{ route('salurandrainaseDestroy', $item->id) }}" method="post">
                    @csrf
                    @method('delete')
                    <button type="submit" class="btn btn-primary btn-sm">
                        <i class="bi bi-trash3"></i>
                        Hapus
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Modal Show -->
<div class="modal fade" id="modalSaluranDrainaseShow{{ $item->id }}" tabindex="-1"
    aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header bg-info text-white">
                <h5 class="modal-title" id="exampleModalLabel"> Detail Data Saluran Drainase {{ $title }} ?</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" class="text-white">&times;</span>
                </button>
            </div>
            <div class="modal-body text-left">
                <div class="row">
                    <div class="col-6">
                        Nama Ruas Jalan
                    </div>
                    <div class="col-6">
                        : {{ $item->nama_ruas_jalan }}
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        Jenis Drainase
                    </div>
                    <div class="col-6">
                        : {{ $item->jenis_drainase }}
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        Panjang Kiri
                    </div>
                    <div class="col-6">
                        : {{ $item->panjang_kiri }}
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        Lebar Kiri
                    </div>
                    <div class="col-6">
                        : {{ $item->lebar_kiri }}
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        Panjang Kanan
                    </div>
                    <div class="col-6">
                        : {{ $item->panjang_kanan }}
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        Lebar Kanan
                    </div>
                    <div class="col-6">
                        : {{ $item->lebar_kanan }}
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        Tipe Drainase
                    </div>
                    <div class="col-6">
                        : {{ $item->tipe_drainase }}
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        Kondisi Drainase
                    </div>
                    <div class="col-6">
                        : {{ $item->kondisi_drainase }}
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">
                    <i class="bi bi-x-lg"></i>
                    Tutup
                </button>
                <form action="{{ route('pegawaiDestroy', $item->id) }}" method="post">
                    @csrf
                    @method('delete')
                    <button type="submit" class="btn btn-primary btn-sm">
                        <i class="bi bi-trash3"></i>
                        Hapus
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
