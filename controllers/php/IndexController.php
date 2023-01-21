<?php
require_once "../../models/PHP/IndexPHP.php";


 if ($_POST['funcion'] == 0){
    $pagina_actual = $_POST['pagina_actual'];
    $res = IndexPHP::mostrarProductoTienda($pagina_actual);
    echo $res;
    return $res;
    echo json_encode($res);   
 }elseif($_POST['funcion'] == 1){

    $_POST['valor']; 
    $datos = array(
     'id_producto' => $_POST['id_producto'],
     'cantidad' => $_POST['cantidad'],
     'valor' => $_POST['valor'],
     );
     $res = IndexPHP::agregarAlCarrito($datos);
     echo $res;
     return $res;
     echo json_encode($res);   
  }elseif($_POST['funcion'] == 2){
     echo $res = IndexPHP::crearCarrito();
  }elseif($_POST['funcion'] == 3){
     echo $res = IndexPHP::mostrarProductosRecomendados();
  }elseif($_POST['funcion'] == 4){
     $datos = array(
         'productoBuscado' => $_POST['productoBuscado'],
     );
     echo $res = IndexPHP::buscarProductoCliente($datos);
  }
   
   