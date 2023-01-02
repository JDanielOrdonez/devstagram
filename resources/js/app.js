import Dropzone from "dropzone";

// Dropzone es para guardar imagenes en un servidor online
Dropzone.autoDiscover = false;

const dropzone = new Dropzone('#dropzone',{
    dictDefaultMessage: 'Sube aquí tu imagen',
    acceptedFiles: '.png, .jpg, .jpeg, .gif', //Tipos de archivos aceptados
    addRemoveLinks: true, //permite al usuario eliminar su imagen
    dictRemoveFile: 'Borrar Archivo',
    maxFiles: 1,
    uploadMultiple: false,

    // la funcion callback de init se ejecuta cuando dropzone es inicializado
    init: function() {
        if(document.querySelector('[name="imagen"]').value.trim()){
            const imagenPublicada = {};

            // guardamos esa imagen en una variable
            imagenPublicada.size = 1234;
            imagenPublicada.name = document.querySelector('[name="imagen"]').value;
            
            this.options.addedfiles.call(this, imagenPublicada);
            this.options.thumbnail.call(this, imagenPublicada, `/uploads/${imagenPublicada.name}`);
        
            imagenPublicada.previewElement.classList.add(
                "dz-success",
                "dz-complete"
            );
        }
    }
});


// success= evento para cuando la imagen se suba correctamente
dropzone.on('success', function(file, response){
  document.querySelector('[name="imagen"]').value = response.imagen;
});

// Cuando el archivo es eliminado
dropzone.on('removedfile', function(){
    document.querySelector('[name="imagen"]').value = '';
});