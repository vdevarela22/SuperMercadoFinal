<?php
require 'vendor/autoload.php';
use Transbank\Webpay\WebpayPlus\Transaction;
$amount = 1;
//$transaction = new \Transbank\Webpay\WebpayPlus\Transaction();
$transaction = new Transaction();
// Por simplicidad de este ejemplo, este es nuestro "controlador" que define que vamos a hacer dependiendo del parametro ?action= de la URL.
$response = $transaction->create('ordertest', 1, $amount, 'http://test2.local/php/compraCompleta.php');

 $url= $response->getUrl();
 $token = $response->getToken();
?>

<html>
<head>

<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.82.0">
    <title>Ventas Juanito</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/sign-in/">

    <link rel="stylesheet" href="../../bootstrap-5.0.0-beta3-dist/css/bootstrap.min.css"/>
    <script src="../../js/funciones.js"></script>
    <!-- JS BOOTSTRAP -->
    <script src="../../jquery/jquery.min.v3.6.0.js"></script>
    <script src="../../bootstrap-5.0.0-beta3-dist/js/bootstrap.min.js"></script>
    <!-- JS BOOTSTRAP -->

    </head>
    
    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
      .ancho {
          width:100% !important;
      }
    </style>

    
    <body class="text-center">
    
    <main class="form-signin">
    
        <h1 class="h3 mb-3 fw-normal">¡Bienvenido a SuperMercado Juanito!</h1>
        <img class="mb-4" src="../../imagenes/logo manzana.jfif" alt="" width="300" height="300">
        <h1 class="h3 mb-3 fw-normal">A UN SOLO CLICK DE TERMINAR LA COMPRA</h1>
    <div class="row inline-block">
    <?php
      
  
        
        echo "<form method='post' action=$url>
        
          <input type='hidden' id='token_ws' name='token_ws' value='$token' />
          <input class='btn btn-primary btn-lg btn-block'type='submit' value='Ir a pagar' />
        </form>";
            
      
    
    ?>
    </div>
    
    
    
    
        <p class="mt-5 mb-3 text-muted">&copy; 2021</p>
    
    </main>
    
    
        
      </body>


</html>