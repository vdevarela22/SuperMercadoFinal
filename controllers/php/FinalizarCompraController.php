<?php
require_once "../../models/Carrito.php";

//funcion "0|1|2|3" es enviado por ajax donde:
//0=SELECT EMPLEADOS TABLA
//1=Registrar
//2=UPDATE
//3=DELETE

if ($_POST['funcion'] == 0){
   $res = Carrito::mostrarTotal();
   echo $res;
   // echo json_encode($res);   
}
   