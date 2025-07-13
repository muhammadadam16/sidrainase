<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\salurandrainase;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\SaluranDrainaseExport;

class SaluranDrainaseController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $data = [
            'title' => 'Data Saluran Drainase',
            $user->status === 'Admin' ? 'menuAdminSaluranDrainase' : 'menuKaryawanSaluranDrainase' => 'active',
            'salurandrainase' => salurandrainase::all(),
        ];

        $view = $user->status === 'Admin' 
            ? 'admin/salurandrainase/index' 
            : 'karyawan/salurandrainase/index';

        return view($view, $data);
    }

    public function create()
    {
        $data = [
            'title' => 'Tambah Data Saluran Drainase',
            'menuAdminSaluranDrainase' => 'active',
        ];
        return view('admin/salurandrainase/create', $data);
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_ruas_jalan' => 'required',
            'jenis_drainase' => 'required',
            'panjang_kiri' => 'required',
            'lebar_kiri' => 'required',
            'panjang_kanan' => 'required',
            'lebar_kanan' => 'required',
            'tipe_drainase' => 'required',
            'kondisi_drainase' => 'required',
            'linestring_kiri' => 'nullable|json',
            'linestring_kanan' => 'nullable|json',
        ]);

        $salurandrainase = new salurandrainase();
        $salurandrainase->nama_ruas_jalan = $request->nama_ruas_jalan;
        $salurandrainase->jenis_drainase = $request->jenis_drainase;
        $salurandrainase->panjang_kiri = $request->panjang_kiri;
        $salurandrainase->lebar_kiri = $request->lebar_kiri;
        $salurandrainase->panjang_kanan = $request->panjang_kanan;
        $salurandrainase->lebar_kanan = $request->lebar_kanan;
        $salurandrainase->tipe_drainase = $request->tipe_drainase;
        $salurandrainase->kondisi_drainase = $request->kondisi_drainase;

        if ($request->filled('linestring_kiri')) {
            $linestringKiri = json_decode($request->linestring_kiri);
            if ($linestringKiri && $linestringKiri->type === 'MultiLineString' && is_array($linestringKiri->coordinates)) {
                foreach ($linestringKiri->coordinates as $line) {
                    foreach ($line as $coord) {
                        if (!is_array($coord) || count($coord) !== 2 || !is_numeric($coord[0]) || !is_numeric($coord[1])) {
                            abort(400, 'Koordinat kiri tidak valid');
                        }
                    }
                }
                $salurandrainase->linestring_kiri = json_encode($linestringKiri);
            } else {
                abort(400, 'Format GeoJSON kiri tidak valid');
            }
        }
        if ($request->filled('linestring_kanan')) {
            $linestringKanan = json_decode($request->linestring_kanan);
            if ($linestringKanan && $linestringKanan->type === 'MultiLineString' && is_array($linestringKanan->coordinates)) {
                foreach ($linestringKanan->coordinates as $line) {
                    foreach ($line as $coord) {
                        if (!is_array($coord) || count($coord) !== 2 || !is_numeric($coord[0]) || !is_numeric($coord[1])) {
                            abort(400, 'Koordinat kanan tidak valid');
                        }
                    }
                }
                $salurandrainase->linestring_kanan = json_encode($linestringKanan);
            } else {
                abort(400, 'Format GeoJSON kanan tidak valid');
            }
        }

        $salurandrainase->save();

        return redirect()->route('salurandrainase')->with('success', 'Data Berhasil Ditambahkan');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_ruas_jalan' => 'required',
            'jenis_drainase' => 'required',
            'panjang_kiri' => 'required',
            'lebar_kiri' => 'required',
            'panjang_kanan' => 'required',
            'lebar_kanan' => 'required',
            'tipe_drainase' => 'required',
            'kondisi_drainase' => 'required',
            'linestring_kiri' => 'nullable|json',
            'linestring_kanan' => 'nullable|json',
        ]);

        $salurandrainase = salurandrainase::findOrFail($id);
        $salurandrainase->nama_ruas_jalan = $request->nama_ruas_jalan;
        $salurandrainase->jenis_drainase = $request->jenis_drainase;
        $salurandrainase->panjang_kiri = $request->panjang_kiri;
        $salurandrainase->lebar_kiri = $request->lebar_kiri;
        $salurandrainase->panjang_kanan = $request->panjang_kanan;
        $salurandrainase->lebar_kanan = $request->lebar_kanan;
        $salurandrainase->tipe_drainase = $request->tipe_drainase;
        $salurandrainase->kondisi_drainase = $request->kondisi_drainase;

        if ($request->filled('linestring_kiri')) {
            $linestringKiri = json_decode($request->linestring_kiri);
            if ($linestringKiri && $linestringKiri->type === 'MultiLineString' && is_array($linestringKiri->coordinates)) {
                foreach ($linestringKiri->coordinates as $line) {
                    foreach ($line as $coord) {
                        if (!is_array($coord) || count($coord) !== 2 || !is_numeric($coord[0]) || !is_numeric($coord[1])) {
                            abort(400, 'Koordinat kiri tidak valid');
                        }
                    }
                }
                $salurandrainase->linestring_kiri = json_encode($linestringKiri);
            } else {
                abort(400, 'Format GeoJSON kiri tidak valid');
            }
        } else {
            $salurandrainase->linestring_kiri = null;
        }
        if ($request->filled('linestring_kanan')) {
            $linestringKanan = json_decode($request->linestring_kanan);
            if ($linestringKanan && $linestringKanan->type === 'MultiLineString' && is_array($linestringKanan->coordinates)) {
                foreach ($linestringKanan->coordinates as $line) {
                    foreach ($line as $coord) {
                        if (!is_array($coord) || count($coord) !== 2 || !is_numeric($coord[0]) || !is_numeric($coord[1])) {
                            abort(400, 'Koordinat kanan tidak valid');
                        }
                    }
                }
                $salurandrainase->linestring_kanan = json_encode($linestringKanan);
            } else {
                abort(400, 'Format GeoJSON kanan tidak valid');
            }
        } else {
            $salurandrainase->linestring_kanan = null;
        }

        $salurandrainase->save();

        return redirect()->route('salurandrainase')->with('success', 'Data Berhasil Di Edit');
    }

    public function destroy($id)
    {
        $salurandrainase = salurandrainase::findOrFail($id);
        $salurandrainase->delete();

        return redirect()->route('salurandrainase')->with('success', 'Data Berhasil Di Hapus');
    }

    public function excel()
    {
        $filename = now()->format('d-m-Y');
        return Excel::download(new SaluranDrainaseExport, 'DataSaluranDrainase_' . $filename . '.xlsx');
    }

    public function pdf()
    {
        $filename = now()->format('d-m-Y');
        $data = [
            'salurandrainase' => salurandrainase::all(),
            'tanggal' => $filename,
        ];

        $pdf = Pdf::loadView('admin/salurandrainase/pdf', $data);
        return $pdf->setPaper('a4', 'landscape')->stream('DataSaluranDrainase_' . $filename . '.pdf');
    }

    // ✅ Tambahan: Endpoint GeoJSON untuk ditampilkan di peta Leaflet
    public function geojson()
    {
        $salurandrainase = salurandrainase::all();
        $features = [];
        foreach ($salurandrainase as $saluran) {
            $geometry_kiri = null;
            $geometry_kanan = null;
            if ($saluran->linestring_kiri) {
                $geometry_kiri = is_string($saluran->linestring_kiri) ? json_decode($saluran->linestring_kiri) : $saluran->linestring_kiri;
            }
            if ($saluran->linestring_kanan) {
                $geometry_kanan = is_string($saluran->linestring_kanan) ? json_decode($saluran->linestring_kanan) : $saluran->linestring_kanan;
            }
            $features[] = [
                'type' => 'Feature',
                'geometry_kiri' => $geometry_kiri,
                'geometry_kanan' => $geometry_kanan,
                'properties' => [
                    'id' => $saluran->id,
                    'nama_ruas_jalan' => $saluran->nama_ruas_jalan,
                    'jenis_drainase' => $saluran->jenis_drainase,
                    'panjang_kiri' => $saluran->panjang_kiri,
                    'lebar_kiri' => $saluran->lebar_kiri,
                    'panjang_kanan' => $saluran->panjang_kanan,
                    'lebar_kanan' => $saluran->lebar_kanan,
                    'tipe_drainase' => $saluran->tipe_drainase,
                    'kondisi_drainase' => $saluran->kondisi_drainase
                ]
            ];
        }
        return response()->json([
            'type' => 'FeatureCollection',
            'features' => $features
        ]);
    }

    public function edit($id)
    {
        $data = [
            'title' => 'Edit Data Saluran Drainase',
            'menuAdminSaluranDrainase' => 'active',
            'salurandrainase' => salurandrainase::findOrFail($id),
        ];
        return view('admin/salurandrainase/update', $data);
    }
}