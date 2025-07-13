@extends('layouts/app')

@section('content')
    <h1 class="h3 mb-4 text-gray-800">
        <i class="bi bi-droplet"></i>
        {{ $title }}
    </h1>

    <div class="card">
        <div class="card-header py-3">
            <a href="{{ route('salurandrainase') }}" class="btn btn-sm btn-secondary">
                <i class="bi bi-skip-backward-fill"></i> Kembali
            </a>
        </div>
        <div class="card-body p-4">
            <form action="{{ route('salurandrainaseUpdate', $salurandrainase->id) }}" method="post">
                @csrf
                <div class="row mb-3">
                    <div class="col-xl-6 mb-3">
                        <label class="form-label"><span class="text-danger">*</span> Nama Ruas Jalan :</label>
                        <input type="text" name="nama_ruas_jalan"
                            class="form-control @error('nama_ruas_jalan') is-invalid @enderror"
                            value="{{ $salurandrainase->nama_ruas_jalan }}">
                        @error('nama_ruas_jalan')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="col-xl-6 mb-3">
                        <label class="form-label"><span class="text-danger">*</span> Jenis Drainase :</label>
                        <select name="jenis_drainase" class="form-control @error('jenis_drainase') is-invalid @enderror">
                            <option value="">-- Pilih Jenis --</option>
                            <option value="P.Batu" {{ $salurandrainase->jenis_drainase == 'P.Batu' ? 'selected' : '' }}>P.Batu</option>
                            <option value="P.Batu dan Buis Beton" {{ $salurandrainase->jenis_drainase == 'P.Batu dan Buis Beton' ? 'selected' : '' }}>P.Batu dan Buis Beton</option>
                            <option value="Buis Beton" {{ $salurandrainase->jenis_drainase == 'Buis Beton' ? 'selected' : '' }}>Buis Beton</option>
                            <option value="Gorong-gorong dan P.Batu" {{ $salurandrainase->jenis_drainase == 'Gorong-gorong dan P.Batu' ? 'selected' : '' }}>Gorong-gorong dan P.Batu</option>
                        </select>
                        @error('jenis_drainase')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-xl-6 mb-3">
                        <label class="form-label"><span class="text-danger">*</span> Panjang Kiri :</label>
                        <input type="text" name="panjang_kiri"
                            class="form-control @error('panjang_kiri') is-invalid @enderror"
                            value="{{ $salurandrainase->panjang_kiri }}">
                        @error('panjang_kiri')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="col-xl-6 mb-3">
                        <label class="form-label"><span class="text-danger">*</span> Lebar Kiri :</label>
                        <input type="text" name="lebar_kiri"
                            class="form-control @error('lebar_kiri') is-invalid @enderror"
                            value="{{ $salurandrainase->lebar_kiri }}">
                        @error('lebar_kiri')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="col-xl-6 mb-3">
                        <label class="form-label"><span class="text-danger">*</span> Panjang Kanan :</label>
                        <input type="text" name="panjang_kanan"
                            class="form-control @error('panjang_kanan') is-invalid @enderror"
                            value="{{ $salurandrainase->panjang_kanan }}">
                        @error('panjang_kanan')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="col-xl-6 mb-3">
                        <label class="form-label"><span class="text-danger">*</span> Lebar Kanan :</label>
                        <input type="text" name="lebar_kanan"
                            class="form-control @error('lebar_kanan') is-invalid @enderror"
                            value="{{ $salurandrainase->lebar_kanan }}">
                        @error('lebar_kanan')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="col-xl-6 mb-3">
                        <label class="form-label"><span class="text-danger">*</span> Tipe Drainase :</label>
                        <select name="tipe_drainase" class="form-control @error('tipe_drainase') is-invalid @enderror">
                            <option value="">-- Pilih Tipe --</option>
                            <option value="Terbuka & Tertutup" {{ $salurandrainase->tipe_drainase == 'Terbuka & Tertutup' ? 'selected' : '' }}>Terbuka & Tertutup</option>
                            <option value="Terbuka" {{ $salurandrainase->tipe_drainase == 'Terbuka' ? 'selected' : '' }}>Terbuka</option>
                            <option value="Tertutup" {{ $salurandrainase->tipe_drainase == 'Tertutup' ? 'selected' : '' }}>Tertutup</option>
                        </select>
                        @error('tipe_drainase')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="col-xl-6 mb-3">
                        <label class="form-label"><span class="text-danger">*</span> Kondisi Drainase :</label>
                        <select name="kondisi_drainase" class="form-control @error('kondisi_drainase') is-invalid @enderror">
                            <option value="">-- Pilih Kondisi --</option>
                            <option value="Baik" {{ $salurandrainase->kondisi_drainase == 'Baik' ? 'selected' : '' }}>Baik</option>
                            <option value="Rusak Ringan" {{ $salurandrainase->kondisi_drainase == 'Rusak Ringan' ? 'selected' : '' }}>Rusak Ringan</option>
                            <option value="Rusak Sedang" {{ $salurandrainase->kondisi_drainase == 'Rusak Sedang' ? 'selected' : '' }}>Rusak Sedang</option>
                            <option value="Rusak Berat" {{ $salurandrainase->kondisi_drainase == 'Rusak Berat' ? 'selected' : '' }}>Rusak Berat</option>
                        </select>
                        @error('kondisi_drainase')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>

                <div class="mb-3">
                    <small class="text-muted d-block mb-2">
                        Pilih mode gambar, lalu klik pada peta untuk menggambar garis saluran.
                        <span style="color:red;font-weight:bold">Merah</span>: LineString Kanan, <span style="color:green;font-weight:bold">Hijau</span>: LineString Kiri.
                    </small>
                    <button type="button" class="btn btn-sm btn-danger" id="modeKanan">Gambar LineString Kanan</button>
                    <button type="button" class="btn btn-sm btn-success" id="modeKiri">Gambar LineString Kiri</button>
                </div>

                <div id="map" style="height: 400px; width: 100%; margin-bottom: 1.5rem; border: 1px solid #ccc;"></div>
                
                <!-- Legend untuk membedakan data existing dan baru -->
                <div class="mt-2 mb-3">
                    <div class="d-flex flex-wrap gap-3">
                        <div class="d-flex align-items-center">
                            <div style="width: 20px; height: 3px; background-color: green; margin-right: 8px;"></div>
                            <small>Data Baru (Kiri)</small>
                        </div>
                        <div class="d-flex align-items-center">
                            <div style="width: 20px; height: 3px; background-color: red; margin-right: 8px;"></div>
                            <small>Data Baru (Kanan)</small>
                        </div>
                        <div class="d-flex align-items-center">
                            <div style="width: 20px; height: 2px; background-color: blue; opacity: 0.7; margin-right: 8px;"></div>
                            <small>Data Existing (Kiri) - Read Only</small>
                        </div>
                        <div class="d-flex align-items-center">
                            <div style="width: 20px; height: 2px; background-color: orange; opacity: 0.7; margin-right: 8px;"></div>
                            <small>Data Existing (Kanan) - Read Only</small>
                        </div>
                    </div>
                </div>

                <div class="mb-3 mt-3">
                    <label class="form-label"><span class="text-danger">*</span> Data LineString Kanan :</label>
                    <textarea id="linestring_kanan" name="linestring_kanan" class="form-control @error('linestring_kanan') is-invalid @enderror" rows="3">{{ $salurandrainase->linestring_kanan ?? '' }}</textarea>
                    @error('linestring_kanan')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="mb-3">
                    <label class="form-label"><span class="text-danger">*</span> Data LineString Kiri :</label>
                    <textarea id="linestring_kiri" name="linestring_kiri" class="form-control @error('linestring_kiri') is-invalid @enderror" rows="3">{{ $salurandrainase->linestring_kiri ?? '' }}</textarea>
                    @error('linestring_kiri')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="mt-4">
                    <button type="submit" class="btn btn-sm btn-info">
                        <i class="bi bi-floppy mr-2"></i> Simpan Perubahan
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection

@push('styles')
    @vite(['resources/css/app.css'])
    <!-- Leaflet CSS -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />
    <link rel="stylesheet" href="https://unpkg.com/leaflet-draw@1.0.4/dist/leaflet.draw.css" />
    <style>
        #map {
            height: 400px;
            width: 100%;
            border-radius: 4px;
            border: 1px solid #ccc;
        }
    </style>
@endpush

@push('scripts')
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>
    <script src="https://unpkg.com/leaflet-draw@1.0.4/dist/leaflet.draw.js"></script>
    @vite(['resources/js/app.js'])
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var map = L.map('map').setView([-6.898573308269457, 106.90911138695945], 15);
            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                attribution: '© OpenStreetMap contributors'
            }).addTo(map);

            var existingKananLayer = new L.FeatureGroup();
            var existingKiriLayer = new L.FeatureGroup();
            
            map.addLayer(existingKananLayer);
            map.addLayer(existingKiriLayer);

            var mode = null; // 'kanan' atau 'kiri'

            document.getElementById('modeKanan').addEventListener('click', function() {
                mode = 'kanan';
                this.classList.add('active');
                document.getElementById('modeKiri').classList.remove('active');
            });
            document.getElementById('modeKiri').addEventListener('click', function() {
                mode = 'kiri';
                this.classList.add('active');
                document.getElementById('modeKanan').classList.remove('active');
            });

            var editableLayer = new L.FeatureGroup();
            map.addLayer(editableLayer);

            // Ambil id record yang sedang diedit dari blade
            var currentId = {{ $salurandrainase->id }};
            // Load existing data from database
            fetch('/geojson/salurandrainase')
                .then(res => res.json())
                .then(data => {
                    data.features.forEach(feature => {
                        // Lewati garis milik record yang sedang diedit
                        if (feature.properties && feature.properties.id == currentId) return;
                        // KIRI
                        if (feature.geometry_kiri && feature.geometry_kiri.type === 'MultiLineString') {
                            var kiriFeature = {
                                type: 'Feature',
                                geometry: feature.geometry_kiri,
                                properties: feature.properties
                            };
                            var kiriLayer = L.geoJSON(kiriFeature, {
                                style: {
                                    color: 'blue',
                                    weight: 2,
                                    opacity: 0.7
                                },
                                onEachFeature: function(feature, layer) {
                                    const props = feature.properties || {};
                                    const content = `
                                        <div class=\"info\">
                                            <h4>Detail Saluran Drainase Kiri</h4>
                                            <table class=\"table table-sm\">
                                                <tr><td>Nama Ruas Jalan</td><td>${props.nama_ruas_jalan || '-'}</td></tr>
                                                <tr><td>Jenis Drainase</td><td>${props.jenis_drainase || '-'}</td></tr>
                                                <tr><td>Panjang Kiri</td><td>${props.panjang_kiri || '-'} m</td></tr>
                                                <tr><td>Lebar Kiri</td><td>${props.lebar_kiri || '-'} m</td></tr>
                                                <tr><td>Tipe Drainase</td><td>${props.tipe_drainase || '-'}</td></tr>
                                                <tr><td>Kondisi</td><td>${props.kondisi_drainase || '-'}</td></tr>
                                            </table>
                                        </div>`;
                                    layer.bindPopup(content);
                                }
                            });
                            existingKiriLayer.addLayer(kiriLayer);
                        }
                        // KANAN
                        if (feature.geometry_kanan && feature.geometry_kanan.type === 'MultiLineString') {
                            var kananFeature = {
                                type: 'Feature',
                                geometry: feature.geometry_kanan,
                                properties: feature.properties
                            };
                            var kananLayer = L.geoJSON(kananFeature, {
                                style: {
                                    color: 'orange',
                                    weight: 2,
                                    opacity: 0.7
                                },
                                onEachFeature: function(feature, layer) {
                                    const props = feature.properties || {};
                                    const content = `
                                        <div class=\"info\">
                                            <h4>Detail Saluran Drainase Kanan</h4>
                                            <table class=\"table table-sm\">
                                                <tr><td>Nama Ruas Jalan</td><td>${props.nama_ruas_jalan || '-'}</td></tr>
                                                <tr><td>Jenis Drainase</td><td>${props.jenis_drainase || '-'}</td></tr>
                                                <tr><td>Panjang Kanan</td><td>${props.panjang_kanan || '-'} m</td></tr>
                                                <tr><td>Lebar Kanan</td><td>${props.lebar_kanan || '-'} m</td></tr>
                                                <tr><td>Tipe Drainase</td><td>${props.tipe_drainase || '-'}</td></tr>
                                                <tr><td>Kondisi</td><td>${props.kondisi_drainase || '-'}</td></tr>
                                            </table>
                                        </div>`;
                                    layer.bindPopup(content);
                                }
                            });
                            existingKananLayer.addLayer(kananLayer);
                        }
                    });
                    
                    // Fit map to show all existing data
                    if (existingKananLayer.getLayers().length > 0 || existingKiriLayer.getLayers().length > 0) {
                        var allLayers = new L.FeatureGroup();
                        existingKananLayer.eachLayer(layer => allLayers.addLayer(layer));
                        existingKiriLayer.eachLayer(layer => allLayers.addLayer(layer));
                        // Jangan override fitToBounds jika sedang edit garis
                        // map.fitBounds(allLayers.getBounds());
                    }
                })
                .catch(error => {
                    console.error('Error loading existing data:', error);
                });

            // Load current record's linestrings for editing
            var fitToBounds = null;
            var editableKananLayer = null;
            var editableKiriLayer = null;
            var existingKanan = document.getElementById('linestring_kanan').value;
            if (existingKanan) {
                try {
                    var geojson = JSON.parse(existingKanan);
                    if (geojson.type === 'MultiLineString' && Array.isArray(geojson.coordinates) && geojson.coordinates.length > 0) {
                        var polylineCoords = geojson.coordinates[0].map(function(coord) {
                            return L.latLng(coord[1], coord[0]);
                        });
                        editableKananLayer = L.polyline(polylineCoords, {color: 'red', weight: 5, dashArray: '8,6'});
                        editableLayer.addLayer(editableKananLayer);
                        fitToBounds = editableKananLayer.getBounds();
                    }
                } catch (e) { console.error(e); }
            }
            var existingKiri = document.getElementById('linestring_kiri').value;
            if (existingKiri) {
                try {
                    var geojson = JSON.parse(existingKiri);
                    if (geojson.type === 'MultiLineString' && Array.isArray(geojson.coordinates) && geojson.coordinates.length > 0) {
                        var polylineCoords = geojson.coordinates[0].map(function(coord) {
                            return L.latLng(coord[1], coord[0]);
                        });
                        editableKiriLayer = L.polyline(polylineCoords, {color: 'green', weight: 5, dashArray: '8,6'});
                        editableLayer.addLayer(editableKiriLayer);
                        if (!fitToBounds) fitToBounds = editableKiriLayer.getBounds();
                    }
                } catch (e) { console.error(e); }
            }

            // Inisialisasi drawControl dengan shapeOptions statis
            var drawControl = new L.Control.Draw({
                edit: {
                    featureGroup: editableLayer,
                    remove: false
                },
                draw: {
                    polygon: false,
                    polyline: {
                        allowIntersection: false,
                        showLength: true,
                        shapeOptions: { color: 'red', weight: 5, dashArray: '8,6' }
                    },
                    rectangle: false,
                    circle: false,
                    marker: false,
                    circlemarker: false
                }
            });
            map.addControl(drawControl);

            // Pada event draw:created, set warna layer sesuai mode
            map.on('draw:created', function(e) {
                var layer = e.layer;
                var coords = layer.getLatLngs().map(function(latlng) {
                    return [latlng.lng, latlng.lat];
                });
                var linestring = {
                    type: "MultiLineString",
                    coordinates: [coords]
                };
                if (mode === 'kanan') {
                    // Hapus semua kanan lama
                    editableLayer.eachLayer(function(l) {
                        if (l.options && l.options.color === 'red') editableLayer.removeLayer(l);
                    });
                    layer.setStyle({ color: 'red', weight: 5, dashArray: '8,6' });
                    editableLayer.addLayer(layer);
                    document.getElementById('linestring_kanan').value = JSON.stringify(linestring);
                    var panjang = calculateLength(coords);
                    document.querySelector('input[name=\"panjang_kanan\"]').value = panjang.toFixed(2) + ' (M)';
                } else if (mode === 'kiri') {
                    // Hapus semua kiri lama
                    editableLayer.eachLayer(function(l) {
                        if (l.options && l.options.color === 'green') editableLayer.removeLayer(l);
                    });
                    layer.setStyle({ color: 'green', weight: 5, dashArray: '8,6' });
                    editableLayer.addLayer(layer);
                    document.getElementById('linestring_kiri').value = JSON.stringify(linestring);
                    var panjang = calculateLength(coords);
                    document.querySelector('input[name="panjang_kiri"]').value = panjang.toFixed(2) + ' (M)';
                }
            });

            // Event untuk hapus garis
            map.on('draw:deleted', function(e) {
                e.layers.eachLayer(function(layer) {
                    if (layer.options.color === 'red') {
                        document.getElementById('linestring_kanan').value = '';
                        document.querySelector('input[name="panjang_kanan"]').value = '';
                    } else if (layer.options.color === 'green') {
                        document.getElementById('linestring_kiri').value = '';
                        document.querySelector('input[name="panjang_kiri"]').value = '';
                    }
                });
            });

            // Event untuk mengedit garis
            map.on('draw:edited', function(e) {
                e.layers.eachLayer(function(layer) {
                    // Set style ulang agar warna, tebal, dashArray tetap konsisten
                    if (layer.options && layer.options.color === 'red') {
                        layer.setStyle({ color: 'red', weight: 5, dashArray: '8,6' });
                    } else if (layer.options && layer.options.color === 'green') {
                        layer.setStyle({ color: 'green', weight: 5, dashArray: '8,6' });
                    }
                    // Update textarea dan panjang
                    var coords = layer.getLatLngs().map(function(latlng) {
                        return [latlng.lng, latlng.lat];
                    });
                    var linestring = {
                        type: "MultiLineString",
                        coordinates: [coords]
                    };
                    if (layer.options.color === 'red') {
                        document.getElementById('linestring_kanan').value = JSON.stringify(linestring);
                        var panjang = calculateLength(coords);
                        document.querySelector('input[name="panjang_kanan"]').value = panjang.toFixed(2) + ' (M)';
                    } else if (layer.options.color === 'green') {
                        document.getElementById('linestring_kiri').value = JSON.stringify(linestring);
                        var panjang = calculateLength(coords);
                        document.querySelector('input[name="panjang_kiri"]').value = panjang.toFixed(2) + ' (M)';
                    }
                });
            });

            // Fungsi hitung panjang garis (dalam meter) dari array koordinat
            function calculateLength(coords) {
                var total = 0;
                for (var i = 1; i < coords.length; i++) {
                    var latlng1 = L.latLng(coords[i-1][1], coords[i-1][0]);
                    var latlng2 = L.latLng(coords[i][1], coords[i][0]);
                    total += latlng1.distanceTo(latlng2);
                }
                return total;
            }

            // Setelah existing data dimuat, jika ada linestring yang diedit, fit ke situ
            setTimeout(function() {
                if (fitToBounds) {
                    map.fitBounds(fitToBounds);
                }
            }, 500);
        });
    </script>
@endpush
