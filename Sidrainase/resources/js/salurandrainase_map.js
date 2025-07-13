// Pastikan Leaflet, Leaflet.Editable, dan Leaflet.Draw sudah dimuat di app.js dan L tersedia secara global.

// Kode di sini akan dijalankan ketika initializeSaluranDrainaseMap() dipanggil dari app.js.
// Kita akan mengakses map dan kontrolnya dari window.map, window.editableFeatures, window.drawControl.

export function initializeSaluranDrainaseMap() {
    const map = window.map;
    const editableFeatures = window.editableFeatures;
    const drawControl = window.drawControl;

    // Initialize Editable
    const editable = new L.Editable(map);
    map.editTools = editable;

    let linePoints = [];
    let polyline = null;

    // Fungsi untuk menghapus polyline yang ada
    function removeExistingPolyline() {
        if (polyline) {
            map.removeLayer(polyline);
            editableFeatures.removeLayer(polyline);
            polyline = null;
            linePoints = [];
            document.getElementById("linestring").value = "";
        }
    }

    // Fungsi untuk update linestring input dalam format GeoJSON
    function updateLinestringInput() {
        if (polyline) {
            const latLngs = polyline.getLatLngs();
            const coordinates = latLngs.map(latlng => [latlng.lng, latlng.lat]);

            // Buat GeoJSON LineString
            const geoJson = {
                type: "LineString",
                coordinates: coordinates
            };

            document.getElementById("linestring").value = JSON.stringify(geoJson);
        }
    }

    // Jika ada data lama (untuk old input ketika validasi gagal)
    const oldLinestring = document.getElementById('linestring').value;
    if (oldLinestring) {
        try {
            const oldLine = JSON.parse(oldLinestring);
            if (oldLine.type === 'LineString' && Array.isArray(oldLine.coordinates)) {
                const latLngs = oldLine.coordinates.map(p => [p[1], p[0]]);
                if (L.LineUtil.isFlat(latLngs)) {
                    polyline = L.polyline(latLngs, {
                        color: "blue",
                        weight: 4
                    }).addTo(map);

                    // Enable editing for existing polyline
                    editableFeatures.addLayer(polyline);
                    polyline.enableEdit();
                }
            }
        } catch (e) {
            console.error("Invalid old linestring", e);
        }
    }

    // Event listener saat objek digambar
    map.on(L.Draw.Event.CREATED, function (e) {
        const type = e.layerType,
            layer = e.layer;

        if (type === 'polyline') {
            // Hapus polyline yang ada sebelum menambahkan yang baru
            removeExistingPolyline();

            polyline = layer;
            editableFeatures.addLayer(polyline);

            // Enable editing for new polyline
            polyline.enableEdit();

            updateLinestringInput();
        }
    });

    // Event listener untuk saat polyline diedit
    map.on('editable:editing', function (e) {
        if (e.layer === polyline) {
            updateLinestringInput();
        }
    });

    // Event listener untuk saat vertex ditambahkan/dihapus
    map.on('editable:vertex:new', function (e) {
        if (e.poly === polyline) {
            updateLinestringInput();
        }
    });

    map.on('editable:vertex:deleted', function (e) {
        if (e.poly === polyline) {
            updateLinestringInput();
        }
    });

    // Event listener saat objek dihapus
    map.on(L.Draw.Event.DELETED, function (e) {
        e.layers.eachLayer(function (layer) {
            if (layer === polyline) {
                removeExistingPolyline();
            }
        });
    });

    // Event listener untuk tombol reset
    document.getElementById("resetLine").addEventListener("click", function () {
        removeExistingPolyline();
        editableFeatures.clearLayers();
    });

    // Disable draw control jika sudah ada polyline
    function updateDrawControl() {
        if (polyline) {
            drawControl.setDrawingOptions({
                polyline: false
            });
        } else {
            drawControl.setDrawingOptions({
                polyline: {
                    shapeOptions: {
                        color: 'blue'
                    }
                }
            });
        }
    }

    // Update draw control saat polyline dibuat atau dihapus
    map.on('editable:editing', updateDrawControl);
    map.on(L.Draw.Event.CREATED, updateDrawControl);
    map.on(L.Draw.Event.DELETED, updateDrawControl);
} 