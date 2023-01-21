$( document ).ready(function() {
    console.log( "ready!" );
})   // Ingresar Login //    
function ingresarLogin(){
    console.log('Hello world');
    window.location.href = "administrador.php";

}    


    // Mostrar Registrar Login //
function registrarTrabajador(){
    console.log('mostrarRegistrarLogin');
    $('#registrarTrabajador').modal('show');

}

function cerrarTrabajador(){
    console.log('mostrarRegistrarLogin');
    $('#registrarTrabajador').modal('hide');

}

function editarTrabajador(){
    console.log('editarLogin');
    $('#editarTrabajador').modal('show');

}

function cerrareditarTrabajador(){
    console.log('editarLogin');
    $('#editarTrabajador').modal('hide');

}

function cerrarmostrarTrabajador(){
    console.log('editarLogin');
    $('#mostrarTrabajador').modal('hide');

}


function mostrarTablaTrabajador(){
    console.log('display none trabajador')
    $('#tablaTrabajador').attr("style", "display: block !important");
    $('#tablaProveedor').css("display", "none");
    $('#tablaProducto').css("display", "none");
}

function mostrarTablaProveedor(){
    console.log('display none trabajador')
    $('#tablaTrabajador').attr("style", "display: none !important");
    $('#tablaProveedor').attr("style", "display: block !important");
    $('#tablaProducto').attr("style", "display: none !important");
}

function mostrarTablaProducto(){
    console.log('display none PRODUCTO')
    $('#tablaTrabajador').attr("style", "display: none !important");
    $('#tablaProveedor').attr("style", "display: none !important");
    $('#tablaProducto').attr("style", "display: block !important");
}

function registrarProveedor(){
    console.log('mostrarRegistrarLogin');
    $('#registrarProveedor').modal('show');

}

function abrirmodalEditarProveedor(){
    console.log('editarLogin');
    $('#editarProveedor').modal('show');

}



function editarProducto(){
    console.log('editarLogin');
    $('#editarProducto').modal('show');

}

function cerrarModalEditProducto(){
    console.log('editarLogin');
    $('#editarProducto').modal('hide');

}