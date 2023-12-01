$(document).ready(function () {
    $('#comunitat_autonoma').change(function () {
        var selectedComunidad = $(this).val();

        // Realizar una solicitud Ajax para obtener las comarcas asociadas a la comunidad autónoma seleccionada
        $.ajax({
            type: 'GET',
            url: '../controllers/obtener_comarcas.php',
            data: {
                id_comunidad: selectedComunidad
            },
            dataType: 'json',
            success: function (comarcas) {
                // Limpiar las opciones actuales
                $('#comarca').empty();

                // Llenar las nuevas opciones
                $.each(comarcas, function (index, comarca) {
                    $('#comarca').append('<option value="' + comarca.id_comarca + '">' + comarca.name + '</option>');
                });

                // Habilitar el campo de selección de comarcas
                $('#comarca').prop('disabled', false);
            },
            error: function (xhr, status, error) {
                console.error('Error en la solicitud Ajax. Estado:', status);
                // Mostrar el mensaje de error devuelto por el servidor
                alert('Error al obtener las comarcas. Inténtalo de nuevo más tarde. Detalles: ' + xhr.responseText);
            }
        });
    });
});