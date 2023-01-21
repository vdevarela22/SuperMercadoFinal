import ("../capadenegocios/cn.login.js");

class usuario {

    constructor(){
      this.a = new enviarDatos()
    }
    static iniciarSesion(vaue) {
     var rut = $("#rut").val();
     var contrasena = $("#contrasena").val();
        console.log(contrasena);
        console.log(rut);
       asd = this.a.asd(rut, contrasena);
      }
    }

document.getElementById('ingresarLogin').addEventListener('click', usuario.iniciarSesion())