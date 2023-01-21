// import "../../dist/jquery.js";

function selectEmpleadotable(pagina_actual) {
    
    var valor = [];
    valor.push({name: 'funcion', value: '0'});
    valor.push({name: 'pagina_actual', value: pagina_actual});
    console.log(valor);
    var target = document.getElementById("ID");   
    console.log(target)
    $.ajax({
        type: "POST",
        url: "../../controllers/php/EmpleadoController.php",
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
    

function registrarEmpleado() {
    if(validacion()== true && validarRut() == true && validarMailTrabajador() == true && validarIntegerAgregarTrabajador()){
        var formulario = $("#registrarEmpleado");
        var valor = $("#registrarEmpleado").serializeArray();
        valor.push({name: 'funcion', value: '1'});
        console.log(valor);   
        $.ajax({
            type: "POST",
            url: "../../controllers/php/EmpleadoController.php",
            data: valor,
            dataType:'json',
            success: function (r) {
                        if (r == 1) {
                            alertify.set("notifier", "position", "top-center");
                            alertify.success("INGRESADO CORRECTAMENTE");
                            registrarTrabajadorSuccess();
                            selectEmpleadotable(1);
                            document.getElementById("registrarEmpleado").reset();
                            
                        } else if(r == 2) {
                            alertify.set("notifier", "position", "top-center");
                            alertify.error("USUARIO YA REGISTRADO");
                        }                      
                        else {
                            alertify.set("notifier", "position", "top-center");
                            alertify.error("El usuario no se pudo agregar");
                        }
                    },
            
        });
      }
    }       

function eliminarEmpleado(id_usuario) {
    console.log(id_usuario)
    var valor = [];
    valor.push({name: 'funcion', value: '3'});
    valor.push({name: 'id_usuario', value: id_usuario})
    console.log(valor)


    alertify.confirm("Está seguro de querer eliminar?",
            function(){
                $.ajax({
                    type: "POST",
                    url: "../../controllers/php/EmpleadoController.php",
                    data: valor,
                    dataType:'text',
                    success: function (r) {
                                console.log("usuario eliminado"+r);
                                selectEmpleadotable(1);
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

function updateMostrarEmpleado(id_usuario){
    console.log(id_usuario);
    var valor = [];
    valor.push({name: 'funcion', value: '4'});
    valor.push({name: 'id_usuario', value: id_usuario})
    console.log(valor)

    $.ajax({
        type: "POST",
        url: "../../controllers/php/EmpleadoController.php",
        data: valor,
        dataType:'text',
        success: function (r) {
                    $info = JSON.parse(r);
                    console.log("usuario mostrar update"+$info['id_usuario']);
                    editarTrabajador();
                    $("#updateid_usuario").val($info['id_usuario']) 
                    $("#updatenombre_usuario").val($info['nombre_usuario']) 
                    $("#updateapellido_usuario").val($info['apellido_usuario']) 
                    $("#updaterut_usuario").val($info['rut_usuario'])
                    $("#updatecontrasena_usuario").val($info['contrasena_usuario']) 
                    $("#updateemail_usuario").val($info['email_usuario'])
                    $("#updatetelefono_usuario").val($info['telefono_usuario'])
                    $("#updateregion_usuario").val($info['region_usuario'])
                    $("#updateciudad_usuario").val($info['ciudad_usuario'])
                    $("#updatefecha_nacimiento_usuario").val($info['fecha_nacimiento_usuario'])
                    $("#updatedireccion_usuario").val($info['direccion_usuario'])
                    $("#updateestadocivil_usuario").val($info['estadocivil_usuario'])
                    $("#updatearea_usuario").val($info['area_usuario'])
                    $("#updatecargo_usuario").val($info['cargo_usuario'])
                    $("#updateubicacion_trabajo_usuario").val($info['ubicacion_trabajo_usuario'])
                    $("#updatefecha_inicio_usuario").val($info['fecha_inicio_usuario'])
                    $("#updatesueldo_usuario").val($info['sueldo_usuario'])
                    $("#updatehoras_trabajo_usuario").val($info['horas_trabajo_usuario'])
                },    error : function(xhr, status) {
                    console.log(status);
                    console.log(xhr);
                    console.log(r)
                    console.log('Disculpe, existió un problema');
                },
        
    });
}

function editarEmpleado(){
    if(validarEditarEmpleado()== true && validarRutupdate() == true && validarMailEditarTrabajador() == true && validarIntegerEditarTrabajador() == true){
    var valor = $("#formularioEditarEmpleado").serializeArray();
    //var id_usuario = $("#").val();
    updaterut_usuario = $("#updaterut_usuario").val()
    valor.push({name: 'funcion', value: '5'});
    valor.push({name: 'updaterut_usuario', value: updaterut_usuario});
    console.log(valor)

    $.ajax({
        type: "POST",
        url: "../../controllers/php/EmpleadoController.php",
        data: valor,
        dataType:'text',
        success: function (r) {
                    //$info = JSON.parse(r);
                    editarTrabajadorSuccess();
                    alertify.success("ACTUALIZADO CORRECTAMENTE");
                    selectEmpleadotable(1);
                    console.log("usuario EDITADO"+r);
                },    error : function(xhr, status) {
                    console.log(status);
                    console.log(xhr);
                    console.log(r)
                    console.log('Disculpe, existió un problema');
                },
        
    });
}
}

function buscarTrabajador(pagina_actual){
    var target = document.getElementById("ID");   
    rut_buscar = $("#buscarTrabajador").val()
    var valor = [];
    valor.push({name: 'rut_usuario', value: rut_buscar});
    valor.push({name: 'pagina_actual', value: pagina_actual});
    //var id_usuario = $("#").val();
    valor.push({name: 'funcion', value: '6'});
    console.log(valor)

    $.ajax({
        type: "POST",
        url: "../../controllers/php/EmpleadoController.php",
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

function recuperarTrabajadorTabla(pagina_actual) {
    var valor = [];
    valor.push({name: 'funcion', value: '7'});
    valor.push({name: 'pagina_actual', value: pagina_actual});
    console.log(valor);
    var target = document.getElementById("ID");   
    console.log(target)
    $.ajax({
        type: "POST",
        url: "../../controllers/php/EmpleadoController.php",
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

  function recuperarEmpleado(id_usuario) {
    console.log(id_usuario)
    var valor = [];
    valor.push({name: 'funcion', value: '8'});
    valor.push({name: 'id_usuario', value: id_usuario})
    console.log(valor)


    alertify.confirm("Está seguro de querer Recuperar?",
            function(){
                $.ajax({
                    type: "POST",
                    url: "../../controllers/php/EmpleadoController.php",
                    data: valor,
                    dataType:'text',
                    success: function (r) {
                                console.log("usuario recuperado"+r);
                                recuperarTrabajadorTabla(1);
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
function mostrarDetalleEmpleado(id_usuario){
    console.log(id_usuario);
    var valor = [];
    valor.push({name: 'funcion', value: '9'});
    valor.push({name: 'id_usuario', value: id_usuario})
    console.log(valor)

    $.ajax({
        type: "POST",
        url: "../../controllers/php/EmpleadoController.php",
        data: valor,
        dataType:'text',
        success: function (r) {
                    $info = JSON.parse(r);
                    mostrarTrabajador();
                    console.log("usuario mostrar update"+$info['id_usuario']);
                    $("#detalleid_usuario").val($info['id_usuario']) 
                    $("#detallenombre_usuario").val($info['nombre_usuario']) 
                    $("#detalleapellido_usuario").val($info['apellido_usuario']) 
                    $("#detallerut_usuario").val($info['rut_usuario'])
                    $("#detallecontrasena_usuario").val($info['contrasena_usuario']) 
                    $("#detalleemail_usuario").val($info['email_usuario'])
                    $("#detalletelefono_usuario").val($info['telefono_usuario'])
                    $("#detalleregion_usuario").val($info['region_usuario'])
                    $("#detalleciudad_usuario").val($info['ciudad_usuario'])
                    $("#detallefecha_nacimiento_usuario").val($info['fecha_nacimiento_usuario'])
                    $("#detalledireccion_usuario").val($info['direccion_usuario'])
                    $("#detalleestadocivil_usuario").val($info['estadocivil_usuario'])
                    $("#detallearea_usuario").val($info['area_usuario'])
                    $("#detallecargo_usuario").val($info['cargo_usuario'])
                    $("#detalleubicacion_trabajo_usuario").val($info['ubicacion_trabajo_usuario'])
                    $("#detallefecha_inicio_usuario").val($info['fecha_inicio_usuario'])
                    $("#detallesueldo_usuario").val($info['sueldo_usuario'])
                    $("#detallehoras_trabajo_usuario").val($info['horas_trabajo_usuario'])
                },    error : function(xhr, status) {
                    console.log(status);
                    console.log(xhr);
                    console.log(r)
                    console.log('Disculpe, existió un problema');
                },
        
    });
}

function mostrarTrabajador(){
    console.log('editarLogin');
    $('#mostrarTrabajador').modal('show');

}

function editarTrabajador(){
    console.log('editarLogin');
    $('#editarTrabajador').modal('show');

}

function editarTrabajadorSuccess(){
    console.log('editarLogin');
    $('#editarTrabajador').modal('hide');

}

function registrarTrabajadorSuccess(){
    console.log('mostrarRegistrarLogin');
    $('#registrarTrabajador').modal('hide');

}
//validaciones
function validacion() {
    var nombre_usuario = $("#nombre_usuario").val();
    var apellido_usuario = $("#apellido_usuario").val();
    var rut_usuario = $("#rut_usuario").val();
    var contrasena_usuario = $("#contrasena_usuario").val();
    var email_usuario = $("#email_usuario").val();
    var telefono_usuario = $("#telefono_usuario").val();
    var region_usuario = $("#region_usuario").val();
    var ciudad_usuario = $("#ciudad_usuario").val();
    var fecha_nacimiento_usuario = $("#fecha_nacimiento_usuario").val();
    var direccion_usuario = $("#direccion_usuario").val();
    var estadocivil_usuario = $("#estadocivil_usuario").val();
    var area_usuario = $("#area_usuario").val();
    var cargo_usuario = $("#cargo_usuario").val();
    var ubicacion_trabajo_usuario = $("#ubicacion_trabajo_usuario").val();
    var fecha_inicio_usuario = $("#fecha_inicio_usuario").val();
    var sueldo_usuario = $("#sueldo_usuario").val();
    var horas_trabajo_usuario = $("#horas_trabajo_usuario").val();
    if ($.trim(rut_usuario) == "") {
        alertify.set("notifier", "position", "top-center");
        alertify.error("Ingrese rut_usuario");
        $("#rut_usuario").focus();
        return false;
    } else if ($.trim(nombre_usuario) == "") {
        alertify.set("notifier", "position", "top-center");
        alertify.error("Ingrese nombre");
        $("#nombre_usuario").focus();
        return false;
    } else if ($.trim(apellido_usuario) == "") {
        alertify.set("notifier", "position", "top-center");
        alertify.error("Ingrese apellido");
        $("#apellido_usuario").focus();
        return false;
    } else if ($.trim(email_usuario) == "") {
        alertify.set("notifier", "position", "top-center");
        alertify.error("Ingrese  email");
        $("#email_usuario").focus();
        return false;
    } else if ($.trim(telefono_usuario) == "") {
        alertify.set("notifier", "position", "top-center");
        alertify.error("Ingrese  telefono");
        $("#telefono_usuario").focus();
        return false;
    } else if ($.trim(contrasena_usuario) == "") {
        alertify.set("notifier", "position", "top-center");
        alertify.error("Ingrese  contraseña");
        $("#contrasena_usuario").focus();
        return false;
    } else if ($.trim(region_usuario) == "") {
        alertify.set("notifier", "position", "top-center");
        alertify.error("Ingrese  region");
        $("#region_usuario").focus();
        return false;
    } else if ($.trim(ciudad_usuario) == "") {
        alertify.set("notifier", "position", "top-center");
        alertify.error("Ingrese ciudad");
        $("#ciudad_usuario").focus();
        return false;
    } else if ($.trim(fecha_nacimiento_usuario) == "") {
        alertify.set("notifier", "position", "top-center");
        alertify.error("Ingrese fecha de nacimiento");
        $("#fecha_nacimiento_usuario").focus();
        return false;
    } else if ($.trim(direccion_usuario) == "") {
        alertify.set("notifier", "position", "top-center");
        alertify.error("Ingrese dirección");
        $("#direccion_usuario").focus();
        return false;
    } else if ($.trim(estadocivil_usuario) == "") {
        alertify.set("notifier", "position", "top-center");
        alertify.error("Ingrese estado civil");
        $("#estadocivil_usuario").focus();
        return false;
    } else if ($.trim(area_usuario) == "") {
        alertify.set("notifier", "position", "top-center");
        alertify.error("Ingrese area");
        $("#area_usuario").focus();
        return false;
    } else if ($.trim(cargo_usuario) == "") {
        alertify.set("notifier", "position", "top-center");
        alertify.error("Ingrese cargo");
        $("#cargo_usuario").focus();
        return false;
    } else if ($.trim(ubicacion_trabajo_usuario) == "") {
        alertify.set("notifier", "position", "top-center");
        alertify.error("Ingrese ubicacion trabajo");
        $("#ubicacion_trabajo_usuario").focus();
        return false;
    } else if ($.trim(fecha_inicio_usuario) == "") {
        alertify.set("notifier", "position", "top-center");
        alertify.error("Ingrese fecha inicio");
        $("#fecha_inicio_usuario").focus();
        return false;
    } else if ($.trim(sueldo_usuario) == "") {
        alertify.set("notifier", "position", "top-center");
        alertify.error("Ingrese sueldo");
        $("#sueldo_usuario").focus();
        return false;
    } else if ($.trim(horas_trabajo_usuario) == "") {
        alertify.set("notifier", "position", "top-center");
        alertify.error("Ingrese horas de trabajo");
        $("#horas_trabajo_usuario").focus();
        return false;
    } 
    return true;
}

function validarEditarEmpleado() {
    var updatenombre_usuario = $("#updatenombre_usuario").val();
    var updateapellido_usuario = $("#updateapellido_usuario").val();
    var updaterut_usuario = $("#updaterut_usuario").val();
    var updatecontrasena_usuario = $("#updatecontrasena_usuario").val();
    var updateemail_usuario = $("#updateemail_usuario").val();
    var updatetelefono_usuario = $("#updatetelefono_usuario").val();
    var updateregion_usuario = $("#updateregion_usuario").val();
    var updateciudad_usuario = $("#updateciudad_usuario").val();
    var updatefecha_nacimiento_usuario = $("#updatefecha_nacimiento_usuario").val();
    var updatedireccion_usuario = $("#updatedireccion_usuario").val();
    var updateestadocivil_usuario = $("#updateestadocivil_usuario").val();
    var updatearea_usuario = $("#updatearea_usuario").val();
    var updatecargo_usuario = $("#updatecargo_usuario").val();
    var updateubicacion_trabajo_usuario = $("#updateubicacion_trabajo_usuario").val();
    var updatefecha_inicio_usuario = $("#updatefecha_inicio_usuario").val();
    var updatesueldo_usuario = $("#updatesueldo_usuario").val();
    var updatehoras_trabajo_usuario = $("#updatehoras_trabajo_usuario").val();
    if ($.trim(updaterut_usuario) == "") {
        alertify.set("notifier", "position", "top-center");
        alertify.error("Ingrese rut");
        $("#updaterut_usuario").focus();
        return false;
    } else if ($.trim(updatenombre_usuario) == "") {
        alertify.set("notifier", "position", "top-center");
        alertify.error("Ingrese nombre");
        $("#updatenombre_usuario").focus();
        return false;
    } else if ($.trim(updateapellido_usuario) == "") {
        alertify.set("notifier", "position", "top-center");
        alertify.error("Ingrese apellido");
        $("#updateapellido_usuario").focus();
        return false;
    } else if ($.trim(updateemail_usuario) == "") {
        alertify.set("notifier", "position", "top-center");
        alertify.error("Ingrese  email");
        $("#updateemail_usuario").focus();
        return false;
    } else if ($.trim(updatetelefono_usuario) == "") {
        alertify.set("notifier", "position", "top-center");
        alertify.error("Ingrese  telefono");
        $("#updatetelefono_usuario").focus();
        return false;
    } else if ($.trim(updatecontrasena_usuario) == "") {
        alertify.set("notifier", "position", "top-center");
        alertify.error("Ingrese  contraseña");
        $("#updatecontrasena_usuario").focus();
        return false;
    } else if ($.trim(updateregion_usuario) == "") {
        alertify.set("notifier", "position", "top-center");
        alertify.error("Ingrese  region");
        $("#updateregion_usuario").focus();
        return false;
    } else if ($.trim(updateciudad_usuario) == "") {
        alertify.set("notifier", "position", "top-center");
        alertify.error("Ingrese ciudad");
        $("#updateciudad_usuario").focus();
        return false;
    } else if ($.trim(updatefecha_nacimiento_usuario) == "") {
        alertify.set("notifier", "position", "top-center");
        alertify.error("Ingrese fecha de nacimiento");
        $("#updatefecha_nacimiento_usuario").focus();
        return false;
    } else if ($.trim(updatedireccion_usuario) == "") {
        alertify.set("notifier", "position", "top-center");
        alertify.error("Ingrese dirección");
        $("#updatedireccion_usuario").focus();
        return false;
    } else if ($.trim(updateestadocivil_usuario) == "") {
        alertify.set("notifier", "position", "top-center");
        alertify.error("Ingrese estado civil");
        $("#updateestadocivil_usuario").focus();
        return false;
    } else if ($.trim(updatearea_usuario) == "") {
        alertify.set("notifier", "position", "top-center");
        alertify.error("Ingrese area");
        $("#updatearea_usuario").focus();
        return false;
    } else if ($.trim(updatecargo_usuario) == "") {
        alertify.set("notifier", "position", "top-center");
        alertify.error("Ingrese cargo");
        $("#updatecargo_usuario").focus();
        return false;
    } else if ($.trim(updateubicacion_trabajo_usuario) == "") {
        alertify.set("notifier", "position", "top-center");
        alertify.error("Ingrese ubicacion trabajo");
        $("#updateubicacion_trabajo_usuario").focus();
        return false;
    } else if ($.trim(updatefecha_inicio_usuario) == "") {
        alertify.set("notifier", "position", "top-center");
        alertify.error("Ingrese fecha inicio");
        $("#updatefecha_inicio_usuario").focus();
        return false;
    } else if ($.trim(updatesueldo_usuario) == "" ) {
        console.log(updatesueldo_usuario)
        alertify.set("notifier", "position", "top-center");
        alertify.error("Ingrese sueldo válido");
        $("#updatesueldo_usuario").focus();
        return false;
    } else if ($.trim(updatehoras_trabajo_usuario) == "") {
        alertify.set("notifier", "position", "top-center");
        alertify.error("Ingrese horas de trabajo valido");
        $("#updatehoras_trabajo_usuario").focus();
        return false;
    } 
    return true;
}


function validarEmail(valor) {
    emailRegex = /^[-\w.%+]{1,64}@(?:[A-Z0-9-]{1,63}\.){1,125}[A-Z]{2,63}$/i;
    if (emailRegex.test(valor)) {
        return true;
    } else {
        alertify.set("notifier", "position", "top-center");
        alertify.warning("Formato de Email no existe: xyz@dominio.com");
        $('#email').focus();
        return false;
    }
}


function validarRut(){
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
     rut = $('#rut_usuario').val();
     console.log(rut);
     
  //alert( Fn.validaRut(valor_rut_login) ? 'RUT Valido' : 'RUT inválido');    
  if (Fn.validaRut(rut) == false){
    alertify
    .alert("Rut incorrecto", function(){
      alertify.error('Intente Denuevo');
    });
    $("#rut_usuario").focus();
        return false;
        }
  else {
        console.log("rut valido")
        return true;
       }
};

function validarRutupdate(){
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
     rut = $('#updaterut_usuario').val();
     
  //alert( Fn.validaRut(valor_rut_login) ? 'RUT Valido' : 'RUT inválido');    
  if (Fn.validaRut(rut) == false){
    alertify
    .alert("Rut incorrecto", function(){
      alertify.error('Intente Denuevo');
    });
    $("#updaterut_usuario").focus();
        return false;
        }
  else {
        console.log("rut valido")
        return true;
       }
};



  function validarMailTrabajador(){
   
        valor = $('#email_usuario').val();
     if (/^(([^<>()[\]\.,;:\s@\"]+(\.[^<>()[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/i.test(valor)){
        console.log("correo bien formato")
       return true;
     } else {
        alertify.error("Correo formato invalido")
        return false;
     }
    
  }

  function validarMailEditarTrabajador(){
   
    valor = $('#updateemail_usuario').val();
 if (/^(([^<>()[\]\.,;:\s@\"]+(\.[^<>()[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/i.test(valor)){
    console.log("correo bien formato")
   return true;
 } else {
    alertify.error("Correo formato invalido")
    return false;
 }

}

// function validarIntegerEditarTrabajador(){
//     var updatesueldo_usuario = $("#updatesueldo_usuario").val();
//     console.log(updatesueldo_usuario)
//     if( Number.isInteger(updatesueldo_usuario) == true){
//         return true
//     }else if(Number.isInteger(updatesueldo_usuario) == false ){
//         alertify.error("Ingrese una cifra valida")
//         return false
//     }
// }


function validarIntegerAgregarTrabajador()
{
    var horas_trabajo_usuario = $("#horas_trabajo_usuario").val();
    var sueldo_usuario = $("#sueldo_usuario").val();
    var telefono_usuario = $("#telefono_usuario").val();
  if (isNaN(sueldo_usuario)) 
  {
    alertify.error("el sueldo debe ser un numero")
    return false;
  }else if(isNaN(horas_trabajo_usuario)) {
    alertify.error("Las horas debe ser un numero")
    return false;
  }else if(isNaN(telefono_usuario)) {
    alertify.error("El telefono debe ser un numero")
    return false;
  }else {
    return true;
  }
  
}

function validarIntegerEditarTrabajador()
{
    var updatesueldo_usuario = $("#updatesueldo_usuario").val();
    var updatehoras_trabajo_usuario = $("#updatehoras_trabajo_usuario").val();
    var updatetelefono_usuario = $("#updatetelefono_usuario").val();
  if (isNaN(updatesueldo_usuario)) 
  {
    alertify.error("el sueldo debe ser un numero")
    return false;
  }else if(isNaN(updatehoras_trabajo_usuario)) {
    alertify.error("Las horas debe ser un numero")
    return false;
  }else if(isNaN(updatetelefono_usuario)) {
    alertify.error("El telefono debe ser un numero")
    return false;
  }else {
    return true;
  }
  
}