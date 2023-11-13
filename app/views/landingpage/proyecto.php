<div class="container-fluid mt-5 py-5 text-center bg-light">
<div class="container mt-5 py-5 text-center">
    <h2 class="display-4 mb-4 text-black">¿Te sumas al intercambio?</h2>

    <div class="row">
        <div class="col-md-12">
            <p class="lead">
                Este proyecto representa una oportunidad para conectar y fortalecer las comunidades agrícolas mediante el préstamo y el intercambio de herramientas y productos agrícolas. 
                La base de esta iniciativa es compartir recursos y reducir el desperdicio. Únete a nosotros y sé parte de la comunidad que promueve el cultivo local y la colaboración sostenible.
            </p>
        </div> <!-- Cierra el div con clase "col-md-12" -->

        <div class="col-md-4">
            <div class="elemento border p-5 mb-5 bg-white" onmouseover="iniciarContador('contador-herramientas', 13)">
                <h2 class="mb-4">Intercambios realizados</h2>
                <h3 class="contador-herramientas">0</h3>
                <img src="https://cdn-icons-png.flaticon.com/512/1366/1366201.png" alt="Icono de Herramientas" class="img-fluid w-50 h-50 mt-3">
            </div>
        </div>
        <div class="col-md-4">
            <div class="elemento border p-5 mb-5 bg-white" onmouseover="iniciarContador('contador-verduras', 26)">
                <h2 class="mb-4">Vegetales salvados</h2>
                <h3 class="contador-verduras">0</h3>
                <img src="https://cdn-icons-png.flaticon.com/512/4251/4251940.png" alt="Icono de Verduras" class="img-fluid w-50 h-50 mt-3">
            </div>
        </div>
        <div class="col-md-4">
            <div class="elemento border p-5 mb-5 bg-white" onmouseover="iniciarContador('contador-gasolina', 45)">
                <h2 class="mb-4">Gasolina ahorrada</h2>
                <h3 class="contador-gasolina">0</h3>
                <img src="https://cdn-icons-png.flaticon.com/512/1996/1996736.png" alt="Icono de Gasolina" class="img-fluid w-50 h-50 mt-3">
            </div>
        </div>
    </div>
    </div>
    </div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
<script>
    var contadorIniciado = {};

    function actualizarCaja(claseContador, cantidad) {
        var contadores = document.querySelectorAll('.' + claseContador);
        contadores.forEach(function (contador) {
            contador.innerText = cantidad;
        });
    }

    function iniciarContador(claseContador, cantidadStop) {
        if (!contadorIniciado[claseContador]) {
            contadorIniciado[claseContador] = true;

            var cantidad = 0;
            var intervalo = setInterval(function () {
                cantidad += 1;
                actualizarCaja(claseContador, cantidad);

                if (cantidad >= cantidadStop) {
                    clearInterval(intervalo);
                }
            }, 100);
        }
    }
</script>
