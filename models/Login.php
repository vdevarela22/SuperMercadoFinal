<?php
require_once '../../../models/Conexion.php';
require_once '../../models/SQL/LoginSQL.php';

class Login extends Conexion
{

    //FUNCION INICIAR SESIÓN
    public static function __logear($datos)
    {
        try{
        // $shaPass=sha1($datos['contrasena_usuario']);
        $sql = LoginSQL::$iniciarSesion;
        $query = Conexion::conectar()->prepare($sql);
        $query->bindParam(':rut_usuario', $datos['rut_usuario'], PDO::PARAM_STR);
        $query->bindParam(':contrasena_usuario', $datos['contrasena_usuario'], PDO::PARAM_STR);
        $query->execute();
        $resultado = $query->fetch(PDO::FETCH_ASSOC);
        $count = $query->rowCount();
        if($count ==1){
            session_start();
            $_SESSION['area_usuario'] = $resultado['area_usuario'];
        }
        return $count;
        }
        catch (Exception $e) {
            echo 'Excepción capturada: ',  $e->getMessage(), "\n";
        }
    }




}