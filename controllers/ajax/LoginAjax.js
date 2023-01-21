function login() {
    console.log("hola");
    if (validacion() == true && validarRut() == true) {
        var valor = $("#loginform").serialize();
        $.ajax({
            type: "POST",
            url: "../../controllers/php/auth/loginUser.php",
            data: valor,
            cache: false,
            success: function (r) {
                if (r == 1) {
                    window.location.href = "../../views/administrador.php";                    
                } else {
                    alertify
                    .alert("Usuario o contraseña incorrecta", function(){
                      alertify.error('Intente Denuevo');
                    });
                }
            }
        });
    }
}

//validaciones
function validacion() {

    var rut = $("#rut_usuario").val();
    var contrasena = $("#contrasena_usuario").val();
    if ($.trim(rut) == "") {
        alertify
        .alert("Ingrese Rut", function(){
            alertify.message('OK');
         });
        $("#rut").focus();
        return false;
    } else if ($.trim(contrasena) == "") {
        alertify
        .alert("Ingrese Contraseña", function(){
            alertify.message('OK');
        });
        $("#contrasena").focus();
        return false;
    }
    return true;

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
     
  //alert( Fn.validaRut(valor_rut_login) ? 'RUT Valido' : 'RUT inválido');    
  if (Fn.validaRut(rut) == false){
    alertify
    .alert("Rut incorrecto", function(){
      alertify.error('Intente Denuevo');
    });
        return false;
        }
  else {
        console.log("rut valido")
        return true;
       }
};