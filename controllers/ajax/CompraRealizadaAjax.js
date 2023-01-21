$(document).ready(function(){
    limpiarCarrito();
    
});

function limpiarCarrito(){
    var valor = [];
    // console.log(pagina_actual);
    valor.push({name: 'funcion', value: '9'});
    // valor.push({name: 'pagina_actual', value: pagina_actual});
    console.log(valor);
    var target = document.getElementById("correoCliente")
    $.ajax({
        type: "POST",
        url: "../../controllers/php/CarritoController.php",
        data: valor,
        dataType:'text',
        success: function (r) {
                    console.log(r);
                   target.innerHTML=r;
                   redirigirIndex();
                },    error : function(xhr, status) {
                    console.log(status);
                    console.log(xhr);
                    console.log(r)
                    console.log('Disculpe, existió un problema');
                },
        
    });
}

function redirigirIndex(){
    setTimeout(function(){
        window.location.href = '../index.php';
    }, 5000);
}
