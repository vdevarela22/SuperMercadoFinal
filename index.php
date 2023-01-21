<?php

?>


<head>
    <title>Super Mercado</title>
<head>
<body>
    <div class="container-fluid bg-warning">
        <div class="row">
           
        
        <div class="col-4 text-sm" style="font-family: 'Arial Black', sans-serif; color: black;">
    <a>¡SUPERMERCADO NACIONAL!</a>
    <p class="text-muted" style="font-family: 'Arial Black', sans-serif; color: black;" >Compra todo lo que necesitas</p>
</div>

            <div class="col-4">
                <div class="input-group mb-3">
                    <input id="buscarProductoCliente" type="text" class="form-control" placeholder="Buscar nombre del producto" aria-label="Recipient's username" aria-describedby="basic-addon2">
                    <button onclick="buscarProductoCliente()" class="btn btn-dark">Buscar</button>
                </div>
            </div>
            <div class="col-1">
            </div>
            <div class="col-1">
            <div class="dropdown">
                <button class="btn btn-dark btn-lg float-right text-aling- right" data-bs-toggle="dropdown"><img src="/dist/images/logo.png" width="30px" height="30px"></button>
                <ul class="dropdown-menu">
                    <button class="btn btn-primary btn-lg btn-block w-100" onclick="location.href='/views/carrito.php'">Pagar</button>
                </ul>
                </div>
            </div>
        </div>
    </div>
    <br>
    <div class="container-fluid bg-dark">
        <div class="row">
            <div id="productosRecomendados">
            </div>
        </div>
    </div>
    <br>
    
        
            <div id="productoMostrarTienda">
            </div>
            
       
    </div>

    <link href="bootstrap-5.2.2-dist/css/bootstrap.min.css" rel="stylesheet" >
    <link href="/dist/css/style.css" rel="stylesheet" >
    <script src="bootstrap-5.2.2-dist/js/bootstrap.bundle.min.js"></script>
    <script src="/dist/js/jquery.js"></script>
    <script src="/dist/js/popper.min.js"></script>
    <script src="/dist/js/functions.js"></script>
    <script src="controllers/ajax/IndexAjax.js"></script>
    <script src="/dist/alertifyjs/alertify.min.js"></script>
    
    <!-- CSS -->
    <link rel="stylesheet" href="/dist/alertifyjs/css/alertify.min.css"/>
    <!-- Default theme -->
    <link rel="stylesheet" href="/dist/alertifyjs/css/themes/default.min.css"/>
    <!-- Semantic UI theme -->
    <link rel="stylesheet" href="/dist/alertifyjs/css/themes/semantic.min.css"/>
    <!-- Bootstrap theme -->
    <link rel="stylesheet" href="/dist/alertifyjs/css/themes/bootstrap.min.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<body>