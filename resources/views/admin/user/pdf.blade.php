<h1 align="center">Data Pegawai</h1>
<h2 align="center">Tanggal : {{$tanggal}}</h2>
<table width="100%" border="1px" style="border-collapse: collapse">
    <thead>
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
