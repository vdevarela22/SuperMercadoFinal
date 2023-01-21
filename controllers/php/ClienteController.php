<?php
require_once "../../models/PHP/ClientePHP.php";

if ($_POST['funcion'] == 0){
   $res = ClientePHP::selectClientetable();
   echo $res;
   return $res;
   // echo json_encode($res);   
}elseif ($_POST['funcion'] == 1){
   
   
$datos = array(
   'nombre_cliente' => $_POST['nombre_cliente'],
   'apellido_cliente' => $_POST['apellido_cliente'],
   'region_cliente' => $_POST['region_cliente'],
   'ciudad_cliente' => $_POST['ciudad_cliente'],
   'direccion_cliente' => $_POST['direccion_cliente'],
   'formato_casa_cliente' => $_POST['formato_casa_cliente'],
   'codigo_postal_cliente' => $_POST['codigo_postal_cliente'],
   'email_cliente' => $_POST['email_cliente'],
   'formato_pago_cliente' => $_POST['formato_pago_cliente']
);
$res = ClientePHP::registrarCliente($datos);
   echo $res;
   
}

?>