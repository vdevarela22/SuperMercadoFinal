$(document).ready(function(){
    mostrarTotal();
});

function mostrarTotal(){
    var valor = [];
    valor.push({name: 'funcion', value: '0'});
    var target = document.getElementById("webpay")
    $.ajax({
        type: "POST",
        url: "../../controllers/php/FinalizarCompraController.php",
        data: valor,
        dataType:'text',
        success: function (r) {
                    $info = JSON.parse(r);
                    console.log($info);
                    document.getElementById("totalCarrito").value = $info['total'];
                    target.innerHTML = $info['webpay'];

                },    error : function(xhr, status) {
                    console.log(status);
                    console.log(xhr);
                    console.log(r)
                    console.log('Disculpe, existió un problema');
                },
        
    }); 
}