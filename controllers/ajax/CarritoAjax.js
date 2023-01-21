$(document).ready(function(){
    verCarrito();

    
});

function verCarrito() {
    var valor = [];
    // console.log(pagina_actual);
    valor.push({name: 'funcion', value: '0'});
    // valor.push({name: 'pagina_actual', value: pagina_actual});
    console.log(valor);
      var target = document.getElementById("verCarrito")
    
    $.ajax({
        type: "POST",
        url: "../../controllers/php/CarritoController.php",
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

  function eliminarProductoCarrito(id_producto) {
    var valor = [];
    // console.log(pagina_actual);
    valor.push({name: 'funcion', value: '2'});
    valor.push({name: 'id_producto', value: id_producto});
    console.log(valor);
    
    $.ajax({
        type: "POST",
        url: "../../controllers/php/CarritoController.php",
        data: valor,
        dataType:'text',
        success: function (r) {
                    console.log(r);
                    verCarrito();
                },    error : function(xhr, status) {
                    console.log(status);
                    console.log(xhr);
                    console.log(r)
                    console.log('Disculpe, existió un problema');
                },
        
    });
  }

  function restarProductoCarrito(id_producto){
    cantidad = $("#"+id_producto+"").val();
    if (cantidad > 1){
        $("#"+id_producto+"").val(cantidad - 1) ;
    }else{
        $("#"+id_producto+"").val(1) ;
    }
    cantidad = $("#"+id_producto+"").val();
    var valor = [];
    valor.push({name: 'funcion', value: '3'});
    valor.push({name: 'cantidad', value: cantidad});
    valor.push({name: 'id_producto', value: id_producto});
    console.log(valor);
    $.ajax({
        type: "POST",
        url: "../../controllers/php/CarritoController.php",
        data: valor,
        dataType:'text',
        success: function (r) {
                    console.log(r);
                    verCarrito();
                },    error : function(xhr, status) {
                    console.log(status);
                    console.log(xhr);
                    console.log(r)
                    console.log('Disculpe, existió un problema');
                },
        
    });
  }
    



function sumarProductoCarrito(id_producto){
    cantidad = parseInt($("#"+id_producto+"").val());
    if (cantidad >= 1){
        $("#"+id_producto+"").val(cantidad+parseInt(1)) ;
    }else{
        $("#"+id_producto+"").val(1) ;
    }
    cantidad = $("#"+id_producto+"").val();
    var valor = [];
    valor.push({name: 'funcion', value: '3'});
    valor.push({name: 'cantidad', value: cantidad});
    valor.push({name: 'id_producto', value: id_producto});
    console.log(valor);
    $.ajax({
        type: "POST",
        url: "../../controllers/php/CarritoController.php",
        data: valor,
        dataType:'text',
        success: function (r) {
                    console.log(r);
                    verCarrito();
                },    error : function(xhr, status) {
                    console.log(status);
                    console.log(xhr);
                    console.log(r)
                    console.log('Disculpe, existió un problema');
                },
        
    });
  }
    

