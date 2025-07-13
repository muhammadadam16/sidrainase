<table>
    <thead>
        <tr>
            <th colspan="5" align="center">Data Pegawai</th>
        </tr>
         <tr>
            <th colspan="5" align="center">
                Di Cetak Tanggal : {{$tanggal}}
            </th>
        </tr>
        <tr>
            <th width="20" align="center">No</th>
            <th width="20" align="center">Nama</th>
            <th width="20" align="center">Email</th>
            <th width="20" align="center">Jabatan</th>
            <th width="20" align="center">Bidang</th>
            <th width="20" align="center">Status</th>
        </tr>
    </thead>
    <tbody>
@foreach ($user as $item)
<tr>
    <td align="center">{{ $loop->iteration}}</td>
    <td align="center">{{ $item->nama}}</td>
    <td>{{ $item->email}}</td>
    <td align="center">{{ $item->jabatan}}</td>
    <td align="center">{{ $item->bidang}}</td>
    <td align="center">{{ $item->status}}</td>
@endforeach
</tr>
    </tbody>
</table>
