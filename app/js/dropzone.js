// Configura la Dropzone
Dropzone.options.dropzone = {
    paramName: 'postImage', // Nombre del campo que se enviará al servidor
    maxFilesize: 5, // Tamaño máximo del archivo en MB
    acceptedFiles: ".jpg, .jpeg, .png", // Tipos de archivos permitidos
    dictDefaultMessage: "Arrastra y suelta archivos aquí o haz clic para seleccionar",
    addRemoveLinks: true, // Muestra enlaces para eliminar archivos cargados
    maxFiles: 4,
    init: function () {
        this.on("complete", function (file) {
            // Lógica después de completar la carga
            if (this.getUploadingFiles().length === 0 && this.getQueuedFiles().length === 0) {
                // Llama a la función para cargar el listado de imágenes
            }
        });
    }
};

