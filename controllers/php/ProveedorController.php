<?php
require_once "../../models/PHP/ProveedorPHP.php";


if ($_POST['funcion'] == 0){
   $pagina_actual = $_POST['pagina_actual'];
   echo $pagina_actual;
   $res = ProveedorPHP::selectProveedortable($pagina_actual);
   echo $res;
   
   // echo json_encode($res);   
}elseif ($_POST['funcion'] == 1){
   
   
$datos = array(

   'id_usuario' => 1,
   'rut_proveedor' => $_POST['rut_proveedor'],
   'nombre_proveedor' => $_POST['nombre_proveedor'],
   'email_proveedor' => $_POST['email_proveedor'],
   'telefono_proveedor' => $_POST['telefono_proveedor'],
   'area_proveedor' => $_POST['area_proveedor'],
   'nombre_empresa_proveedor' => $_POST['nombre_empresa_proveedor'],
   'cargo_proveedor' => $_POST['cargo_proveedor'],
   'ubicacion_proveedor' => $_POST['ubicacion_proveedor'],
   'descripcion_proveedor' => $_POST['descripcion_proveedor'],
   'tipo_producto_proveedor' => $_POST['tipo_producto_proveedor'],
   'habilitado_proveedor' => 1,

);
$res = ProveedorPHP::registrarProveedor($datos);
   echo $res;
}

elseif ($_POST['funcion'] == 3){
   $datos=array(
     'id_proveedor' => $_POST['id_proveedor'],

   );
   $res = ProveedorPHP::eliminarProveedor($datos);
   echo $res;
}

elseif ($_POST['funcion'] == 6){


   $datos = array(
      'nombre_proveedor' => $_POST['nombre_proveedor'],
      'pagina_actual' => $_POST['pagina_actual'],
   );
   $res = ProveedorPHP::buscarProveedor($datos);
   echo $res;
   } 
   
   elseif ($_POST['funcion'] == 5){
      
      
      $datos = array(

         'updaterut_proveedor' => $_POST['updaterut_proveedor'],
         'updatenombre_proveedor' => $_POST['updatenombre_proveedor'],
         'updateemail_proveedor' => $_POST['updateemail_proveedor'],
         'updatearea_proveedor' => $_POST['updatearea_proveedor'],
         'updatetelefono_proveedor' => $_POST['updatetelefono_proveedor'],
         'updatenombre_empresa_proveedor' => $_POST['updatenombre_empresa_proveedor'],
         'updatecargo_proveedor' => $_POST['updatecargo_proveedor'],
         'updateubicacion_proveedor' => $_POST['updateubicacion_proveedor'],
         'updatedescripcion_proveedor' => $_POST['updatedescripcion_proveedor'],
         'updatetipo_producto_proveedor' => $_POST['updatetipo_producto_proveedor'],
         'updateid_proveedor' => $_POST['updateid_proveedor'],


      );
      $res = ProveedorPHP::editarProveedor($datos);
      echo $res;
      }

      elseif ($_POST['funcion'] == 4){
   
   
         $datos = array(
            'id_proveedor' => $_POST['id_proveedor'],
         );
         $res = ProveedorPHP::updateMostrarProveedor($datos);
         echo $res;
      }
      if ($_POST['funcion'] == 7){
         $pagina_actual = $_POST['pagina_actual'];
         $res = ProveedorPHP::recuperarProveedorTabla($pagina_actual);
         echo $res;
         return $res;
         // echo json_encode($res);   
      }
            elseif ($_POST['funcion'] == 8){
   
             
               $datos = array(
                  'id_proveedor' => $_POST['id_proveedor'],
               );
               echo "los datos son:". $_POST['id_proveedor'];
               $res = ProveedorPHP::recuperarProveedor($datos);
               echo $res;
            }

?>