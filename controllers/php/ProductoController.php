<?php
require_once "../../models/PHP/ProductoPHP.php";



if ($_POST['funcion'] == 0){
   echo $pagina_actual = $_POST['pagina_actual'];
   $res = ProductoPHP::selectProductotable($pagina_actual);
   echo $res;
   return $res;
   // echo json_encode($res);   
}elseif ($_POST['funcion'] == 1){
   
   
$datos = array(
   
   'id_proveedor' => $_POST['id_proveedor'],
   'id_categoria' => $_POST['id_categoria'],
   'nombre_producto' => $_POST['nombre_producto'],
   'codigo_producto' => $_POST['codigo_producto'],
   'descripcion_producto' => $_POST['descripcion_producto'],
   'precio_producto' => $_POST['precio_producto'],
   'cantidad' => $_POST['cantidad'],
);
$res = ProductoPHP::registrarProducto($datos);
   echo $res;
}
elseif ($_POST['funcion'] == 3){
   $datos=array(
      'id_producto' => $_POST['id_producto'],

   );
   $res = ProductoPHP::eliminarProducto($datos);
   echo $res;
}

elseif ($_POST['funcion'] == 6){


   $datos = array(
      'nombre_producto' => $_POST['nombre_producto'],
      'pagina_actual' => $_POST['pagina_actual'],
   );
   $res = ProductoPHP::buscarProducto($datos);
   echo $res;
   } 
   
   elseif ($_POST['funcion'] == 5){
      
      
      $datos = array(
         'id_producto' => $_POST['updateid_producto'],
         'id_proveedor' => $_POST['updateid_proveedor_producto'],
         'id_categoria' => $_POST['updateid_categoria'],
         'nombre_producto' => $_POST['updatenombre_producto'],
         'codigo_producto' => $_POST['updatecodigo_producto'],
         'descripcion_producto' => $_POST['updatedescripcion_producto'],
         'precio_producto' => $_POST['updateprecio_producto'],
         'cantidad' => $_POST['updatecantidad'],
         'habilitado_producto' => 1,
      );
      $res = ProductoPHP::editarProducto($datos);
      echo $res;
      }

      elseif ($_POST['funcion'] == 4){
   
   
         $datos = array(
            'id_producto' => $_POST['id_producto'],
         );
         $res = ProductoPHP::updateMostrarProducto($datos);
         echo $res;
      }


      
      if ($_POST['funcion'] == 7){
         $pagina_actual = $_POST['pagina_actual'];
         $res = ProductoPHP::recuperarProductoTabla($pagina_actual);
         echo $res;
         return $res;
         // echo json_encode($res);   
      }
            elseif ($_POST['funcion'] == 8){
   
             
               $datos = array(
                  'id_producto' => $_POST['id_producto'],
               );
               echo "los datos son:". $_POST['id_producto'];
               $res = ProductoPHP::recuperarProducto($datos);
               echo $res;
            } elseif ($_POST['funcion'] == 9){
               $res = ProductoPHP::cargarAgregaProducto();
               echo $res;
            }elseif ($_POST['funcion'] == 10){
               $res = ProductoPHP::cargarAgregaProducto2();
               echo $res;
            }








?>