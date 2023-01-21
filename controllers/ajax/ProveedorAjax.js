// import "../../dist/jquery.js";

function selectProveedortable(pagina_actual) {
    var valor = [];
    valor.push({name: 'funcion', value: '0'});
    valor.push({name: 'pagina_actual', value: pagina_actual});
    console.log(valor);
      var target = document.getElementById("tablaProveedorMostrar")
    
    $.ajax({
        type: "POST",
        url: "../../controllers/php/ProveedorController.php",
        data: valor,
        dataType:'text',
        success: function (r) {
                   target.innerHTML=r;
                },    error : function(xhr, status) {
                    console.log(status);
                    console.log(xhr);
                    console.log(r)
                    console.log('Disculpe, existió un problema');
                },
        
    });
  }

function registrarProveedordatos() {
    var vector = []
   
    if (validacionProveedor() == true && validarRutProveedor() == true && validarMailProveedor() == true && validarIntegerAgregaProveedor() == true){
    id_usuario = $("#id_usuario").val();
    rut_proveedor = $("#rut_proveedor").val();
    nombre_proveedor = $("#nombre_proveedor").val();
    email_proveedor = $("#email_proveedor").val();
    telefono_proveedor = $("#telefono_proveedor").val();
    area_proveedor = $("#area_proveedor").val();
    nombre_empresa_proveedor = $("#nombre_empresa_proveedor").val();
    cargo_proveedor = $("#cargo_proveedor").val();
    ubicacion_proveedor = $("#ubicacion_proveedor").val();
    descripcion_proveedor = $("#descripcion_proveedor").val();
    tipo_producto_proveedor = $("#tipo_producto_proveedor").val();

    cadena={
        
        "id_usuario": id_usuario,
        "rut_proveedor": rut_proveedor,
        "nombre_proveedor": nombre_proveedor,
        "email_proveedor": email_proveedor,
        "telefono_proveedor": telefono_proveedor,
        "area_proveedor": area_proveedor,
        "nombre_empresa_proveedor": nombre_empresa_proveedor,
        "cargo_proveedor": cargo_proveedor,
        "ubicacion_proveedor": ubicacion_proveedor,
        "descripcion_proveedor": descripcion_proveedor,
        "tipo_producto_proveedor": tipo_producto_proveedor,
        "habilitado_proveedor": true,
        "funcion": 1,
    }
    var valor = $("#registrarProveedorForm").serializeArray();
    valor.push({name: 'funcion', value: '1'});
    console.log(cadena);   
    console.log("hola mundo"); 
    $.ajax({
        type: "POST",
        url: "../../controllers/php/ProveedorController.php",
        data: cadena,
        dataType:'json',
        success: function (r) {
                    console.log(r);
                    if (r == 1) {
                        alertify.set("notifier", "position", "top-center");
                        alertify.success("INGRESADO CORRECTAMENTE");
                        registrarProveedorSuccess();
                        selectProveedortable(1);
                         $("#id_usuario").val("")
                         $("#rut_proveedor").val("")
                         $("#nombre_proveedor").val("")
                         $("#email_proveedor").val("")
                         $("#telefono_proveedor").val("")
                         $("#area_proveedor").val("")
                         $("#nombre_empresa_proveedor").val("")
                         $("#cargo_proveedor").val("")
                         $("#ubicacion_proveedor").val("")
                         $("#descripcion_proveedor").val("")
                         $("#tipo_producto_proveedor").val("")
                        document.getElementById("registrarProveedorForm").reset();
                        
                    }else if (r==2){
                        alertify.set("notifier", "position", "top-center");
                        alertify.error("El proveedor ya existe");
                    }
                    
                    else {
                        alertify.set("notifier", "position", "top-center");
                        alertify.error("El proveedor no se pudo agregar");
                    }
                },
        
    });
    }
  }

  function eliminarProveedor(id_proveedor) {
    console.log(id_proveedor)
    var valor = [];
    valor.push({name: 'funcion', value: '3'});
    valor.push({name: 'id_proveedor', value: id_proveedor})
    console.log(valor)


    alertify.confirm("¿Está seguro que desea eliminar?",
            function(){
                $.ajax({
                    type: "POST",
                    url: "../../controllers/php/ProveedorController.php",
                    data: valor,
                    dataType:'text',
                    success: function (r) {
                                console.log("proveedor eliminado"+r);
                                selectProveedortable(1);
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
function buscarProveedor(pagina_actual){
    var target = document.getElementById("tablaProveedorMostrar");   
    nombre_buscar = $("#buscarProveedor").val()
    var valor = [];
    valor.push({name: 'nombre_proveedor', value: nombre_buscar});
    valor.push({name: 'pagina_actual', value: pagina_actual});
    //var id_usuario = $("#").val();hg CX Z|
    valor.push({name: 'funcion', value: '6'});
    console.log(valor)

    $.ajax({
        type: "POST",
        url: "../../controllers/php/ProveedorController.php",
        data: valor,
        dataType:'text',
        success: function (r) {
                        target.innerHTML = r;
                },    error : function(xhr, status) {
                    console.log(status);
                    console.log(xhr);
                    console.log(r)
                    console.log('Disculpe, existió un problema');
                },
        
    });
}

    function updateMostrarProveedor(id_proveedor){
        console.log(id_proveedor);
        var valor = [];
        valor.push({name: 'funcion', value: '4'});
        valor.push({name: 'id_proveedor', value: id_proveedor})
        console.log(valor)
        console.log("TABLA PROVEEDOR XD")
    
        $.ajax({
            type: "POST",
            url: "../../controllers/php/ProveedorController.php",
            data: valor,
            dataType:'text',
            success: function (r)  { 
                console.log(r);        
                $info = JSON.parse(r);
                abrirmodalEditarProveedor();
                        console.log("producto mostrar update"+$info['id_proveedor']);
                        $("#updateid_proveedor").val($info['id_proveedor']) 
                        $("#updaterut_proveedor").val($info['rut_proveedor']) 
                        $("#updatenombre_proveedor").val($info['nombre_proveedor'])
                        $("#updateemail_proveedor").val($info['email_proveedor']) 
                        $("#updatetelefono_proveedor").val($info['telefono_proveedor'])
                        $("#updatearea_proveedor").val($info['area_proveedor'])
                        $("#updatenombre_empresa_proveedor").val($info['nombre_empresa_proveedor'])
                        $("#updatecargo_proveedor").val($info['cargo_proveedor'])
                        $("#updateubicacion_proveedor").val($info['ubicacion_proveedor'])
                        $("#updatedescripcion_proveedor").val($info['descripcion_proveedor'])
                        $("#updatetipo_producto_proveedor").val($info['tipo_producto_proveedor'])
                    },    error : function(xhr, status) {
                        console.log(status);
                        console.log(xhr);
                        console.log(r)
                        console.log('Disculpe, existió un problema');
                    },
            
        });
    }
    function editarProveedor(id_proveedor){
        
        var valor = $("#formularioEditarProveedor").serializeArray();
        if (validarEditarProveedor() == true && validarRutProveedorEditar() == true && validarMailEditarProveedor() == true && validarIntegerEditarProveedor() == true){
        updaterut_proveedor = $("#updaterut_proveedor").val();
        updatenombre_proveedor = $("#updatenombre_proveedor").val();
        updateemail_proveedor = $("#updateemail_proveedor").val();
        updatetelefono_proveedor = $("#updatetelefono_proveedor").val();
        updatearea_proveedor = $("#updatearea_proveedor").val();
        updatenombre_empresa_proveedor = $("#updatenombre_empresa_proveedor").val();
        updatecargo_proveedor = $("#updatecargo_proveedor").val();
        updateubicacion_proveedor = $("#updateubicacion_proveedor").val();
        updatetipo_producto_proveedor = $("#updatetipo_producto_proveedor").val();
        updatedescripcion_proveedor = $("#updatedescripcion_proveedor").val();
        updateid_proveedor = $("#updateid_proveedor").val();
    
        //var id_usuario = $("#").val();
        cadena={
        
            "updaterut_proveedor": updaterut_proveedor,
            "updatenombre_proveedor": updatenombre_proveedor,
            "updateemail_proveedor": updateemail_proveedor,
            "updatetelefono_proveedor": updatetelefono_proveedor,
            "updatetelefono_proveedor": updatetelefono_proveedor,
            "updatearea_proveedor": updatearea_proveedor,
            "updatenombre_empresa_proveedor": updatenombre_empresa_proveedor,
            "updatecargo_proveedor": updatecargo_proveedor,
            "updateubicacion_proveedor": updateubicacion_proveedor,
            "updatetipo_producto_proveedor": updatetipo_producto_proveedor,
            "updatedescripcion_proveedor": updatedescripcion_proveedor,
            "updateid_proveedor": updateid_proveedor,

            "funcion": 5,
        }
        console.log(cadena);
        $.ajax({
            type: "POST",
            url: "../../controllers/php/ProveedorController.php",
            data: cadena,
            dataType:'text',
            success: function (r) {
                        //$info = JSON.parse(r);
                        editarObjetoSuccess();
                        alertify.success("Actualizado Correctamente");
                        selectProveedortable(1);
                        console.log(r);
                    },    error : function(xhr, status) {
                        console.log(status);
                        console.log(xhr);
                        console.log(r)
                        console.log('Disculpe, existió un problema');
                    },
            
        });
    }
    }

function recuperarProveedorTabla(pagina_actual) {
    var valor = [];
    valor.push({name: 'funcion', value: '7'});
    valor.push({name: 'pagina_actual', value: pagina_actual});
    console.log(valor);
    var target = document.getElementById("tablaProveedorMostrar");   
    console.log(target)
    $.ajax({
        type: "POST",
        url: "../../controllers/php/ProveedorController.php",
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

  function recuperarProveedor(id_proveedor) {
    console.log(id_proveedor)
    var valor = [];
    valor.push({name: 'funcion', value: '8'});
    valor.push({name: 'id_proveedor', value: id_proveedor})
    console.log(valor)


    alertify.confirm("¿Está seguro de querer Recuperar?",
            function(){
                $.ajax({
                    type: "POST",
                    url: "../../controllers/php/ProveedorController.php",
                    data: valor,
                    dataType:'text',
                    success: function (r) {
                                console.log("proveedor recuperado"+r);
                                recuperarProveedorTabla(1);
                                alertify.success("RECUPERADO CORRECTAMENTE");
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
    
    function abrirmodalEditarProveedor(){
        $('#editarProveedor').modal('show');
    
    }
    
    function editarObjetoSuccess(){
        $('#editarProveedor').modal('hide');
    
    }
    
    //validaciones
function validacionProveedor() {
    
    //var id_usuario = $("#id_usuario").val();
    var rut_proveedor = $("#rut_proveedor").val();
    var nombre_proveedor = $("#nombre_proveedor").val();
    var email_proveedor = $("#email_proveedor").val();
    var telefono_proveedor = $("#telefono_proveedor").val();
    var area_proveedor = $("#area_proveedor").val();
    var nombre_empresa_proveedor = $("#nombre_empresa_proveedor").val();
    var cargo_proveedor = $("#cargo_proveedor").val();
    var ubicacion_proveedor = $("#ubicacion_proveedor").val();
    var descripcion_proveedor = $("#descripcion_proveedor").val();
    var tipo_producto_proveedor = $("#tipo_producto_proveedor").val();

    if ($.trim(rut_proveedor) == "") {
        alertify.set("notifier", "position", "top-center");
        alertify.error("Ingrese rut proveedor");
        $("#rut_proveedor").focus();
        return false;
    } else if ($.trim(nombre_proveedor) == "") {
        alertify.set("notifier", "position", "top-center");
        alertify.error("Ingrese nombre proveedor");
        $("#nombre_proveedor").focus();
        return false;
    } else if ($.trim(email_proveedor) == "") {
        alertify.set("notifier", "position", "top-center");
        alertify.error("Ingrese correo proveedor");
        $("#email_proveedor").focus();
        return false;
    } else if ($.trim(telefono_proveedor) == "") {
        alertify.set("notifier", "position", "top-center");
        alertify.error("Ingrese telefono proveedor");
        $("#telefono_proveedor").focus();
        return false;
    } else if ($.trim(area_proveedor) == "") {
        alertify.set("notifier", "position", "top-center");
        alertify.error("Ingrese Area proveedor");
        $("#area_proveedor").focus();
        console.log("error area");
        return false;
    }    else if ($.trim(nombre_empresa_proveedor) == "") {
        alertify.set("notifier", "position", "top-center");
        alertify.error("Ingrese nombre de la empresa del proveedor");
        $("#nombre_empresa_proveedor").focus();
        return false;
    } else if ($.trim(cargo_proveedor) == "") {
        alertify.set("notifier", "position", "top-center");
        alertify.error("Ingrese  cargo del proveedor");
        $("#cargo_proveedor").focus();
        return false;
    } else if ($.trim(ubicacion_proveedor) == "") {
        alertify.set("notifier", "position", "top-center");
        alertify.error("Ingrese  ubicacion del proveedor");
        $("#ubicacion_proveedor").focus();
        return false;
    } else if ($.trim(descripcion_proveedor) == "") {
        alertify.set("notifier", "position", "top-center");
        alertify.error("Ingrese Descripcion");
        $("#descripcion_proveedor").focus();
        return false;
    } else if ($.trim(tipo_producto_proveedor) == "") {
        alertify.set("notifier", "position", "top-center");
        alertify.error("Ingrese Tipo de Producto");
        $("#tipo_producto_proveedor").focus();
        return false;
    }else {
    return true;
    }
}

function validarEditarProveedor() {

    updaterut_proveedor = $("#updaterut_proveedor").val();
    updatenombre_proveedor = $("#updatenombre_proveedor").val();
    updateemail_proveedor = $("#updateemail_proveedor").val();
    updatetelefono_proveedor = $("#updatetelefono_proveedor").val();
    updatearea_proveedor = $("#updatearea_proveedor").val();
    updatenombre_empresa_proveedor = $("#updatenombre_empresa_proveedor").val();
    updatecargo_proveedor = $("#updatecargo_proveedor").val();
    updateubicacion_proveedor = $("#updateubicacion_proveedor").val();
    updatetipo_producto_proveedor = $("#updatetipo_producto_proveedor").val();
    updatedescripcion_proveedor = $("#updatedescripcion_proveedor").val();
  

    if ($.trim(updaterut_proveedor) == "") {
        alertify.set("notifier", "position", "top-center");
        alertify.error("Ingrese rut proveedor");
        $("#updaterut_proveedor").focus();
        return false;
    } else if ($.trim(updatenombre_proveedor) == "") {
        alertify.set("notifier", "position", "top-center");
        alertify.error("Ingrese nombre");
        $("#updatenombre_proveedor").focus();
        return false;
    } else if ($.trim(updateemail_proveedor) == "") {
        alertify.set("notifier", "position", "top-center");
        alertify.error("Ingrese  email");
        $("#updateemail_proveedor").focus();
        return false;
    } else if ($.trim(updatetelefono_proveedor) == "") {
        alertify.set("notifier", "position", "top-center");
        alertify.error("Ingrese  telefono");
        $("#updatetelefono_proveedor").focus();
        return false;
    } else if ($.trim(updatearea_proveedor) == "") {
        alertify.set("notifier", "position", "top-center");
        alertify.error("Ingrese area");
        $("#updatearea_proveedor").focus();
        return false;
    } else if ($.trim(updatenombre_empresa_proveedor) == "") {
        alertify.set("notifier", "position", "top-center");
        alertify.error("Ingrese empresa");
        $("#updatenombre_empresa_proveedor").focus();
        return false;
    }
    else if ($.trim(updatecargo_proveedor) == "") {
        alertify.set("notifier", "position", "top-center");
        alertify.error("Ingrese cargo");
        $("#updatecargo_proveedor").focus();
        return false;
    }
    else if ($.trim(updateubicacion_proveedor) == "") {
        alertify.set("notifier", "position", "top-center");
        alertify.error("Ingrese ubicacion");
        $("#updateubicacion_proveedor").focus();
        return false;
    }
    else if ($.trim(updatedescripcion_proveedor) == "") {
        alertify.set("notifier", "position", "top-center");
        alertify.error("Ingrese descripcion");
        $("#updatedescripcion_proveedor").focus();
        return false;
    }
    else if ($.trim(updatetipo_producto_proveedor) == "") {
        alertify.set("notifier", "position", "top-center");
        alertify.error("Ingrese tipo producto");
        $("#updatetipo_producto_proveedor").focus();
        return false;
    }
    
    return true;
}



function registrarProveedorSuccess(){
    console.log('mostrarRegistrarLogin');
    $('#registrarProveedor').modal('hide');

}

function validarRutProveedor(){
    var Fn = {
        // Valida el rut con su cadena completa "XXXXXXXX-X"
        validaRut : function (rutCompleto) {
           if (!/^[0-9]+[-|‐]{1}[0-9kK]{1}$/.test( rutCompleto ))
              return false;
           var tmp 	= rutCompleto.split('-');
           var digv	= tmp[1]; 
           var rut 	= tmp[0];
           if ( digv == 'K' ) digv = 'k' ;
           return (Fn.dv(rut) == digv );
        },
        dv : function(T){
           var M=0,S=1;
           for(;T;T=Math.floor(T/10))
              S=(S+T%10*(9-M++%6))%11;
           return S?S-1:'k';
        }
     }
     rut = $('#rut_proveedor').val();
     console.log(rut);
     
  //alert( Fn.validaRut(valor_rut_login) ? 'RUT Valido' : 'RUT inválido');    
  if (Fn.validaRut(rut) == false){
    alertify
    .alert("Rut incorrecto", function(){
      alertify.error('Intente Denuevo');
    });
    $("#rut_proveedor").focus();
        return false;
        }
  else {
        console.log("rut valido")
        return true;
       }
};

function validarRutProveedorEditar(){
    var Fn = {
        // Valida el rut con su cadena completa "XXXXXXXX-X"
        validaRut : function (rutCompleto) {
           if (!/^[0-9]+[-|‐]{1}[0-9kK]{1}$/.test( rutCompleto ))
              return false;
           var tmp 	= rutCompleto.split('-');
           var digv	= tmp[1]; 
           var rut 	= tmp[0];
           if ( digv == 'K' ) digv = 'k' ;
           return (Fn.dv(rut) == digv );
        },
        dv : function(T){
           var M=0,S=1;
           for(;T;T=Math.floor(T/10))
              S=(S+T%10*(9-M++%6))%11;
           return S?S-1:'k';
        }
     }
     rut = $('#updaterut_proveedor').val();
     console.log(rut);
     
  //alert( Fn.validaRut(valor_rut_login) ? 'RUT Valido' : 'RUT inválido');    
  if (Fn.validaRut(rut) == false){
    alertify
    .alert("Rut incorrecto", function(){
      alertify.error('Intente Denuevo');
    });
    $("#updaterut_proveedor").focus();
        return false;
        }
  else {
        console.log("rut valido")
        return true;
       }
};

function validarMailProveedor(){
   
    valor = $('#email_proveedor').val();
 if (/^(([^<>()[\]\.,;:\s@\"]+(\.[^<>()[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/i.test(valor)){
    console.log("correo bien formato")
   return true;
 } else {
    alertify.error("Correo formato invalido")
    return false;
 }

}

function validarMailEditarProveedor(){

valor = $('#updateemail_proveedor').val();
if (/^(([^<>()[\]\.,;:\s@\"]+(\.[^<>()[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/i.test(valor)){
console.log("correo bien formato")
return true;
} else {
alertify.error("Correo formato invalido")
return false;
}

}


function validarIntegerEditarProveedor()
{
    var updatetelefono_proveedor = $("#updatetelefono_proveedor").val();
    
  if (isNaN(updatetelefono_proveedor)) 
  {
    alertify.error("El telefono debe ser un numero")
    return false;
  }else {
    return true;
  }
  
}


function validarIntegerAgregaProveedor()
{
    var telefono_proveedor = $("#telefono_proveedor").val();
    
  if (isNaN(telefono_proveedor)) 
  {
    alertify.error("El telefono debe ser un numero")
    return false;
  }else {
    return true;
  }
  
}