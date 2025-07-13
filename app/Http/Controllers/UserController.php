<?php
namespace App\Http\Controllers;

use App\Models\User;
use App\Exports\UserExport;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Facades\Excel;

class UserController extends Controller
{
    public function index()
    {
        $data = [
            'title'         => 'Data Pegawai',
            'menuAdminUser' => 'active',
            'user'          => User::orderBy('status', 'asc')->get(),
        ];
        return view('admin/user/index', $data);
    }
    public function create()
    {
        $data = [
            'title'         => 'Tambah Data Pegawai',
            'menuAdminUser' => 'active',
            'user'          => User::get(),
        ];
        return view('admin/user/create', $data);
    }
    public function store(Request $request)
    {
        $request->validate([
            'nama'     => 'required',
            'email'    => 'required|unique:users,email',
            'jabatan'  => 'required',
            'bidang'   => 'required',
            'status'   => 'required',
            'password' => 'required|confirmed|min:8',
        ], [
            'nama.required'      => 'Nama Harus Di Isi Tidak Boleh Kosong',
            'email.required'     => 'Email Harus Di Isi Tidak Boleh Kosong',
            'email.unique'       => 'Email Sudah Ada',
            'jabatan.required'   => 'Jabatan Harus Di Isi Tidak Boleh Kosong',
            'bidang.required'    => 'Bidang Harus Di Isi Tidak Boleh Kosong',
            'status.required'    => 'Status Harus Di Pilih',
            'password.required'  => 'Password Harus Di Isi Tidak Boleh Kosong',
            'password.confirmed' => 'Password Konfirmasi Tidak Sama',
            'password.min'       => 'Password minimal 8 karakter',
        ]);

        $user           = new user;
        $user->nama     = $request->nama;
        $user->email    = $request->email;
        $user->jabatan  = $request->jabatan;
        $user->bidang   = $request->bidang;
        $user->status   = $request->status;
        $user->password = Hash::make($request->$request);
        $user->save();

        return redirect()->route('pegawai')->with('success', 'Data Berhasil Ditambahkan');
    }
    public function edit($id)
    {
        $data = [
            'title'         => 'edit Data Pegawai',
            'menuAdminUser' => 'active',
            'user'          => User::findOrFail($id),
        ];
        return view('admin/user/edit', $data);
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama'     => 'required',
            'email'    => 'required|unique:users,email,' . $id,
            'jabatan'  => 'required',
            'bidang'   => 'required',
            'status'   => 'required',
            'password' => 'nullable|confirmed|min:8',
        ], [
            'nama.required'      => 'Nama Harus Di Isi Tidak Boleh Kosong',
            'email.required'     => 'Email Harus Di Isi Tidak Boleh Kosong',
            'email.unique'       => 'Email Sudah Ada',
            'jabatan.required'   => 'Jabatan Harus Di Isi Tidak Boleh Kosong',
            'bidang.required'    => 'Bidang Harus Di Isi Tidak Boleh Kosong',
            'status.required'    => 'Status Harus Di Pilih',
            'password.required'  => 'Password Harus Di Isi Tidak Boleh Kosong',
            'password.confirmed' => 'Password Konfirmasi Tidak Sama',
            'password.min'       => 'Password minimal 8 karakter',
        ]);

        $user          = user::findOrFail($id);
        $user->nama    = $request->nama;
        $user->email   = $request->email;
        $user->jabatan = $request->jabatan;
        $user->bidang  = $request->bidang;
        $user->status  = $request->status;
        if ($request->filled('password')) {
            $user->password = Hash::make($request->$request);
        }
        $user->save();

        return redirect()->route('pegawai')->with('success', 'Data Berhasil Di Edit');

    }
    public function destroy($id)
    {
        $user = user::findOrFail($id);
        $user->delete();

        return redirect()->route('pegawai')->with('success', 'Data Berhasil Di Hapus');
    }

    public function excel()
    {
        $filename = now()->format('d-m-Y');
        return Excel::download(new UserExport, 'DataPegawai_' . $filename . '.xlsx');
    }
    
    public function pdf(){
        $filename = now()->format('d-m-Y');
        $data = array(
            'user' => User::get(),
            'tanggal' => now()->format('d-m-Y'),
        );
        
         $pdf = Pdf::loadView('admin/user/pdf', $data);
         return $pdf->setPaper('a4', 'landscape')->stream('DataPegawai_' . $filename . '.pdf');
    }
}