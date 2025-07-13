import './bootstrap';
import L from 'leaflet';
import 'leaflet-draw';
import 'leaflet-editable';
import { initializeSaluranDrainaseMap } from './salurandrainase_map';

// Pastikan Leaflet dan pluginnya tersedia secara global
window.L = L;

// Inisialisasi Leaflet dan pluginnya setelah DOM siap
document.addEventListener("DOMContentLoaded", function () {
    console.log("DOM Content Loaded");
    const mapElement = document.getElementById("map");
    console.log("Map element:", mapElement);

    // Hanya inisialisasi peta jika elemen map ada DAN tidak memiliki atribut data-custom-map
    if (mapElement && !mapElement.dataset.customMap) {
        try {
            const map = L.map(mapElement).setView([-6.9218, 106.9274], 14);
            console.log("Map initialized:", map);

            L.tileLayer("https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png", {
                attribution: '&copy; OpenStreetMap contributors'
            }).addTo(map);

            const editableFeatures = new L.FeatureGroup();
            map.addLayer(editableFeatures);

            const drawControl = new L.Control.Draw({
                draw: {
                    polyline: {
                        shapeOptions: {
                            color: 'blue'
                        },
                    },
                    polygon: false,
                    rectangle: false,
                    circle: false,
                    marker: false,
                    circlemarker: false
                },
                edit: {
                    featureGroup: editableFeatures,
                    remove: true
                }
            });
            map.addControl(drawControl);

            // Tambahkan map dan kontrolnya ke window agar dapat diakses oleh salurandrainase_map.js
            window.map = map;
            window.editableFeatures = editableFeatures;
            window.drawControl = drawControl;

            // Panggil fungsi inisialisasi khusus untuk halaman salurandrainase
            initializeSaluranDrainaseMap();
        } catch (error) {
            console.error("Error initializing map:", error);
        }
    } else if (mapElement && mapElement.dataset.customMap) {
        console.log("Map initialization skipped for custom map element.");
    } else {
        console.error("Map element not found");
    }
});
