<?php
require_once '../../models/Conexion.php';
require_once '../../models/SQL/ClienteSQL.php';

class ClientePHP extends Conexion
{
    public static function registrarCliente($datos)
    {
        try {
            $sql = ClienteSQL:: $registrarCliente;
            $query = Conexion::conectar()->prepare($sql);

            
            $query->bindParam(':nombre_cliente', $datos['nombre_cliente'], PDO::PARAM_STR);
            $query->bindParam(':apellido_cliente', $datos['apellido_cliente'], PDO::PARAM_STR);
            $query->bindParam(':region_cliente', $datos['region_cliente'], PDO::PARAM_STR);
            $query->bindParam(':ciudad_cliente', $datos['ciudad_cliente'], PDO::PARAM_STR);
            $query->bindParam(':direccion_cliente', $datos['direccion_cliente'], PDO::PARAM_STR);
            $query->bindParam(':formato_casa_cliente', $datos['formato_casa_cliente'], PDO::PARAM_STR);
            $query->bindParam(':codigo_postal_cliente', $datos['codigo_postal_cliente'], PDO::PARAM_STR);
            $query->bindParam(':email_cliente', $datos['email_cliente'], PDO::PARAM_STR);
            $query->bindParam(':formato_pago_cliente', $datos['formato_pago_cliente'], PDO::PARAM_STR);
            session_start();
            
            $query->execute();
            $resultado = $query->fetch(PDO::FETCH_ASSOC);
            $_SESSION['id_cliente'] = $resultado['id_cliente'];
            return 1;
            // $resultado = $query->fetch(PDO::FETCH_ASSOC);
            // $count = $query->rowCount();
        } catch (Exception $e) {
            echo 'Excepción capturada: ', $e->getMessage();
        }
    }
}