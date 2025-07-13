<h1 align="center">Data Saluran Drainase</h1>
<h2 align="center">Tanggal : {{ $tanggal }}</h2>
<table width="100%" border="1px" style="border-collapse: collapse">
    <thead>
        <tr>
            <th width="25" align="center">No</th>
            <th width="25" align="center">Nama Ruas Jalan</th>
            <th width="25" align="center">Jenis Drainase</th>
            <th width="25" align="center">Panjang Kiri</th>
            <th width="25" align="center">Lebar Kiri</th>
            <th width="25" align="center">Panjang Kanan</th>
            <th width="25" align="center">Lebar Kanan</th>
            <th width="25" align="center">Tipe Drainase</th>
            <th width="25" align="center">Kondisi Drainase</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($salurandrainase as $item)
            <tr>
                <td align="center">{{ $loop->iteration }}</td>
                <td align="center">{{ $item->nama_ruas_jalan }}</td>
                <td align="center">{{ $item->jenis_drainase }}</td>
                <td align="center">{{ $item->panjang_kiri }}</td>
                <td align="center">{{ $item->lebar_kiri }}</td>
                <td align="center">{{ $item->panjang_kanan }}</td>
                <td align="center">{{ $item->lebar_kanan }}</td>
                <td align="center">{{ $item->tipe_drainase }}</td>
                <td align="center">{{ $item->kondisi_drainase }}</td>
        @endforeach
        </tr>
    </tbody>
</table>
