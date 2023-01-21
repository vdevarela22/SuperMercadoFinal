  

function registrarCliente() {
    console.log("hola");
    if(validacionCliente()== true && validarMailCliente() == true && validarIntegerAgregarCliente() == true){
        var vector = []
   
    
        nombre_cliente = $("#nombre_cliente").val();
        apellido_cliente = $("#apellido_cliente").val();
        region_cliente = $("#region_cliente").val();
        ciudad_cliente = $("#ciudad_cliente").val();
        direccion_cliente = $("#direccion_cliente").val();
        formato_casa_cliente = $("#formato_casa_cliente").val();
        codigo_postal_cliente = $("#codigo_postal_cliente").val();
        email_cliente = $("#email_cliente").val();
        formato_pago_cliente = $("#formato_pago_cliente").val();
        cadena={
            
            "nombre_cliente": nombre_cliente,
            "apellido_cliente": apellido_cliente,
            "region_cliente": region_cliente,
            "ciudad_cliente": ciudad_cliente,
            "direccion_cliente": direccion_cliente,
            "formato_casa_cliente": formato_casa_cliente,
            "codigo_postal_cliente": codigo_postal_cliente,
            "email_cliente": email_cliente,
            "formato_pago_cliente": formato_pago_cliente,
            "funcion": 1
        }
        
        var valor = $("#registrarCliente").serializeArray();
        valor.push({name: 'funcion', value: '1'});
        console.log(cadena);   
        $.ajax({
            type: "POST",
            url: "../../controllers/php/ClienteController.php",
            data: cadena,
            dataType:'json',
            success: function (r) {
                        if (r == 1) {
                            console.log(r);
                            alertify.set("notifier", "position", "top-center");
                            alertify.success("INGRESADO CORRECTAMENTE");
                            document.getElementById("botonWebpay").disabled = false;
                            
                        } else {
                            console.log("hola2");
                            alertify.set("notifier", "position", "top-center");
                            alertify.error("El Cliente no se pudo agregar");
                        }
                    },
            
        });
      }
    }       


    function validacionCliente() {
        var nombre_cliente = $("#nombre_cliente").val();
        var apellido_cliente = $("#apellido_cliente").val();
        var region_cliente = $("#region_cliente").val();
        var ciudad_cliente = $("#ciudad_cliente").val();
        var direccion_cliente = $("#direccion_cliente").val();
        var formato_casa_cliente = $("#formato_casa_cliente").val();
        var codigo_postal_cliente = $("#codigo_postal_cliente").val();
        var email_cliente = $("#email_cliente").val();
        if ($.trim(nombre_cliente) == "") {
            alertify.set("notifier", "position", "top-center");
            alertify.error("Ingrese nombre cliente");
            $("#nombre_cliente").focus();
            return false;
        } else if ($.trim(apellido_cliente) == "") {
            alertify.set("notifier", "position", "top-center");
            alertify.error("Ingrese apellido cliente");
            $("#apellido_cliente").focus();
            return false;
        } else if ($.trim(region_cliente) == "") {
            alertify.set("notifier", "position", "top-center");
            alertify.error("Ingrese region cliente");
            $("#region_cliente").focus();
            return false;
        } else if ($.trim(ciudad_cliente) == "") {
            alertify.set("notifier", "position", "top-center");
            alertify.error("Ingrese  ciudad cliente");
            $("#ciudad_cliente").focus();
            return false;
        } else if ($.trim(direccion_cliente) == "") {
            alertify.set("notifier", "position", "top-center");
            alertify.error("Ingrese  direccion cliente");
            $("#direccion_cliente").focus();
            return false;
        } else if ($.trim(formato_casa_cliente) == "") {
            alertify.set("notifier", "position", "top-center");
            alertify.error("Ingrese  formato casa cliente");
            $("#formato_casa_cliente").focus();
            return false;
        } else if ($.trim(codigo_postal_cliente) == "") {
            alertify.set("notifier", "position", "top-center");
            alertify.error("Ingrese  codigo postal cliente");
            $("#codigo_postal_cliente").focus();
            return false;
        } else if ($.trim(email_cliente) == "") {
            alertify.set("notifier", "position", "top-center");
            alertify.error("Ingrese email cliente");
            $("#email_cliente").focus();
            return false;
        }
        return true;
    }

    
function validarMailCliente(){
   
    valor = $('#email_cliente').val();
 if (/^(([^<>()[\]\.,;:\s@\"]+(\.[^<>()[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/i.test(valor)){
    console.log("correo bien formato")
   return true;
 } else {
    alertify.error("Correo formato invalido")
    return false;
 }

}

function validarIntegerAgregarCliente()
{
    var codigo_postal_cliente = $("#codigo_postal_cliente").val();
    
  if (isNaN(codigo_postal_cliente)) 
  {
    alertify.error("el codigo postal debe ser un numero")
    return false;
  }else {
    return true;
  }
  
}
