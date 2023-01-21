<?php
require_once '../../models/Conexion.php';
require_once '../../models/SQL/ProveedorSQL.php';

class ProveedorPHP extends Conexion
{
    public static function selectProveedortable($datos)
    {
        $pagina_var = intval($datos);
        try{
            
            $sql = ProveedorSQL::$selectProveedortable;
            $query = Conexion::conectar()->prepare($sql);
            $query->execute();
            $filas = 10;
            $pagina_actual=$pagina_var;   
            $iniciar = ($pagina_actual-1)*$filas;
            $numero = $query->rowCount();
            //$query->fetch(PDO::FETCH_ASSOC);
            $resultado = $query->fetchAll(PDO::FETCH_ASSOC);
            $sql2 = ProveedorSQL::$selectProveedorPagination.$iniciar.'';
           
            $query2 = Conexion::conectar()->prepare($sql2);
            $query2->execute();
            $resultado = $query2->fetchAll(PDO::FETCH_ASSOC);
            $n = 1;
            echo '    <div class="col-12">
            <table class="table">
            <thead class="table-dark">
                <tr>
                    <th class="w-5">ID</th>
                    <th class="w-15">Rut</th>
                    <th class="w-15">Nombre</th>
                    <th class="w-35">Email</th>
                    <th class="w-35">Telefono</th>
                    <th class="w-35">Area</th>
                    <th class="w-35">Empresa</th>
                    <th class="w-35">Cargo</th>
                    <th class="w-35">Ubicacion</th>
                    <th class="w-35">Tipo de proveedor</th>
                    <th class="w-35">Opciones</th>
                </tr>
            </thead>
            ';
            echo '<tbody class="table-light">';
            if($count = $query2->rowCount()){
                foreach($resultado as $resultado){
                echo "<tr>";
                echo "  <td>".$resultado['id_proveedor']."</td>";
                echo "  <td>".$resultado['rut_proveedor']."</td>";
                echo "  <td>".$resultado['nombre_proveedor']."</td>";
                echo "  <td>".$resultado['email_proveedor']."</td>";
                echo "  <td>".$resultado['telefono_proveedor']."</td>";
                echo "  <td>".$resultado['area_proveedor']."</td>";
                echo "  <td>".$resultado['nombre_empresa_proveedor']."</td>";
                echo "  <td>".$resultado['cargo_proveedor']."</td>";
                echo "  <td>".$resultado['ubicacion_proveedor']."</td>";
                echo "  <td>".$resultado['tipo_producto_proveedor']."</td>";
                echo "  <td>";
                echo "      <button class='btn btn-warning' onclick='updateMostrarProveedor(".$resultado['id_proveedor'].")'>Editar</button>";
                echo "      <button class='btn btn-danger'  onclick='eliminarProveedor(".$resultado['id_proveedor'].")'>ELIMINAR</button>";
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
                        
                    echo '<a class="page-link" onclick="selectProveedortable('.($pagina_actual - 1).')" aria-label="Previous">
                            <span aria-hidden="true">&laquo;</span>
                        </a>
                        </li>';
                        for($i=1; $i<=$paginas; $i++){
                        echo ' <li class="page-item ';
                        
                        echo $pagina_actual == $i ? 'active">' : '">' ;
                        echo'<a class="page-link" onclick="selectProveedortable('.($i).')">'.($i).'</a></li>';
                        }
                      
            
            
                        echo '<li class="page-item ';
            
            echo $pagina_actual >= $paginas ? 'disabled">' : '">';
                        echo '<a class="page-link" onclick="selectProveedortable('.($pagina_actual + 1).')" aria-label="next">
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


    public static function registrarProveedor($datos)
    {
        try{

            $sql0 = ProveedorSQL::$existeProveedor;
            $query0 = Conexion::conectar()->prepare($sql0);
            $query0->bindParam(':rut_proveedor', $datos['rut_proveedor'], PDO::PARAM_STR);
            $query0->execute();
            $resultado0 = $query0->fetchAll(PDO::FETCH_ASSOC);
            $existeRut = 0;
        foreach ($resultado0 as $resultado0){
            $existeRut = $resultado0['rut_proveedor'];

        }

        if($existeRut != $datos['rut_proveedor']){
        // $shaPass=sha1($datos['contrasena_usuario']);
        $sql = ProveedorSQL::$registrarProveedor;
        $query = Conexion::conectar()->prepare($sql);
        $query->bindParam(':id_usuario', $datos['id_usuario'], PDO::PARAM_STR);
        $query->bindParam(':rut_proveedor', $datos['rut_proveedor'], PDO::PARAM_STR);
        $query->bindParam(':nombre_proveedor', $datos['nombre_proveedor'], PDO::PARAM_STR);
        $query->bindParam(':email_proveedor', $datos['email_proveedor'], PDO::PARAM_STR);
        $query->bindParam(':telefono_proveedor', $datos['telefono_proveedor'], PDO::PARAM_STR);
        $query->bindParam(':area_proveedor', $datos['area_proveedor'], PDO::PARAM_STR);
        $query->bindParam(':nombre_empresa_proveedor', $datos['nombre_empresa_proveedor'], PDO::PARAM_STR);
        $query->bindParam(':cargo_proveedor', $datos['cargo_proveedor'], PDO::PARAM_STR);
        $query->bindParam(':ubicacion_proveedor', $datos['ubicacion_proveedor'], PDO::PARAM_STR);
        $query->bindParam(':descripcion_proveedor', $datos['descripcion_proveedor'], PDO::PARAM_STR);
        $query->bindParam(':tipo_producto_proveedor', $datos['tipo_producto_proveedor'], PDO::PARAM_STR);
        $query->bindParam(':habilitado_proveedor', $datos['habilitado_proveedor'], PDO::PARAM_STR);
        return $query->execute();
        // $resultado = $query->fetch(PDO::FETCH_ASSOC);
        // $count = $query->rowCount();
        }else {
            echo 2;
        }
    }
        catch (Exception $e) {
            echo 'Excepción capturada: ',  $e->getMessage();
        }
    }


    public static function eliminarProveedor($datos)
    {
        try{
            $sql = ProveedorSQL::$eliminarProveedor;
            $query = Conexion::conectar()->prepare($sql);
            $query->bindParam(':id_proveedor', $datos["id_proveedor"], PDO::PARAM_INT);
            $query->execute();
        } catch (Exception $e) {
            echo 'Excepción capturada: ',  $e->getMessage();
        }
    }


    public static function buscarProveedor($datos)
    {   $pagina_var = intval($datos['pagina_actual']);
        $nombre_proveedor = "%".$datos['nombre_proveedor']."%";
        try{
            
            $sql = ProveedorSQL::$buscarProveedor;
            $query = Conexion::conectar()->prepare($sql);
            $query->bindParam(':nombre_proveedor', $nombre_proveedor, PDO::PARAM_STR);
            $query->execute();
            $filas = 10;
            $pagina_actual=$pagina_var;   
            $iniciar = ($pagina_actual-1)*$filas;
            $numero = $query->rowCount();
            //$query->fetch(PDO::FETCH_ASSOC);
            $resultado = $query->fetchAll(PDO::FETCH_ASSOC);
            $sql2 = ProveedorSQL::$buscarProveedorPagination.$iniciar.'';
           
            $query2 = Conexion::conectar()->prepare($sql2);
            $query2->bindParam(':nombre_proveedor', $nombre_proveedor, PDO::PARAM_STR);
            $query2->execute();
            $resultado = $query2->fetchAll(PDO::FETCH_ASSOC);
            $n = 1;
            echo '    <div class="col-12">
            <table class="table">
            <thead class="table-dark">
                <tr>
                    <th class="w-5">ID</th>
                    <th class="w-15">Rut</th>
                    <th class="w-15">Nombre</th>
                    <th class="w-35">Email</th>
                    <th class="w-35">Telefono</th>
                    <th class="w-35">Area</th>
                    <th class="w-35">Empresa</th>
                    <th class="w-35">Cargo</th>
                    <th class="w-35">Ubicacion</th>
                    <th class="w-35">Tipo de proveedor</th>
                    <th class="w-35">Opciones</th>
                </tr>
            </thead>
            ';
            echo '<tbody class="table-light">';
            if($count = $query2->rowCount()){
                foreach($resultado as $resultado){
                echo "<tr>";
                echo "  <td>".$resultado['id_proveedor']."</td>";
                echo "  <td>".$resultado['rut_proveedor']."</td>";
                echo "  <td>".$resultado['nombre_proveedor']."</td>";
                echo "  <td>".$resultado['email_proveedor']."</td>";
                echo "  <td>".$resultado['telefono_proveedor']."</td>";
                echo "  <td>".$resultado['area_proveedor']."</td>";
                echo "  <td>".$resultado['nombre_empresa_proveedor']."</td>";
                echo "  <td>".$resultado['cargo_proveedor']."</td>";
                echo "  <td>".$resultado['ubicacion_proveedor']."</td>";
                echo "  <td>".$resultado['tipo_producto_proveedor']."</td>";
                echo "  <td>";
                echo "      <button class='btn btn-warning' onclick='updateMostrarProveedor(".$resultado['id_proveedor'].")'>Editar</button>";
                echo "      <button class='btn btn-danger'  onclick='eliminarProveedor(".$resultado['id_proveedor'].")'>ELIMINAR</button>";
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
                        
                    echo '<a class="page-link" onclick="buscarProveedor('.($pagina_actual - 1).')" aria-label="Previous">
                            <span aria-hidden="true">&laquo;</span>
                        </a>
                        </li>';
                        for($i=1; $i<=$paginas; $i++){
                        echo ' <li class="page-item ';
                        
                        echo $pagina_actual == $i ? 'active">' : '">' ;
                        echo'<a class="page-link" onclick="buscarProveedor('.($i).')">'.($i).'</a></li>';
                        }
                      
            
            
                        echo '<li class="page-item ';
            
            echo $pagina_actual >= $paginas ? 'disabled">' : '">';
                        echo '<a class="page-link" onclick="buscarProveedor('.($pagina_actual + 1).')" aria-label="next">
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


    public static function recuperarProveedorTabla()
        {
            try{
            
            $sql = ProveedorSQL::$recuperarProveedortabla;
            $query = Conexion::conectar()->prepare($sql);
            $query->execute();
            $resultado = $query->fetchAll(PDO::FETCH_ASSOC);
            echo '
            <div class="col-12">
            <table class="table">
                <thead class="table-dark">
                    <tr>
                    
                        <th class="w-5">ID</th>
                        <th class="w-15">ID Usuario</th>
                        <th class="w-15">Rut</th>
                        <th class="w-15">Nombre</th>
                        <th class="w-35">Email</th>
                        <th class="w-35">Telefono</th>
                        <th class="w-35">Area</th>
                        <th class="w-35">Empresa</th>
                        <th class="w-35">Cargo</th>
                        <th class="w-35">Ubicacion</th>
                        <th class="w-35">Descripcion</th>
                        <th class="w-35">Tipo de proveedor</th>
                        <th class="w-35">Habilitado</th>
                        <th class="w-35">Opciones</th>
                    </tr>
                </thead>
                <tbody class="table-light">';
                    
            foreach ($resultado as $row){
               echo '<tr>
                        <td>'.$row['id_proveedor'].'</td>
                        <td>'.$row['id_usuario'].'</td>
                        <td>'.$row['rut_proveedor'].'</td>
                        <td>'.$row['nombre_proveedor'].'</td>
                        <td>'.$row['email_proveedor'].'</td>
                        <td>'.$row['telefono_proveedor'].'</td>
                        <td>'.$row['area_proveedor'].'</td>
                        <td>'.$row['nombre_empresa_proveedor'].'</td>
                        <td>'.$row['cargo_proveedor'].'</td>
                        <td>'.$row['ubicacion_proveedor'].'</td>
                        <td>'.$row['descripcion_proveedor'].'</td>
                        <td>'.$row['tipo_producto_proveedor'].'</td>
                        <td>'.$row['habilitado_proveedor'].'</td>
                        <td>
                            <button class="btn btn-info" onclick="recuperarProveedor('.$row["id_proveedor"].')">Recuperar</button>
                        </td>
                    </tr>';
           
           
            }
            echo' </tbody>
                </table>
                </div>';
            //$resultado = $query->fetch(PDO::FETCH_ASSOC);
            // $count = $query->rowCount();
            }
            catch (Exception $e) {
                echo 'Excepción capturada: ',  $e->getMessage();
            }
        }


        public static function recuperarProveedor($datos) {
            try{

                $sql = ProveedorSQL::$recuperarProveedor;
                $query = Conexion::conectar()->prepare($sql);

                $query->bindParam(':id_proveedor', $datos["id_proveedor"], PDO::PARAM_INT);
                
                echo $query->execute();
            } catch (Exception $e) {
                echo 'Excepción capturada: ',  $e->getMessage();
            }
        }


        public static function updateMostrarProveedor($datos)
        {
       
            try{
                $sql = ProveedorSQL::$updateMostrarProveedor;
                $query = Conexion::conectar()->prepare($sql);

                $query->bindParam(':id_proveedor', $datos["id_proveedor"], PDO::PARAM_INT);
                $query->execute();
                $resultado = $query->fetch(PDO::FETCH_ASSOC);
    
                $info =[
                    
                    'id_proveedor' => $resultado['id_proveedor'],
                    'id_usuario' => $resultado['id_usuario'],
                    'rut_proveedor' => $resultado['rut_proveedor'],
                    'nombre_proveedor' => $resultado['nombre_proveedor'],
                    'email_proveedor' => $resultado['email_proveedor'],
                    'telefono_proveedor' => $resultado['telefono_proveedor'],
                    'area_proveedor' => $resultado['area_proveedor'],
                    'nombre_empresa_proveedor' => $resultado['nombre_empresa_proveedor'],
                    'cargo_proveedor' => $resultado['cargo_proveedor'],
                    'ubicacion_proveedor' => $resultado['ubicacion_proveedor'],
                    'descripcion_proveedor' => $resultado['descripcion_proveedor'],
                    'tipo_producto_proveedor' => $resultado['tipo_producto_proveedor'],
                ];
                echo json_encode($info);
            }
            //$resultado = $query->fetch(PDO::FETCH_ASSOC);
            // $count = $query->rowCount();
            
            catch (Exception $e) {
                echo 'Excepción capturada: ',  $e->getMessage();
            }
        }


        public static function editarProveedor($datos)
        {
            try{
            // $shaPass=sha1($datos['contrasena_usuario']);
            echo $sql = ProveedorSQL::$editarProveedor;
            $query = Conexion::conectar()->prepare($sql);
            $query->bindParam(':updaterut_proveedor', $datos['updaterut_proveedor'], PDO::PARAM_STR);
            $query->bindParam(':updatenombre_proveedor', $datos['updatenombre_proveedor'], PDO::PARAM_STR);
            $query->bindParam(':updateemail_proveedor', $datos['updateemail_proveedor'], PDO::PARAM_STR);
            $query->bindParam(':updatetelefono_proveedor', $datos['updatetelefono_proveedor'], PDO::PARAM_STR);
            $query->bindParam(':updatearea_proveedor', $datos['updatearea_proveedor'], PDO::PARAM_STR);
            $query->bindParam(':updatenombre_empresa_proveedor', $datos['updatenombre_empresa_proveedor'], PDO::PARAM_STR);
            $query->bindParam(':updatecargo_proveedor', $datos['updatecargo_proveedor'], PDO::PARAM_STR);
            $query->bindParam(':updateubicacion_proveedor', $datos['updateubicacion_proveedor'], PDO::PARAM_STR);
            $query->bindParam(':updatedescripcion_proveedor', $datos['updatedescripcion_proveedor'], PDO::PARAM_STR);
            $query->bindParam(':updatetipo_producto_proveedor', $datos['updatetipo_producto_proveedor'], PDO::PARAM_STR);
            $query->bindParam(':updateid_proveedor', $datos['updateid_proveedor'], PDO::PARAM_STR);
            //$query->bindParam(':habilitado_usuario', $datos['habilitado_usuario'], PDO::PARAM_STR);
            return $query->execute();
            // $resultado = $query->fetch(PDO::FETCH_ASSOC);
            // $count = $query->rowCount();
            }
            catch (Exception $e) {
                echo 'Excepción capturada: ',  $e->getMessage();
            }
        }
}