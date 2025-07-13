<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\salurandrainase;

class ImportSaluranDrainase extends Command
{
    protected $signature = 'import:salurandrainase {kanan} {kiri}';
    protected $description = 'Import saluran drainase data from two GeoJSON files (kanan & kiri)';

    public function handle()
    {
        $fileKanan = $this->argument('kanan');
        $fileKiri = $this->argument('kiri');

        if (!file_exists($fileKanan)) {
            $this->error("File not found: {$fileKanan}");
            return 1;
        }
        if (!file_exists($fileKiri)) {
            $this->error("File not found: {$fileKiri}");
            return 1;
        }

        $geojsonKanan = json_decode(file_get_contents($fileKanan), true);
        $geojsonKiri = json_decode(file_get_contents($fileKiri), true);

        if (json_last_error() !== JSON_ERROR_NONE) {
            $this->error('Invalid JSON file');
            return 1;
        }

        if (!isset($geojsonKanan['features']) || !is_array($geojsonKanan['features'])) {
            $this->error('Invalid GeoJSON format: missing features array (kanan)');
            return 1;
        }
        if (!isset($geojsonKiri['features']) || !is_array($geojsonKiri['features'])) {
            $this->error('Invalid GeoJSON format: missing features array (kiri)');
            return 1;
        }

        $count = 0;
        $featuresKanan = $geojsonKanan['features'];
        $featuresKiri = $geojsonKiri['features'];
        $total = min(count($featuresKanan), count($featuresKiri));

        for ($i = 0; $i < $total; $i++) {
            $featureKanan = $featuresKanan[$i];
            $featureKiri = $featuresKiri[$i];
            try {
                $data = [
                    'nama_ruas_jalan' => $featureKanan['properties']['nama_ruas_jalan'] ?? null,
                    'jenis_drainase' => $featureKanan['properties']['jenis_drainase'] ?? null,
                    'panjang_kiri' => $featureKiri['properties']['panjang_kiri'] ?? null,
                    'lebar_kiri' => $featureKiri['properties']['lebar_kiri'] ?? null,
                    'panjang_kanan' => $featureKanan['properties']['panjang_kanan'] ?? null,
                    'lebar_kanan' => $featureKanan['properties']['lebar_kanan'] ?? null,
                    'tipe_drainase' => $featureKanan['properties']['tipe_drainase'] ?? null,
                    'kondisi_drainase' => $featureKanan['properties']['kondisi_drainase'] ?? null,
                    'linestring_kiri' => json_encode($featureKiri['geometry']),
                    'linestring_kanan' => json_encode($featureKanan['geometry']),
                ];

                $salurandrainase = new salurandrainase();
                $salurandrainase->fill($data);
                $salurandrainase->save();
                $count++;
                $this->info("Imported: {$data['nama_ruas_jalan']}");
            } catch (\Exception $e) {
                $this->error("Error importing {$featureKanan['properties']['nama_ruas_jalan']}: {$e->getMessage()}");
            }
        }

        $this->info("Successfully imported {$count} records");
        return 0;
    }
} 