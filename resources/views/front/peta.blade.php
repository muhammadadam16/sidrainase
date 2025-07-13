<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>SiDrainase - Peta</title>
    <link rel="icon" href="{{ asset('enno/assets/img/logo1.png') }}" />
    <link href="https://fonts.googleapis.com/css2?family=Roboto&family=Raleway&family=Ubuntu&display=swap"
        rel="stylesheet" />
    <link href="{{ asset('enno/assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('enno/assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet" />
    <link href="{{ asset('enno/assets/css/main.css') }}" rel="stylesheet" />
    <link href="{{ asset('enno/assets/css/halaman.css') }}" rel="stylesheet" />
    <link href="{{ asset('enno/assets/css/menupeta.css') }}" rel="stylesheet" />
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />
    <link rel="stylesheet" href="https://unpkg.com/leaflet-search@3.0.2/dist/leaflet-search.min.css" />
    <style>
        .kontur-label {
            pointer-events: none;
            white-space: nowrap;
        }
    </style>
</head>

<body class="index-page">
    <header id="header" class="header d-flex align-items-center sticky-top">
        <div class="container-fluid container-xl position-relative d-flex align-items-center">
            <a href="{{ route('front.welcome') }}" class="logo d-flex align-items-center me-auto">
                <h1 class="sitename">SiDrainase</h1>
            </a>
            <nav id="navmenu" class="navmenu">
                <ul>
                    <li><a href="{{ route('front.welcome') }}">Beranda</a></li>
                    <li><a href="{{ route('peta') }}" class="active">Peta</a></li>
                    <li><a href="{{ route('tentangkami') }}">Tentang Kami</a></li>
                    <li><a href="{{ route('kontak') }}">Kontak</a></li>
                </ul>
                <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
            </nav>
            @auth
                <a class="btn-getstarted" href="{{ route('dashboard') }}">Dashboard</a>
            @else
                <a class="btn-getstarted" href="{{ route('login') }}">Login</a>
            @endauth
        </div>
    </header>

    <div id="map"></div>

    <!-- Sidebar Layer -->
    <div id="sidebar-layer">
        <h5>Layer Kontrol</h5>
        <label><input type="checkbox" id="layer-kota" checked> Batas Kota</label>
        <label><input type="checkbox" id="layer-saluran-kiri" checked> Saluran Kiri</label>
        <label><input type="checkbox" id="layer-saluran-kanan" checked> Saluran Kanan</label>
        <label><input type="checkbox" id="layer-sungai" checked> Sungai</label>
        <label><input type="checkbox" id="layer-kontur" checked> Kontur Elevasi</label>
    </div>

    <!-- Tombol Zoom -->
    <div id="custom-zoom">
        <button id="zoom-in">+</button>
        <button id="zoom-out">−</button>
        <button id="reset-view">⟳</button>
    </div>

    <!-- Leaflet JS -->
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>
    <script src="https://unpkg.com/leaflet-search@3.0.2/dist/leaflet-search.min.js"></script>

    <script>
        const map = L.map('map', {
            zoomControl: false
        }).setView([-6.898573308269457, 106.90911138695945], 15);

        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; OpenStreetMap contributors'
        }).addTo(map);

        const konturLabels = [];

        const saluranKiriLayer = L.geoJSON(null, {
            style: {
                color: 'blue',
                weight: 2
            },
            onEachFeature: function(feature, layer) {
                const props = feature.properties || {};
                const content = `
                    <div class="info">
                        <h4>Detail Saluran Drainase Kiri</h4>
                        <table class="table table-sm">
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

        const saluranKananLayer = L.geoJSON(null, {
            style: {
                color: 'orange',
                weight: 2
            },
            onEachFeature: function(feature, layer) {
                const props = feature.properties || {};
                const content = `
                    <div class="info">
                        <h4>Detail Saluran Drainase Kanan</h4>
                        <table class="table table-sm">
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

        const sungaiLayer = L.geoJSON(null, {
            style: {
                color: 'cyan',
                weight: 2
            }
        });

        const kotaLayer = L.geoJSON(null, {
            style: {
                color: 'black',
                fillColor: 'gray',
                fillOpacity: 0.2,
                weight: 1
            },
            interactive: false //INI YANG PENTING
        });


        const konturLayer = L.geoJSON(null, {
            style: function(feature) {
                return {
                    color: 'brown',
                    weight: 1,
                    opacity: 0.6
                };
            },
            onEachFeature: function(feature, layer) {
                const elev = feature.properties?.elev || feature.properties?.elevation || '-';
                layer.bindPopup(`Elevasi: ${elev} m`);

                function addLabel(coordinates) {
                    const midIndex = Math.floor(coordinates.length / 2);
                    const midPoint = coordinates[midIndex];
                    if (midPoint) {
                        const label = L.marker([midPoint[1], midPoint[0]], {
                            icon: L.divIcon({
                                className: 'kontur-label',
                                html: `<div style="font-size: 11px; color: brown; font-weight: bold;">${elev}</div>`,
                                iconSize: [30, 12],
                                iconAnchor: [15, 6]
                            }),
                            interactive: false
                        });
                        konturLabels.push(label);
                        label.addTo(map);
                    }
                }

                if (feature.geometry.type === "LineString") {
                    addLabel(feature.geometry.coordinates);
                } else if (feature.geometry.type === "MultiLineString") {
                    feature.geometry.coordinates.forEach(line => {
                        addLabel(line);
                    });
                }
            }
        });

        // Urutan tampil di peta (dari atas ke bawah)
        fetch('/geojson/kota.geojson')
            .then(res => res.json())
            .then(data => kotaLayer.addData(data).addTo(map).bringToFront());

        // Ambil data saluran drainase dari database
        fetch('/geojson/salurandrainase')
            .then(res => res.json())
            .then(data => {
                // Layer saluran kiri
                const kiriFeatures = data.features.map(f => ({
                    type: 'Feature',
                    geometry: f.geometry_kiri,
                    properties: f.properties
                })).filter(f => f.geometry && f.geometry.type === 'MultiLineString');
                saluranKiriLayer.addData({ type: 'FeatureCollection', features: kiriFeatures }).addTo(map);

                // Layer saluran kanan
                const kananFeatures = data.features.map(f => ({
                    type: 'Feature',
                    geometry: f.geometry_kanan,
                    properties: f.properties
                })).filter(f => f.geometry && f.geometry.type === 'MultiLineString');
                saluranKananLayer.addData({ type: 'FeatureCollection', features: kananFeatures }).addTo(map);
            });

        fetch('/geojson/sungai.geojson')
            .then(res => res.json())
            .then(data => sungaiLayer.addData(data).addTo(map).bringToBack());

        fetch('/geojson/clipkotasukabumi.geojson')
            .then(res => res.json())
            .then(data => konturLayer.addData(data).addTo(map).bringToBack());

        // Layer toggle
        document.getElementById('layer-saluran-kiri').addEventListener('change', function() {
            this.checked ? map.addLayer(saluranKiriLayer) : map.removeLayer(saluranKiriLayer);
        });
        document.getElementById('layer-saluran-kanan').addEventListener('change', function() {
            this.checked ? map.addLayer(saluranKananLayer) : map.removeLayer(saluranKananLayer);
        });
        document.getElementById('layer-sungai').addEventListener('change', function() {
            this.checked ? map.addLayer(sungaiLayer) : map.removeLayer(sungaiLayer);
        });
        document.getElementById('layer-kota').addEventListener('change', function() {
            this.checked ? map.addLayer(kotaLayer) : map.removeLayer(kotaLayer);
        });
        document.getElementById('layer-kontur').addEventListener('change', function() {
            if (this.checked) {
                map.addLayer(konturLayer);
                konturLabels.forEach(label => label.addTo(map));
            } else {
                map.removeLayer(konturLayer);
                konturLabels.forEach(label => map.removeLayer(label));
            }
        });

        // Zoom control
        document.getElementById('zoom-in').addEventListener('click', () => map.zoomIn());
        document.getElementById('zoom-out').addEventListener('click', () => map.zoomOut());
        document.getElementById('reset-view').addEventListener('click', () => {
            map.setView([-6.898573308269457, 106.90911138695945], 15);
        });
    </script>
</body>

</html>
