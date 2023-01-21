<?php
require_once "../../models/PHP/EmpleadoPHP.php";


if ($_POST['funcion'] == 0){
   $pagina_actual = $_POST['pagina_actual'];
   $res = EmpleadoPHP::selectEmpleadotable($pagina_actual);
   echo $res;
   return $res;
   // echo json_encode($res);   
}elseif ($_POST['funcion'] == 1){
   
   
$datos = array(
   'nombre_usuario' => $_POST['nombre_usuario'],
   'apellido_usuario' => $_POST['apellido_usuario'],
   'rut_usuario' => $_POST['rut_usuario'],
   'contrasena_usuario' => $_POST['contrasena_usuario'],
   'email_usuario' => $_POST['email_usuario'],
   'telefono_usuario' => $_POST['telefono_usuario'],
   'region_usuario' => $_POST['region_usuario'],
   'ciudad_usuario' => $_POST['ciudad_usuario'],
   'fecha_nacimiento_usuario' => $_POST['fecha_nacimiento_usuario'],
   'direccion_usuario' => $_POST['direccion_usuario'],
   'estadocivil_usuario' => $_POST['estadocivil_usuario'],
   'area_usuario' => $_POST['area_usuario'],
   'cargo_usuario' => $_POST['cargo_usuario'],
   'ubicacion_trabajo_usuario' => $_POST['ubicacion_trabajo_usuario'],
   'fecha_inicio_usuario' => $_POST['fecha_inicio_usuario'],
   'sueldo_usuario' => $_POST['sueldo_usuario'],
   'horas_trabajo_usuario' => $_POST['horas_trabajo_usuario'],
   'habilitado_usuario' => 1,
);
$res = EmpleadoPHP::registrarEmpleado($datos);
   echo $res;
}elseif ($_POST['funcion'] == 3){
   
   
   $datos = array(
      'id_usuario' => $_POST['id_usuario'],
   );
   echo "los datos son:". $_POST['id_usuario'];
   $res = EmpleadoPHP::eliminarEmpleado($datos);
   echo $res;
}elseif ($_POST['funcion'] == 4){
   
   
   $datos = array(
      'id_usuario' => $_POST['id_usuario'],
   );
   $res = EmpleadoPHP::updateMostrarEmpleado($datos);
   echo $res;
}elseif ($_POST['funcion'] == 5){
   
   
   $datos = array(
      'id_usuario' => $_POST['updateid_usuario'],
      'nombre_usuario' => $_POST['updatenombre_usuario'],
      'apellido_usuario' => $_POST['updateapellido_usuario'],
      'rut_usuario' => $_POST['updaterut_usuario'],
      'contrasena_usuario' => $_POST['updatecontrasena_usuario'],
      'email_usuario' => $_POST['updateemail_usuario'],
      'telefono_usuario' => $_POST['updatetelefono_usuario'],
      'region_usuario' => $_POST['updateregion_usuario'],
      'ciudad_usuario' => $_POST['updateciudad_usuario'],
      'fecha_nacimiento_usuario' => $_POST['updatefecha_nacimiento_usuario'],
      'direccion_usuario' => $_POST['updatedireccion_usuario'],
      'estadocivil_usuario' => $_POST['updateestadocivil_usuario'],
      'area_usuario' => $_POST['updatearea_usuario'],
      'cargo_usuario' => $_POST['updatecargo_usuario'],
      'ubicacion_trabajo_usuario' => $_POST['updateubicacion_trabajo_usuario'],
      'fecha_inicio_usuario' => $_POST['updatefecha_inicio_usuario'],
      'sueldo_usuario' => $_POST['updatesueldo_usuario'],
      'horas_trabajo_usuario' => $_POST['updatehoras_trabajo_usuario'],
      'habilitado_usuario' => 1,
   );
   $res = EmpleadoPHP::editarEmpleado($datos);
   echo $res;
   }

   elseif ($_POST['funcion'] == 6){
   
   
      $datos = array(
         'rut_usuario' => $_POST['rut_usuario'],
         'pagina_actual' => $_POST['pagina_actual'],
      );
      $res = EmpleadoPHP::buscarEmpleado($datos);
      echo $res;
      }   elseif ($_POST['funcion'] == 7){
         $pagina_actual = $_POST['pagina_actual'];
         $res = EmpleadoPHP::recuperarTrabajadorTabla($pagina_actual);
         echo $res;
         } elseif ($_POST['funcion'] == 8){
   
             
   $datos = array(
      'id_usuario' => $_POST['id_usuario'],
   );
   echo "los datos son:". $_POST['id_usuario'];
   $res = EmpleadoPHP::recuperarEmpleado($datos);
   echo $res;
}elseif ($_POST['funcion'] == 9){
   
   
   $datos = array(
      'id_usuario' => $_POST['id_usuario'],
   );
   $res = EmpleadoPHP::updateMostrarEmpleado($datos);
   echo $res;
}
?>