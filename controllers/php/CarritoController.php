<?php
require_once "../../models/Carrito.php";

if ($_POST['funcion'] == 0){
   $res = Carrito::verCarrito();
   echo $res;
   return $res;
   // echo json_encode($res);   
}elseif($_POST['funcion'] == 9){
    $res = Carrito::limpiarCarrito();
    return $res;
    // echo json_encode($res);   
 } elseif($_POST['funcion'] == 2){
    $datos =array(
        'id_producto' => $_POST['id_producto'],
    );
    $res = Carrito::eliminarProductoCarrito($datos);
    return $res;
    // echo json_encode($res);   
 } elseif($_POST['funcion'] == 3){
    $datos =array(
        'cantidad' => $_POST['cantidad'],
        'id_producto' => $_POST['id_producto'],
    );
    $res = Carrito::modificarProductoCarrito($datos);
    return $res;
    // echo json_encode($res);   
 } 

