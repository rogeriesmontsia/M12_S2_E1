//@charset "UTF-8";
import fetch from 'node-fetch';

// Cargar el archivo JSON
fetch('arbol.json')
  .then(response => response.json())
  .then(data => {
    // Crear un array para almacenar las comunidades autónomas y provincias
    const comunidadesYProvincias = [];

    // Recorrer los datos y extraer las comunidades y provincias
    data.forEach(comunidad => {
      const comunidadAutonoma = {
        label: comunidad.label,
        provinces: []
      };

      comunidad.provinces.forEach(provincia => {
        const provinciaData = {
          label: provincia.label
        };
        comunidadAutonoma.provinces.push(provinciaData);
      });

      comunidadesYProvincias.push(comunidadAutonoma);
    });

    // Imprimir el resultado
    console.log(comunidadesYProvincias);
  })
  .catch(error => {
    console.error('Error al cargar el archivo JSON: ' + error);
  });
