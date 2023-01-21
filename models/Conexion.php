<?php

/* Clase encargada de gestionar las conexiones a la base de datos */
Class Conexion{
   public static function conectar(){
        $host='190.114.253.237';
        $username='richi';
        $password='i61AWW3Yp6uD3JPGb53l';
        $data_base='postgres';
        try { 
        $conn = new PDO("pgsql:host=$host;port=5432;dbname=$data_base;user=$username;password=$password");
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        }
        catch( PDOException $exp){
         echo ("no se pudo conectar a la base de datos,".$exp);
        }
        return $conn;
   }

   /*Método para ejecutar una sentencia sql*/


}
?>