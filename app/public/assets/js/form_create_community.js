$(document).ready(function () {
    $('#generalAlert').hide();
    $('#alertNomComunitat').hide();
    $('#alertDescripcio').hide();
    $('#alertComunitat').hide();
    $('#alertCondicions').hide();

    // Controladors de events para verificar els campos conforme s'escriuen
    $('#nom_comunitat').on('input', comprovarNomComunitat);
    $('#descripcio').on('input', comprovarDescripcio);
    $('#comunitat_autonoma').on('input', comprovarComunitatAutonoma);
    $('#checkCondicions').on('change', comprovarCheckBox);

    // Controlador de events para el botó "Registrar-me"
    $('#boto-registrar').click(function (event) {
        event.preventDefault(); // Evitar que el formulario se envíe de inmediato

        // Si els camps introduits son vàlids
        if (comprovarDades()) {
            // Enviar el formulari al servidor
            $('#formulario').submit();
        }
    });
});

function dades() {
    nomComunitat = $('#nom_comunitat').val();
    descripcioComunitat = $('#descripcio').val();
    comunitatAutonoma = $('#comunitat_autonoma').val();
}

function comprovarDades() {
    comprovarNomComunitat();
    comprovarDescripcio();
    comprovarComunitatAutonoma();
    comprovarCheckBox();
    if (nomComunitat === '' || descripcioComunitat === '' || comunitatAutonoma === '') {
        $('#generalAlert').text('Completa tots els camps.').show();
    }else {
        $('#generalAlert').hide();
        return true;
    }
}

function formulari() {
    dades();
    comprovarDades();
}

function comprovarNomComunitat() {
    let nomComunitat = $('#nom_comunitat').val();
    let patroAlfaNumeric = /^[a-zA-Z0-9\s\-_.,'"/&(){}[\]<>]+$/;
    if (nomComunitat === '') {
        $('#nom_comunitat').removeClass('border-success');
        $('#nom_comunitat').addClass('border-danger');
        $('#alertNomComunitat').text('Cal introduir un nom per a la comunitat.').show();
    } else if (!nomComunitat.match(patroAlfaNumeric)) {
        $('#nom_comunitat').removeClass('border-success');
        $('#nom_comunitat').addClass('border-danger');
        $('#alertNomComunitat').text('Introdueix un nom en format correcte.').show();
    } else {
        $('#alertNomComunitat').hide();
        $('#nom_comunitat').removeClass('border-danger');
        $('#nom_comunitat').addClass('border-success');
        return true;
    }
}

function comprovarDescripcio() {
    let descripcioComunitat = $('#descripcio').val();
    let patroAlfaNumeric = /^[a-zA-Z0-9\s\-_.,'"/&(){}[\]<>]+$/;
    if (descripcioComunitat === '') {
        $('#descripcio').removeClass('border-success');
        $('#descripcio').addClass('border-danger');
        $('#alertDescripcio').text('Cal introduir una descripció per a la comunitat.').show();
    } else if (!descripcioComunitat.match(patroAlfaNumeric)) {
        $('#descripcio').removeClass('border-success');
        $('#descripcio').addClass('border-danger');
        $('#alertDescripcio').text('Introdueix un nom en format correcte.').show();
    } else {
        $('#alertDescripcio').hide();
        $('#descripcio').removeClass('border-danger');
        $('#descripcio').addClass('border-success');
        return true;
    }
}

function comprovarComunitatAutonoma() {
    nomComunitat = $('#nom_comunitat').val();
    let patroAlfaNumeric = /^[a-zA-Z0-9\s\-_.,'"/&(){}[\]<>]+$/;
    if (nomComunitat === '') {
        $('#comunitat_autonoma').removeClass('border-success');
        $('#comunitat_autonoma').addClass('border-danger');
        $('#alertComunitat').text('Cal introduir una comunitat autònoma per a la comunitat.').show();
    } else if (!nomComunitat.match(patroAlfaNumeric)) {
        $('#comunitat_autonoma').removeClass('border-success');
        $('#comunitat_autonoma').addClass('border-danger');
        $('#alertComunitat').text('Introdueix una comunitat autònoma en format correcte.').show();
    } else {
        $('#alertComunitat').hide();
        $('#comunitat_autonoma').removeClass('border-danger');
        $('#comunitat_autonoma').addClass('border-success');
        return true;
    }
}

function comprovarCheckBox() {
    const checkbox = $("#checkCondicions")[0]; // Obtén el elemento DOM a través de [0]

    if (!checkbox.checked) {
        $('#checkCondicions').removeClass('border-success');
        $('#checkCondicions').addClass('border-danger');
        $('#alertCondicions').text('Cal llegir i acceptar els termes i condicions.').show();
    } else {
        $('#checkCondicions').removeClass('border-danger');
        $('#checkCondicions').addClass('border-success');
        $('#alertCondicions').hide();
        return true;
    }
}