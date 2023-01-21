function selectProductotable(pagina_actual) {
    var valor = [];
    console.log(pagina_actual);
    valor.push({name: 'funcion', value: '0'});
    valor.push({name: 'pagina_actual', value: pagina_actual});
    console.log(valor);
      var target = document.getElementById("tablaProductoMostrar")
    
    $.ajax({
        type: "POST",
        url: "../../controllers/php/ProductoController.php",
        data: valor,
        dataType:'text',
        success: function (r) {
                    console.log(r);
                   target.innerHTML=r;
                },    error : function(xhr, status) {
                    console.log(status);
                    console.log(xhr);
                    console.log(r)
                    console.log('Disculpe, existió un problema');
                },
        
    });
  }

function registrarProductodatos() {
    var vector = []
   
    if (validacionProducto() == true && validarIntegerAgregaProducto() == true){
    id_proveedor = $('#id_proveedor').children(":selected").attr("id");
    id_categoria = $('#id_categoria').children(":selected").attr("id");
    nombre_producto = $("#nombre_producto").val();
    codigo_producto = $("#codigo_producto").val();
    descripcion_producto = $("#descripcion_producto").val();
    precio_producto = $("#precio_producto").val();
    cantidad = $("#cantidad").val();
    cadena={
        
        "id_proveedor": id_proveedor,
        "id_categoria": id_categoria,
        "nombre_producto": nombre_producto,
        "codigo_producto": codigo_producto,
        "descripcion_producto": descripcion_producto,
        "precio_producto": precio_producto,
        "cantidad": cantidad,
        "funcion": 1,
    }
    var valor = $("#registrarProductoForm").serializeArray();
    valor.push({name: 'funcion', value: '1'});
    console.log(cadena);   
    console.log("hola mundo"); 
    $.ajax({
        type: "POST",
        url: "../../controllers/php/ProductoController.php",
        data: cadena,
        dataType:'json',
        success: function (r) {
                    if (r == 1) {
                        alertify.set("notifier", "position", "top-center");
                        alertify.success("INGRESADO CORRECTAMENTE");
                        cerrarModalIngresarProducto();
                        
                    } else {
                        alertify.set("notifier", "position", "top-center");
                        alertify.error("El usuario no se pudo agregar");
                    }
                },
        
    });
  }
}

  function eliminarProducto(id_producto) {
    console.log(id_producto)
    var valor = [];
    valor.push({name: 'funcion', value: '3'});
    valor.push({name: 'id_producto', value: id_producto})
    console.log(valor)


    alertify.confirm("Está seguro de querer eliminar?",
            function(){
                $.ajax({
                    type: "POST",
                    url: "../../controllers/php/ProductoController.php",
                    data: valor,
                    dataType:'text',
                    success: function (r) {
                                console.log("producto eliminado"+r);
                                selectProductotable(1);
                                alertify.success("ELIMINADO CORRECTAMENTE");
                            },    error : function(xhr, status) {
                                console.log(status);
                                console.log(xhr);
                                console.log(r)
                                console.log('Disculpe, existió un problema');
                            },
                    
                });

            },
            function(){
                alertify.error('Cancel');
            });

}
function buscarProducto(pagina_actual){
    var target = document.getElementById("tablaProductoMostrar");   
    nombre_buscar = $("#buscarProducto").val()
    var valor = [];
    valor.push({name: 'nombre_producto', value: nombre_buscar});
    valor.push({name: 'pagina_actual', value: pagina_actual});
    //var id_usuario = $("#").val();hg CX Z|
    valor.push({name: 'funcion', value: '6'});
    console.log(valor)

    $.ajax({
        type: "POST",
        url: "../../controllers/php/ProductoController.php",
        data: valor,
        dataType:'text',
        success: function (r) {
                        console.log(r);
                        target.innerHTML = r;
                },    error : function(xhr, status) {
                    console.log(status);
                    console.log(xhr);
                    console.log(r)
                    console.log('Disculpe, existió un problema');
                },
        
    });
}

    function updateMostrarProducto(id_producto){
        console.log(id_producto);
        var valor3 = [];
        valor3.push({name: 'funcion', value: '4'});
        valor3.push({name: 'id_producto', value: id_producto})
        console.log(valor)
        console.log("TABLA PRODUCTO XD")
        var target1 = document.getElementById("updateid_proveedor_producto");  
        var valor = [];
        // $("#mostrarGSangre").load("php/mostrarGSangre.php #selectSangre");
        valor.push({name: 'funcion', value: '9'});
        $.ajax({
            type: "POST",
            url: "../../controllers/php/ProductoController.php",
            data: valor,
            dataType:'text',
            success: function (r) {
                        console.log(r);
                        target1.innerHTML = r;
                    },    error : function(xhr, status) {
                        console.log(status);
                        console.log(xhr);
                        console.log(r)
                        console.log('Disculpe, existió un problema');
                    },
            
        });
        var target2 = document.getElementById("updateid_categoria");  
        var valor2 = [];
        // $("#mostrarGSangre").load("php/mostrarGSangre.php #selectSangre");
        valor2.push({name: 'funcion', value: '10'});
        $.ajax({
            type: "POST",
            url: "../../controllers/php/ProductoController.php",
            data: valor2,
            dataType:'text',
            success: function (r) {
                        console.log(r);
                        target2.innerHTML = r;
                        $.ajax({
                            type: "POST",
                            url: "../../controllers/php/ProductoController.php",
                            data: valor3,
                            dataType:'text',
                            success: function (s)  { 
                                console.log(s);        
                                $info = JSON.parse(s);
                                abrirmodalEditarProducto();
                                        console.log("producto mostrar update"+$info['id_producto']);
                                         $('#updateid_categoria option[id="'+$info['id_categoria']+'"]').attr("selected", true);
                                        $('#updateid_proveedor_producto option[id="'+$info['id_proveedor']+'"]').attr("selected", true);
                                        $("#updateid_producto").val($info['id_producto']) 
                                        // $("#updateid_proveedor").val($info['id_proveedor']) 
                                        $("#updatenombre_producto").val($info['nombre_producto']) 
                                        $("#updatecodigo_producto").val($info['codigo_producto'])
                                        $("#updatedescripcion_producto").val($info['descripcion_producto'])
                                        $("#updateprecio_producto").val($info['precio_producto'])
                                        $("#updatecantidad").val($info['cantidad'])
                                    },    error : function(xhr, status) {
                                        console.log(status);
                                        console.log(xhr);
                                        console.log(r)
                                        console.log('Disculpe, existió un problema');
                                    },
                            
                        });
                    },    error : function(xhr, status) {
                        console.log(status);
                        console.log(xhr);
                        console.log(r)
                        console.log('Disculpe, existió un problema');
                    },
            
        });
    

    }
    function editarProducto(id_producto){
        if(validarEditarProducto()==true && validarIntegerEditarProducto() == true){
        var valor = $("#formularioEditarProducto").serializeArray();
        //var id_usuario = $("#").val();
        valor.push({name: 'funcion', value: '5'});
        updateid_categoria = $('#updateid_categoria').children(":selected").attr("id");
        updateid_proveedor_producto = $('#updateid_proveedor_producto').children(":selected").attr("id");
        valor.push({name: 'updateid_categoria', value: updateid_categoria})
        valor.push({name: 'updateid_proveedor_producto', value: updateid_proveedor_producto})
        console.log(valor)

    
        $.ajax({
            type: "POST",
            url: "../../controllers/php/ProductoController.php",
            data: valor,
            dataType:'text',
            success: function (r) {
                        //$info = JSON.parse(r);
                        editarObjetoSuccess();
                        alertify.success("Actualizado Correctamente");
                        selectProductotable(1);
                        console.log(r);
                        cerrarModalEditProducto();
                    },    error : function(xhr, status) {
                        console.log(status);
                        console.log(xhr);
                        console.log(r)
                        console.log('Disculpe, existió un problema');
                    },
            
        });
    }
}
function recuperarProductoTabla(pagina_actual) {
    var valor = [];
    valor.push({name: 'funcion', value: '7'});
    valor.push({name: 'pagina_actual', value: pagina_actual});
    console.log(valor);
    var target = document.getElementById("tablaProductoMostrar");   
    console.log(target)
    $.ajax({
        type: "POST",
        url: "../../controllers/php/ProductoController.php",
        data: valor,
        dataType:'text',
        success: function (r) {
                    console.log(r);
                    target.innerHTML = r;
                },    error : function(xhr, status) {
                    console.log(status);
                    console.log(xhr);
                    console.log(r)
                    console.log('Disculpe, existió un problema');
                },
        
    });
  }

  function recuperarProducto(id_producto) {
    console.log(id_producto)
    var valor = [];
    valor.push({name: 'funcion', value: '8'});
    valor.push({name: 'id_producto', value: id_producto})
    console.log(valor)


    alertify.confirm("Está seguro de querer Recuperar?",
            function(){
                $.ajax({
                    type: "POST",
                    url: "../../controllers/php/ProductoController.php",
                    data: valor,
                    dataType:'text',
                    success: function (r) {
                                console.log("producto recuperado"+r);
                                recuperarProductoTabla(1);
                                alertify.success("RECUPERARDO CORRECTAMENTE");
                            },    error : function(xhr, status) {
                                console.log(status);
                                console.log(xhr);
                                console.log(r)
                                console.log('Disculpe, existió un problema');
                            },
                    
                });

            },
            function(){
                alertify.error('Cancel');
            });

}
    
    function abrirmodalEditarProducto(){
        $('#editarProducto').modal('show');
    
    }
    
    function editarObjetoSuccess(){
        $('#editarProducto').modal('hide');
    
    }
    
function cerrarModalIngresarProducto(){
    console.log('editarLogin');
    $('#registrarProducto').modal('hide');

}

    function registrarProducto(){
        $('#registrarProducto').modal('show');
        var target = document.getElementById("id_proveedor");  
        var valor = [];
        // $("#mostrarGSangre").load("php/mostrarGSangre.php #selectSangre");
        valor.push({name: 'funcion', value: '9'});
        $.ajax({
            type: "POST",
            url: "../../controllers/php/ProductoController.php",
            data: valor,
            dataType:'text',
            success: function (r) {
                        console.log(r);
                        target.innerHTML = r;
                    },    error : function(xhr, status) {
                        console.log(status);
                        console.log(xhr);
                        console.log(r)
                        console.log('Disculpe, existió un problema');
                    },
            
        });
        var target2 = document.getElementById("id_categoria");  
        var valor2 = [];
        // $("#mostrarGSangre").load("php/mostrarGSangre.php #selectSangre");
        valor2.push({name: 'funcion', value: '10'});
        $.ajax({
            type: "POST",
            url: "../../controllers/php/ProductoController.php",
            data: valor2,
            dataType:'text',
            success: function (r) {
                        console.log(r);
                        target2.innerHTML = r;
                    },    error : function(xhr, status) {
                        console.log(status);
                        console.log(xhr);
                        console.log(r)
                        console.log('Disculpe, existió un problema');
                    },
            
        });



}

    //validaciones
function validacionProducto() {
    id_proveedor = $('#id_proveedor').children(":selected").attr("id");
    id_categoria = $('#id_categoria').children(":selected").attr("id");
    nombre_producto = $("#nombre_producto").val();
    codigo_producto = $("#codigo_producto").val();
    descripcion_producto = $("#descripcion_producto").val();
    precio_producto = $("#precio_producto").val();
    cantidad = $("#cantidad").val();
     if ($.trim(id_proveedor) == "") {
        alertify.set("notifier", "position", "top-center");
        alertify.error("Ingrese proveedor");
        $("#id_proveedor").focus();
        return false;
    } else if ($.trim(id_categoria) == "") {
        alertify.set("notifier", "position", "top-center");
        alertify.error("Ingrese categoria");
        $("#id_categoria").focus();
        return false;
    } else if ($.trim(nombre_producto) == "") {
        alertify.set("notifier", "position", "top-center");
        alertify.error("Ingrese producto");
        $("#nombre_producto").focus();
        return false;
    } else if ($.trim(codigo_producto) == "") {
        alertify.set("notifier", "position", "top-center");
        alertify.error("Ingrese  nombre");
        $("#codigo_producto").focus();
        return false;
    } else if ($.trim(descripcion_producto) == "") {
        alertify.set("notifier", "position", "top-center");
        alertify.error("Ingrese  descripción");
        $("#descripcion_producto").focus();
        return false;
    } else if ($.trim(precio_producto) == "") {
        alertify.set("notifier", "position", "top-center");
        alertify.error("Ingrese precio");
        $("#precio_producto").focus();
        return false;
    } else if ($.trim(cantidad) == "") {
        alertify.set("notifier", "position", "top-center");
        alertify.error("Ingrese cantidad");
        $("#cantidad").focus();
        return false;
    }
    return true;
}

function validarEditarProducto() {
    var updateid_categoria = $('#updateid_categoria').children(":selected").attr("id");
    var updateid_proveedor_producto = $('#updateid_proveedor_producto').children(":selected").attr("id");
    var updatenombre_producto = $("#updatenombre_producto").val();
    var updatecodigo_producto = $("#updatecodigo_producto").val();
    var updatedescripcion_producto = $("#updatedescripcion_producto").val();
    var updateprecio_producto = $("#updateprecio_producto").val();
    var updatecantidad = $("#updatecantidad").val();


    if ($.trim(updateid_categoria) == "") {
        alertify.set("notifier", "position", "top-center");
        alertify.error("Ingrese Categoria");
        $("#updateid_categoria").focus();
        return false;
    } else if ($.trim(updateid_proveedor_producto) == "") {
        alertify.set("notifier", "position", "top-center");
        alertify.error("Ingrese Proveedor");
        $("#updateid_proveedor_producto").focus();
        return false;
    } else if ($.trim(updatenombre_producto) == "") {
        alertify.set("notifier", "position", "top-center");
        alertify.error("Ingrese  nombre");
        $("#updatenombre_producto").focus();
        return false;
    } else if ($.trim(updatecodigo_producto) == "") {
        alertify.set("notifier", "position", "top-center");
        alertify.error("Ingrese  codigo producto");
        $("#updatecodigo_producto").focus();
        return false;
    } else if ($.trim(updatedescripcion_producto) == "") {
        alertify.set("notifier", "position", "top-center");
        alertify.error("Ingrese  descripción");
        $("#updatedescripcion_producto").focus();
        return false;
    } else if ($.trim(updateprecio_producto) == "") {
        alertify.set("notifier", "position", "top-center");
        alertify.error("Ingrese precio");
        $("#updateprecio_producto").focus();
        return false;
    } else if ($.trim(updatecantidad) == "") {
        alertify.set("notifier", "position", "top-center");
        alertify.error("Ingrese cantidad");
        $("#updatecantidad").focus();
        return false;
    }
    return true;
}

function validarIntegerEditarProducto()
{
    var updateprecio_producto = $("#updateprecio_producto").val();
    
  if (isNaN(updateprecio_producto)) 
  {
    alertify.error("el sueldo debe ser un numero")
    return false;
  }else {
    return true;
  }
  
}

function validarIntegerAgregaProducto()
{
    var precio_producto = $("#precio_producto").val();
    
  if (isNaN(precio_producto)) 
  {
    alertify.error("el Precio debe ser un numero")
    return false;
  }else {
    return true;
  }
  
}

