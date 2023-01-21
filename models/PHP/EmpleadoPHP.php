<?php
require_once '../../models/Conexion.php';
require_once '../../models/SQL/EmpleadoSQL.php';

class EmpleadoPHP extends Conexion
{
    public static function registrarEmpleado($datos)
    {
        try{

            $sql0 = EmpleadoSQL::$existeEmpleado;
            $query0 = Conexion::conectar()->prepare($sql0);
            $query0->bindParam(':rut_usuario', $datos['rut_usuario'], PDO::PARAM_STR);
            $query0->execute();
            $resultado0 = $query0->fetchAll(PDO::FETCH_ASSOC);
            $existeRut = 0;
        foreach ($resultado0 as $resultado0){
            $existeRut = $resultado0['rut_usuario'];

        }

        if($existeRut != $datos['rut_usuario']){

        // $shaPass=sha1($datos['contrasena_usuario']);
        $sql = EmpleadoSQL::$registrarEmpleado;
        $query = Conexion::conectar()->prepare($sql);
        $query->bindParam(':nombre_usuario', $datos['nombre_usuario'], PDO::PARAM_STR);
        $query->bindParam(':apellido_usuario', $datos['apellido_usuario'], PDO::PARAM_STR);
        $query->bindParam(':rut_usuario', $datos['rut_usuario'], PDO::PARAM_STR);
        $query->bindParam(':contrasena_usuario', $datos['contrasena_usuario'], PDO::PARAM_STR);
        $query->bindParam(':email_usuario', $datos['email_usuario'], PDO::PARAM_STR);
        $query->bindParam(':telefono_usuario', $datos['telefono_usuario'], PDO::PARAM_STR);
        $query->bindParam(':region_usuario', $datos['region_usuario'], PDO::PARAM_STR);
        $query->bindParam(':ciudad_usuario', $datos['ciudad_usuario'], PDO::PARAM_STR);
        $query->bindParam(':fecha_nacimiento_usuario', $datos['fecha_nacimiento_usuario'], PDO::PARAM_STR);
        $query->bindParam(':direccion_usuario', $datos['direccion_usuario'], PDO::PARAM_STR);
        $query->bindParam(':estadocivil_usuario', $datos['estadocivil_usuario'], PDO::PARAM_STR);
        $query->bindParam(':area_usuario', $datos['area_usuario'], PDO::PARAM_STR);
        $query->bindParam(':cargo_usuario', $datos['cargo_usuario'], PDO::PARAM_STR);
        $query->bindParam(':ubicacion_trabajo_usuario', $datos['ubicacion_trabajo_usuario'], PDO::PARAM_STR);
        $query->bindParam(':fecha_inicio_usuario', $datos['fecha_inicio_usuario'], PDO::PARAM_STR);
        $query->bindParam(':sueldo_usuario', $datos['sueldo_usuario'], PDO::PARAM_STR);
        $query->bindParam(':horas_trabajo_usuario', $datos['horas_trabajo_usuario'], PDO::PARAM_STR);
        $query->bindParam(':habilitado_usuario', $datos['habilitado_usuario'], PDO::PARAM_STR);
        return $query->execute();
        // $resultado = $query->fetch(PDO::FETCH_ASSOC);
        // $count = $query->rowCount();
        }    else{
        echo 2;
        } 
        }   catch (Exception $e) {
            echo 'Excepción capturada: ',  $e->getMessage();
        }
    }


    public static function selectEmpleadotable($pagina_var)
    {   
        //$rut_adm = "11111111-1";
        //$dato = 2;
        try{
        // $shaPass=sha1($datos['contrasena_usuario']);
        $sql = EmpleadoSQL::$selectEmpleadotable;
        $query = Conexion::conectar()->prepare($sql);
        $query->execute();
        $resultado = $query->fetchAll(PDO::FETCH_ASSOC);
        $filas = 10;
        $pagina_actual=$pagina_var;   
        $iniciar = ($pagina_actual-1)*$filas;
        $numero = $query->rowCount();
         $n = 1;       

        $sql2 = EmpleadoSQL:: $selectEmpleadotablePagination.$iniciar.''; 
        $query2 = Conexion::conectar()->prepare($sql2);
        $query2->execute();
        $resultado = $query2->fetchAll(PDO::FETCH_ASSOC);
        echo '    <div class="col-12">
            <table class="table">
            <thead class="table-dark">
                <tr>
                    <th class="w-5">#</th>
                    <th class="w-15">RUT</th>
                    <th class="w-15">Nombre</th>
                    <th class="w-15">Apellido</th>
                    <th class="w-15">Correo</th>
                    <th class="w-35">Opción</th>
                </tr>
            </thead>
            ';
        echo '<tbody class="table-light">';
        foreach ($resultado as $row2){

        echo "<tr>";
        echo "  <td>".$n."</td>";
        echo "  <td>".$row2['rut_usuario']."</td>";
        echo "  <td>".$row2['nombre_usuario']."</td>";
        echo "  <td>".$row2['apellido_usuario']."</td>";
        echo "  <td>".$row2['email_usuario']."</td>";
        echo "  <td>";
        echo "      <button class='btn btn-info' onclick='mostrarDetalleEmpleado(".$row2['id_usuario'].")'>MOSTRAR</button>";
        echo "      <button class='btn btn-warning' onclick='updateMostrarEmpleado(".$row2['id_usuario'].")'>Editar</button>";
        echo "      <button class='btn btn-danger'  onclick='eliminarEmpleado(".$row2['id_usuario'].")'>ELIMINAR</button>";
        echo "</td>";
        echo "</tr>";
        $n++;
        }
        echo "</tbody>";
        echo "</table>";
        echo "</div>";
        echo "</div>";
        echo "<br>";
        $paginas = ceil($numero/$filas);
        echo '<div class="row text-center paginador">';
        echo '<div class="mx-auto col-12 paginador >';
        echo '<nav aria-label="Page navigation example"">
                <ul class="pagination justify-content-center">';
                echo '<li class="page-item ';
        
                echo $pagina_actual <= 1 ? 'disabled">' : '">';
                    
                echo '<a class="page-link" onclick="selectEmpleadotable('.($pagina_actual - 1).')" aria-label="Previous">
                        <span aria-hidden="true">&laquo;</span>
                    </a>
                    </li>';
                    for($i=1; $i<=$paginas; $i++){
                    echo ' <li class="page-item ';
                    
                    echo $pagina_actual == $i ? 'active">' : '">' ;
                    echo'<a class="page-link" onclick="selectEmpleadotable('.($i).')">'.($i).'</a></li>';
                    }
                  
        
        
                    echo '<li class="page-item ';
        
        echo $pagina_actual >= $paginas ? 'disabled">' : '">';
                    echo '<a class="page-link" onclick="selectEmpleadotable('.($pagina_actual + 1).')" aria-label="next">
                    <span aria-hidden="true">&laquo;</span>
                    </a>
                    </li>
                </ul>
                </nav>';
        echo '</div>';
        echo '</div>';
        echo '</div>';
        //$resultado = $query->fetch(PDO::FETCH_ASSOC);
        // $count = $query->rowCount();
        }
        catch (Exception $e) {
            echo 'Excepción capturada: ',  $e->getMessage();
        }
    }



    public static function eliminarEmpleado($datos)
    {
        try{
            $sql = EmpleadoSQL::$eliminarEmpleado;
            $query = Conexion::conectar()->prepare($sql);
            $query->bindParam(':id_usuario', $datos["id_usuario"], PDO::PARAM_INT);
            $query->execute();
        } catch (Exception $e) {
            echo 'Excepción capturada: ',  $e->getMessage();
        }
    }



    public static function updateMostrarEmpleado($datos)
    {
        try{
            $sql = EmpleadoSQL::$updateMostrarEmpleado;
            $query = Conexion::conectar()->prepare($sql);

            $query->bindParam(':id_usuario', $datos["id_usuario"], PDO::PARAM_INT);
            $query->execute();
            $resultado = $query->fetch(PDO::FETCH_ASSOC);

            $info =[
                'id_usuario' => $resultado['id_usuario'],
                'nombre_usuario' => $resultado['nombre_usuario'],
                'apellido_usuario' => $resultado['apellido_usuario'],
                'nombre_usuario' => $resultado['nombre_usuario'],
                'rut_usuario' => $resultado['rut_usuario'],
                'contrasena_usuario' => $resultado['contrasena_usuario'],
                'email_usuario' => $resultado['email_usuario'],
                'telefono_usuario' => $resultado['telefono_usuario'],
                'region_usuario' => $resultado['region_usuario'],
                'ciudad_usuario' => $resultado['ciudad_usuario'],
                'fecha_nacimiento_usuario' => $resultado['fecha_nacimiento_usuario'],
                'direccion_usuario' => $resultado['direccion_usuario'],
                'estadocivil_usuario' => $resultado['estadocivil_usuario'],
                'area_usuario' => $resultado['area_usuario'],
                'cargo_usuario' => $resultado['cargo_usuario'],
                'ubicacion_trabajo_usuario' => $resultado['ubicacion_trabajo_usuario'],
                'fecha_inicio_usuario' => $resultado['fecha_inicio_usuario'],
                'sueldo_usuario' => $resultado['sueldo_usuario'],
                'horas_trabajo_usuario' => $resultado['horas_trabajo_usuario'],
            ];
            echo json_encode($info);
        }
        //$resultado = $query->fetch(PDO::FETCH_ASSOC);
        // $count = $query->rowCount();
        
        catch (Exception $e) {
            echo 'Excepción capturada: ',  $e->getMessage();
        }
    }


    public static function editarEmpleado($datos)
    {
        try{
    
        echo $sql = EmpleadoSQL::$editarEmpleado;
        $query = Conexion::conectar()->prepare($sql);
    
        $query->bindParam(':nombre_usuario', $datos['nombre_usuario'], PDO::PARAM_STR);
        $query->bindParam(':rut_usuario', $datos['rut_usuario'], PDO::PARAM_STR);
        $query->bindParam(':apellido_usuario', $datos['apellido_usuario'], PDO::PARAM_STR);
        $query->bindParam(':contrasena_usuario', $datos['contrasena_usuario'], PDO::PARAM_STR);
        $query->bindParam(':email_usuario', $datos['email_usuario'], PDO::PARAM_STR);
        $query->bindParam(':telefono_usuario', $datos['telefono_usuario'], PDO::PARAM_STR);
        $query->bindParam(':region_usuario', $datos['region_usuario'], PDO::PARAM_STR);
        $query->bindParam(':ciudad_usuario', $datos['ciudad_usuario'], PDO::PARAM_STR);
        $query->bindParam(':fecha_nacimiento_usuario', $datos['fecha_nacimiento_usuario'], PDO::PARAM_STR);
        $query->bindParam(':direccion_usuario', $datos['direccion_usuario'], PDO::PARAM_STR);
        $query->bindParam(':estadocivil_usuario', $datos['estadocivil_usuario'], PDO::PARAM_STR);
        $query->bindParam(':area_usuario', $datos['area_usuario'], PDO::PARAM_STR);
        $query->bindParam(':cargo_usuario', $datos['cargo_usuario'], PDO::PARAM_STR);
        $query->bindParam(':ubicacion_trabajo_usuario', $datos['ubicacion_trabajo_usuario'], PDO::PARAM_STR);
        $query->bindParam(':fecha_inicio_usuario', $datos['fecha_inicio_usuario'], PDO::PARAM_STR);
        $query->bindParam(':sueldo_usuario', $datos['sueldo_usuario'], PDO::PARAM_STR);
        $query->bindParam(':horas_trabajo_usuario', $datos['horas_trabajo_usuario'], PDO::PARAM_STR);
        $query->bindParam(':id_usuario', $datos['id_usuario'], PDO::PARAM_STR);
        
        return $query->execute();
       
        }
        catch (Exception $e) {
            echo 'Excepción capturada: ',  $e->getMessage();
        }
    }


    public static function buscarEmpleado($datos)
    {   $pagina_var = intval($datos['pagina_actual']);
        $rut_usuario = "%".$datos['rut_usuario']."%";
        try{
            
            // $shaPass=sha1($datos['contrasena_usuario']);
            $sql = EmpleadoSQL::$buscarEmpleado;
            $query = Conexion::conectar()->prepare($sql);
            $query->bindParam(':rut_usuario', $rut_usuario, PDO::PARAM_STR);
            $query->execute();
            $filas = 10;
            $pagina_actual=$pagina_var;   
            $iniciar = ($pagina_actual-1)*$filas;
            $numero = $query->rowCount();
            //$query->fetch(PDO::FETCH_ASSOC);
            $resultado = $query->fetchAll(PDO::FETCH_ASSOC);
            $sql2 = EmpleadoSQL::$buscarEmpleadoPagination.$iniciar.'';
           
            $query2 = Conexion::conectar()->prepare($sql2);
            $query2->bindParam(':rut_usuario', $rut_usuario, PDO::PARAM_STR);
            $query2->execute();
            $resultado = $query2->fetchAll(PDO::FETCH_ASSOC);
            $n = 1;
            echo '    <div class="col-12">
            <table class="table">
            <thead class="table-dark">
                <tr>
                    <th class="w-5">#</th>
                    <th class="w-15">RUT</th>
                    <th class="w-15">Nombre</th>
                    <th class="w-15">Apellido</th>
                    <th class="w-15">Correo</th>
                    <th class="w-35">Opción</th>
                </tr>
            </thead>
            ';
            echo '<tbody class="table-light">';
            if($count = $query2->rowCount()){
                foreach($resultado as $resultado){
                echo "<tr>";
                echo "  <td>".$n."</td>";
                echo "  <td>".$resultado['rut_usuario']."</td>";
                echo "  <td>".$resultado['nombre_usuario']."</td>";
                echo "  <td>".$resultado['apellido_usuario']."</td>";
                echo "  <td>".$resultado['email_usuario']."</td>";
                echo "  <td>";
                echo "      <button class='btn btn-info' onclick='mostrarDetalleEmpleado(".$resultado['id_usuario'].")'>MOSTRAR</button>";
                echo "      <button class='btn btn-warning' onclick='updateMostrarEmpleado(".$resultado['id_usuario'].")'>Editar</button>";
                echo "      <button class='btn btn-danger'  onclick='eliminarEmpleado(".$resultado['id_usuario'].")'>ELIMINAR</button>";
                echo "</td>";
                echo "</tr>";
                $n++;
                }
            }else{
                echo "<tr>";
                echo "  <td></td>";
                echo "  <td></td>";
                echo "  <td></td>";
                echo "  <td></td>";
                echo "  <td></td>";
                echo "  <td>";
                echo "      <button class='btn btn-warning' onclick='updateMostrarEmpleado()'>Editar</button>";
                echo "      <button class='btn btn-danger'  onclick='eliminarEmpleado()'>ELIMINAR</button>";
                echo "</td>";
                echo "</tr>";

            }
            echo "</tbody>";
            echo "</table>";
            echo "</div>";
            echo "</div>";
            echo "<br>";
            $paginas = ceil($numero/$filas);
            echo '<div class="row text-center paginador">';
            echo '<div class="mx-auto col-12 paginador >';
            echo '<nav aria-label="Page navigation example"">
                    <ul class="pagination justify-content-center">';
                    echo '<li class="page-item ';
            
                    echo $pagina_actual <= 1 ? 'disabled">' : '">';
                        
                    echo '<a class="page-link" onclick="buscarTrabajador('.($pagina_actual - 1).')" aria-label="Previous">
                            <span aria-hidden="true">&laquo;</span>
                        </a>
                        </li>';
                        for($i=1; $i<=$paginas; $i++){
                        echo ' <li class="page-item ';
                        
                        echo $pagina_actual == $i ? 'active">' : '">' ;
                        echo'<a class="page-link" onclick="buscarTrabajador('.($i).')">'.($i).'</a></li>';
                        }
                      
            
            
                        echo '<li class="page-item ';
            
            echo $pagina_actual >= $paginas ? 'disabled">' : '">';
                        echo '<a class="page-link" onclick="buscarTrabajador('.($pagina_actual + 1).')" aria-label="next">
                        <span aria-hidden="true">&laquo;</span>
                        </a>
                        </li>
                    </ul>
                    </nav>';
            echo '</div>';
            echo '</div>';
            echo '</div>';
            
            
            
            //$resultado = $query->fetch(PDO::FETCH_ASSOC);
            // $count = $query->rowCount();
            }
            catch (Exception $e) {
                echo 'Excepción capturada: ',  $e->getMessage();
            }
        }



        public static function recuperarTrabajadorTabla($pagina_var)
        {
            try{
            // $shaPass=sha1($datos['contrasena_usuario']);
            $sql = EmpleadoSQL::$recuperarEmpleadoTabla;
            $query = Conexion::conectar()->prepare($sql);
            $query->execute();
            $resultado = $query->fetchAll(PDO::FETCH_ASSOC);
            $filas = 10;
            $pagina_actual=intval($pagina_var);   
            $iniciar = ($pagina_actual-1)*$filas;
            $numero = $query->rowCount(); 
            $sql2 = EmpleadoSQL::$recuperarEmpleadoTablaPagination.$iniciar.'';
           
            $query2 = Conexion::conectar()->prepare($sql2);
            $query2->execute();
            $resultado = $query2->fetchAll(PDO::FETCH_ASSOC);  
             $n = 1; 
             echo '    <div class="col-12">
             <table class="table">
             <thead class="table-dark">
                 <tr>
                     <th class="w-5">#</th>
                     <th class="w-15">RUT</th>
                     <th class="w-15">Nombre</th>
                     <th class="w-15">Apellido</th>
                     <th class="w-15">Coreeo</th>
                     <th class="w-35">Opción</th>
                 </tr>
             </thead>
             ';
         echo '<tbody class="table-light">';      
            foreach ($resultado as $row){
            
            echo "<tr>";
            echo "  <td>".$n."</td>";
            echo "  <td>".$row['rut_usuario']."</td>";
            echo "  <td>".$row['nombre_usuario']."</td>";
            echo "  <td>".$row['apellido_usuario']."</td>";
            echo "  <td>".$row['email_usuario']."</td>";
            echo "  <td>";
            echo "      <button class='btn btn-info' onclick='recuperarEmpleado(".$row['id_usuario'].")'>RECUPERAR</button>";
            echo "</td>";
            echo "</tr>";
            $n++;
            }
            echo "</tbody>";
            echo "</table>";
            echo "</div>";
            echo "</div>";
            echo "<br>";
            $paginas = ceil($numero/$filas);
            echo '<div class="row text-center paginador">';
            echo '<div class="mx-auto col-12 paginador >';
            echo '<nav aria-label="Page navigation example"">
                    <ul class="pagination justify-content-center">';
                    echo '<li class="page-item ';
            
                    echo $pagina_actual <= 1 ? 'disabled">' : '">';
                        
                    echo '<a class="page-link" onclick="recuperarTrabajadorTabla('.($pagina_actual - 1).')" aria-label="Previous">
                            <span aria-hidden="true">&laquo;</span>
                        </a>
                        </li>';
                        for($i=1; $i<=$paginas; $i++){
                        echo ' <li class="page-item ';
                        
                        echo $pagina_actual == $i ? 'active">' : '">' ;
                        echo'<a class="page-link" onclick="recuperarTrabajadorTabla('.($i).')">'.($i).'</a></li>';
                        }
                      
            
            
                        echo '<li class="page-item ';
            
            echo $pagina_actual >= $paginas ? 'disabled">' : '">';
                        echo '<a class="page-link" onclick="recuperarTrabajadorTabla('.($pagina_actual + 1).')" aria-label="next">
                        <span aria-hidden="true">&laquo;</span>
                        </a>
                        </li>
                    </ul>
                    </nav>';
            echo '</div>';
            echo '</div>';
            echo '</div>';
            //$resultado = $query->fetch(PDO::FETCH_ASSOC);
            // $count = $query->rowCount();
            }
            catch (Exception $e) {
                echo 'Excepción capturada: ',  $e->getMessage();
            }
        }

        public static function recuperarEmpleado($datos) {
            try{

                $sql = EmpleadoSQL::$recuperarEmpleado;
                $query = Conexion::conectar()->prepare($sql);

                $query->bindParam(':id_usuario', $datos["id_usuario"], PDO::PARAM_INT);
                
                echo $query->execute();
            } catch (Exception $e) {
                echo 'Excepción capturada: ',  $e->getMessage();
            }
        }
}