$(document).ready(function(){
    MostrarProductoTienda(1);
    crearCarrito();
    MostrarProductoRecomendado();
});

function crearCarrito(){
    var valor = [];
    valor.push({name: 'funcion', value: '2'});
    $.ajax({
        type: "POST",
        url: "../../controllers/php/IndexController.php",
        data: valor,
        dataType:'text',
        success: function (r) {
                    console.log("carrito_creado");
                },    error : function(xhr, status) {
                    console.log(status);
                    console.log(xhr);
                    console.log(r)
                    console.log('Disculpe, existió un problema');
                },
        
    });
}

function restarProductoIndex(id_producto){
    cantidad = $("#"+id_producto+"").val();
    if (cantidad > 1){
        $("#"+id_producto+"").val(cantidad - 1) ;
    }else{
        $("#"+id_producto+"").val(1) ;
    }
    
}


function sumarProductoIndex(id_producto){
    cantidad = parseInt($("#"+id_producto+"").val());
    if (cantidad >= 1){
        $("#"+id_producto+"").val(cantidad+parseInt(1)) ;
    }else{
        $("#"+id_producto+"").val(1) ;
    }
}

function MostrarProductoTienda(pagina_actual) {
    var valor = [];
    
    console.log(pagina_actual);
    valor.push({name: 'funcion', value: 'mostrarProductos'});
    valor.push({name: 'pagina_actual', value: pagina_actual});
    console.log(valor);
      var target = document.getElementById("productoMostrarTienda")
    
    $.ajax({
        type: "POST",
        url: "../../controllers/php/IndexController.php",
        data: valor,
        dataType:'text',
        success: function (r) {
                    resultado = JSON.parse(r);
                    console.log(resultado);
                    largo = resultado.length;
                    console.log(length)
                    console.log(r);
                    var html = `            <div class="container-fluid bg-warning">
                    <div class="row">`; 
                    for (i=0; i<largo; i++){
                        console.log(resultado[i].id_producto)
 
                        html += `           
                         <div class="col-3 text-center container d-flex align-items-center justify-content-center">
                                <div class="card" style="width: 18rem;">
                                <h5></h5>
                                <img class="card-img-top" src="images/cerveza.webp" alt="Card image cap">
                                <div class="card-body d-grid gap-2">
                                    <h5 class="card-title">`+resultado[i].nombre_producto+`</h5>
                                    <div class="d-inline">
                                    <span id="'`+resultado[i].id_producto+`1`+`" onclick="seleccionarRecomendacion(`+resultado[i].id_producto+`.1`+`);" class="fa fa-star"></span>
 
                                    </div>
                                    <h3>`+resultado[i].precio_producto+`</h3>
                                    <div class="input-group">
                                        <button onclick="restarProductoIndex(`+resultado[i].id_producto+`)" class="input-group-text">-</button>
                                        <input id=`+resultado[i].id_producto+` type="text" aria-label="First name" class="form-control text-center" value="1">
                                        <button onclick="sumarProductoIndex(`+resultado[i].id_producto+`)"class="input-group-text">+</button>
                                    </div>
                                    <br>
                                    <button onclick="agregarAlCarrito(`+resultado[i].id_producto+`)" type="button" class="btn btn-primary btn-lg btn-block">Agregar</button>
                                </div>
                                </div>
                            </div>`
            
                       

                    }

                    html +=`</div>
                         </div>
                        </div>`;
                        target.innerHTML = html
                },    error : function(xhr, status) {
                    console.log(status);
                    console.log(xhr);
                    console.log(r)
                    console.log('Disculpe, existió un problema');
                },
        
    });
  }

  
function buscarProductoCliente() {
    var valor = [];
    console.log();
    var productoBuscado = $('#buscarProductoCliente').val()
    valor.push({name: 'funcion', value: '4'});
    valor.push({name: 'productoBuscado', value: productoBuscado});
    console.log(valor);
    var target = document.getElementById("productoMostrarTienda")
    
    $.ajax({
        type: "POST",
        url: "../../controllers/php/IndexController.php",
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


  function MostrarProductoRecomendado() {
    var valor = [];
    valor.push({name: 'funcion', value: '3'});
    console.log(valor);
      var target = document.getElementById("productosRecomendados")
    
    $.ajax({
        type: "POST",
        url: "../../controllers/php/IndexController.php",
        data: valor,
        dataType:'text',
        success: function (r) {
                    console.log(r);
                    console.log("funcionando")
                   target.innerHTML=r;
                },    error : function(xhr, status) {
                    console.log(status);
                    console.log(xhr);
                    console.log(r)
                    console.log('Disculpe, existió un problema');
                },
        
    });
  }


function agregarAlCarrito(id_producto){
    cantidad =  parseInt($("#"+id_producto+"").val());
    id_producto = id_producto;
    //getvalor = 0;
    //getvalor = window.valor;
    valor=0;
    for(i=1; i<=5; i++){
        id_temp = String(id_producto+'.'+i);
        element = document.getElementById(id_temp)
        if(element.classList.contains("checked") == true){
            valor = i;
        }
    }
    console.log(valor);
   
    cadena ={
        "funcion": "agregarCarrito",
        "cantidad": cantidad,
        "id_producto": id_producto,
        "valor": valor,
    }
    $.ajax({
        type: "POST",
        url: "../../controllers/php/IndexController.php",
        data: cadena,
        dataType:'text',
        success: function (r) {
                if(r == 1){
                    alertify.success("PRODUCTO AGREGADO AL CARRITO ;D");
                }else if(r==2){
                    alertify.error("Producto ya agregado al Carrito :S");
                }
                
                   
                },    error : function(xhr, status) {
                    console.log(status);
                    console.log(xhr);
                    console.log(r)
                    console.log('Disculpe, existió un problema');
                },
        
    });
}

function seleccionarRecomendacion(data){
    console.log(data);
    var datos = String(data);
    console.log(datos);
    info = datos.split('.');
    window.valor = info[1];
    id = info[0];
    console.log(valor);
    console.log(id);
    var target = document.getElementById(data)
    target.addEventListener('click', function handleClick() {
        for(i=1; i<=5; i++){
            id_nueva = String(id+'.'+i);
            console.log(id_nueva);
            element = document.getElementById(String(id+'.'+i))
            element.classList.remove("checked");    
            console.log(element+'se removio')
        }
        for(i=1; i<=parseInt(valor); i++){
            element = document.getElementById(String(id+'.'+i))
            console.log(element+'este se eligio')
            element.classList.add("checked");    
        }
      });
}