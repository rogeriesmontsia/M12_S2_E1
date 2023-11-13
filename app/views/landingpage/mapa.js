let datosProcesados = [];
console.log("Cargando datos y eventos...");

// Cargar datos y configurar eventos al cargar la página
window.onload = function () {
    cargarDatosYEventos();
};

function obtenerDatosComunidad(id) {
    // Buscar la comunidad autónoma por el código, ignorando la tilde
    const comunidadAutonoma = datosProcesados.find(comunidad => comunidad.code === id || comunidad.label.normalize("NFD").replace(/[\u0300-\u036f]/g, "") === id);

    if (comunidadAutonoma) {
        return comunidadAutonoma;
    } else {
        console.error("Error: No se encontró la comunidad autónoma con el código:", id);
        return null;
    }
}

function cargarDatosYEventos() {
    fetch('arbol.json')
        .then(response => response.json())
        .then(data => {
            // Procesar los datos y almacenarlos en la variable global
            datosProcesados = data;
            console.log("Datos cargados:", datosProcesados);

            // Configurar el evento click para el SVG después de cargar los datos
            const tuSVG = document.getElementById("tuSVG");
            if (tuSVG) {
                tuSVG.addEventListener("click", function (event) {
                    const path = event.target.closest("path");
                    if (path) {
                        const pathId = path.getAttribute("id");
                        const comunidadAutonoma = obtenerDatosComunidad(pathId);

                        // Verificar si comunidadAutonoma tiene un valor antes de llamar a abrirModal
                        if (comunidadAutonoma) {
                            abrirModal(comunidadAutonoma);
                        } else {
                            console.error("Error: comunidadAutonoma es undefined.");
                        }
                    } else {
                        console.error("Error: No se encontró la ruta ('path') dentro del SVG.");
                    }
                });
            } else {
                console.error("Error: No se encontró el elemento con ID 'tuSVG'.");
            }
        })
        .catch(error => {
            console.error('Error al cargar el archivo JSON: ' + error);
        });
}

function abrirModal(comunidadAutonoma) {
    const modalTitulo = document.getElementById("modalTitulo");
    const modalLista = document.getElementById("modalLista");

    if (!modalTitulo || !modalLista) {
        console.error("Error: No se encontraron elementos de la modal.");
        return;
    }

    if (!comunidadAutonoma) {
        console.error("Error: comunidadAutonoma es undefined.");
        return;
    }

    console.log("Estructura completa de comunidadAutonoma:", comunidadAutonoma);

    const modal = new bootstrap.Modal(document.getElementById("miModal"));
    modalTitulo.textContent = comunidadAutonoma.label;

    // Mostrar las provincias inicialmente
    mostrarProvincias(comunidadAutonoma);

    modal.show();
}

function mostrarProvincias(comunidadAutonoma) {
  const modalLista = document.getElementById("modalLista");

  if (!modalLista) {
      console.error("Error: No se encontró la lista de provincias.");
      return;
  }

  if (comunidadAutonoma.provinces) {
      modalLista.innerHTML = comunidadAutonoma.provinces.map(provincia =>
          `<li class="list-group-item provincia" data-provincia='${provincia.label}'>${provincia.label}</li>`
      ).join('');

      // Agregar evento clic a los elementos de clase 'provincia'
      const provinciasItems = document.querySelectorAll('.provincia');
      provinciasItems.forEach(item => {
          item.addEventListener('click', function () {
              const provinciaLabel = this.getAttribute('data-provincia');
              mostrarPoblaciones(provinciaLabel);
          });
      });
  } else {
      modalLista.innerHTML = "No hay información de provincias.";
  }
}

function mostrarPoblaciones(provincia) {
  const modalLista = document.getElementById("modalLista");

  if (!modalLista) {
      console.error("Error: No se encontró la lista de poblaciones.");
      return;
  }

  let poblaciones;
  try {
      poblaciones = JSON.parse(provincia.towns);
  } catch (error) {
      console.error("Error al analizar la cadena JSON:", error);
      return;
  }

  // Verificar si la provincia tiene poblaciones
  if (poblaciones) {
      modalLista.innerHTML = poblaciones.map(poblacion =>
          `<li class="list-group-item">${poblacion.label}</li>`
      ).join('');
  } else {
      modalLista.innerHTML = "No hay información de poblaciones para esta provincia.";
  }
}


function cerrarModal() {
  const modalElement = document.getElementById("miModal");
  const modal = new bootstrap.Modal(modalElement);

  modal.hide();

  // Esperar a que se oculte el modal antes de limpiar
  modalElement.addEventListener('hidden.bs.modal', function () {
    modal.dispose();
    document.querySelector('.modal-backdrop').remove();
  });
}
