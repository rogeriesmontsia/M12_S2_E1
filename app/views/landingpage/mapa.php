<!doctype html>
<html lang="en">
  <head>
  <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />
    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>

  </head>
  <body>
  <div id="map" style="height: 400px;"></div>

  </body>
  <!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Mapa de España</title>
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />
    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>
</head>
<body>
    <div id="map" style="height: 600px;"></div>

    <script>
    // Datos de las ecocomunidades por comunidad autónoma (puedes obtenerlos de GeoAPI)
    var ecocomunidadesData = {
        // ... (datos de ecocomunidades)
    };

    // Datos GeoJSON de las comunidades autónomas de España (obtenidos de GeoAPI)
    var geojsonData = {
        "type": "FeatureCollection",
        "features": [
            // Datos GeoJSON de comunidades autónomas obtenidos de GeoAPI
        ]
    };

    var map = L.map('map').setView([40.416775, -3.703790], 6); // Centro en España

    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors',
    }).addTo(map);

    var geojsonLayer = L.geoJSON(geojsonData, {
        onEachFeature: function (feature, layer) {
            // Definir acciones al hacer clic en una comunidad autónoma
            layer.on('click', function (e) {
                var comunidad = e.target.feature.properties.name;
                var ecocomunidades = ecocomunidadesData[comunidad] || [];

                var popupContent = "<strong>" + comunidad + "</strong><br><ul>";
                ecocomunidades.forEach(function (ecocomunidad) {
                    popupContent += "<li>" + ecocomunidad + "</li>";
                });
                popupContent += "</ul>";

                L.popup()
                    .setLatLng(e.latlng)
                    .setContent(popupContent)
                    .openOn(map);
            });
        }
    }).addTo(map);
    </script>
</body>
</html>
