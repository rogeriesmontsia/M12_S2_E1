// Crea un mapa y configura la vista inicial
const map = L.map('map').setView([40.416775, -3.703790], 6);

// Agrega una capa de mapa base desde un CDN
L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
    maxZoom: 19,
}).addTo(map);

// Escucha clics en el mapa
map.on('click', (e) => {
    // Obtiene las coordenadas del clic
    const latlng = e.latlng;

    // Consulta GeoAPI.es para obtener la información de la comunidad y localidades
    fetch('http://apiv1.geoapi.es/comunidades?CPRO=22&CMUM=907&type=JSON&key=89f6de236556b0c94ee77ca11ad5216d7248ef866acf3d69a6c9845e7593d401&sandbox=1')
        .then((response) => response.json())
        .then((data) => {
            // Muestra la información en la consola (puedes personalizar cómo mostrarla)
            console.log(data);
        })
        .catch((error) => {
            console.error('Error al consultar GeoAPI.es', error);
        });
});
