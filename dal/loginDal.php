<?php
require_once '../../../models/Conexion.php';
require_once '../../../models/Usuario.php';

//Data Access Layer

class LoginDal extends Conexion
{

    //FUNCION INICIAR SESIÓN
    public static function __logear(Usuario $usuario)
    {
        $rut_usuario = $usuario->get_rut_usuario();
        $contrasena_usuario =  $usuario->get_contrasena_usuario();

        try{
        // $shaPass=sha1($datos['contrasena_usuario']);
        $sql = 'select rut_usuario, contrasena_usuario, area_usuario from empleado where rut_usuario like :rut_usuario and contrasena_usuario like :contrasena_usuario and habilitado_usuario = true';
        $query = Conexion::conectar()->prepare($sql);
        $query->bindParam(':rut_usuario', $rut_usuario, PDO::PARAM_STR);
        $query->bindParam(':contrasena_usuario', $contrasena_usuario , PDO::PARAM_STR);
        $query->execute();
        $resultado = $query->fetch(PDO::FETCH_ASSOC);
        return $resultado;

        //$count = $query->rowCount();

        //return $count;
        }
        catch (Exception $e) {
            echo 'Excepción capturada: ',  $e->getMessage(), "\n";
        }
    }
}
?>