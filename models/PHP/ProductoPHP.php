<?php
require_once '../../models/Conexion.php';
require_once '../../models/SQL/ProductoSQL.php';

class ProductoPHP extends Conexion
{

public static function registrarProducto($datos)
    {   
        $recomendacion = 0;
        try{
            $sql = ProductoSQL::$registrarProducto;
            $query = Conexion::conectar()->prepare($sql);
            
            $query->bindParam(':id_proveedor', $datos['id_proveedor'], PDO::PARAM_STR);
            $query->bindParam(':id_categoria', $datos['id_categoria'], PDO::PARAM_STR);
            $query->bindParam(':nombre_producto', $datos['nombre_producto'], PDO::PARAM_STR);
            $query->bindParam(':codigo_producto', $datos['codigo_producto'], PDO::PARAM_STR);
            $query->bindParam(':descripcion_producto', $datos['descripcion_producto'], PDO::PARAM_STR);
            $query->bindParam(':precio_producto', $datos['precio_producto'], PDO::PARAM_STR);
            $query->bindParam(':cantidad', $datos['cantidad'], PDO::PARAM_STR);
            $query->bindParam(':recomendacion', $recomendacion, PDO::PARAM_STR);
            
            return $query->



execute();
} catch (Exception $e) {
echo 'Excepción capturada: ', $e->getMessage();
}
}


public static function eliminarProducto($datos)
{
    try{
        $sql = ProductoSQL::$eliminarProducto;
        $query = Conexion::conectar()->prepare($sql);
        $query->bindParam(':id_producto', $datos["id_producto"], PDO::PARAM_INT);
        $query->execute();
    } catch (Exception $e) {
        echo 'Excepción capturada: ',  $e->getMessage();
    }
}


 public static function selectProductotable($datos)
    {
        $pagina_var = $datos;
        try{
        
            $sql = ProductoSQL::$selectProductotable;
            $query = Conexion::conectar()->prepare($sql);
            $query->execute();
            $filas = 10;
            $pagina_actual=$pagina_var;   
            $iniciar = ($pagina_actual-1)*$filas;
            $numero = $query->rowCount();
            //$query->fetch(PDO::FETCH_ASSOC);
            $resultado = $query->fetchAll(PDO::FETCH_ASSOC);
            $sql2 = ProductoSQL::$selectProductotablePagination.$iniciar.'';
           
            $query2 = Conexion::conectar()->prepare($sql2);
            $query2->execute();
            $resultado = $query2->fetchAll(PDO::FETCH_ASSOC);
            $n = 1;
            echo '    <div class="col-12">
            <table class="table">
            <thead class="table-dark">
                <tr>
                    <th class="w-5">ID</th>
                    <th class="w-15">Proveedor</th>
                    <th class="w-15">Categoria</th>
                    <th class="w-35">Nombre</th>
                    <th class="w-35">Codigo</th>
                    <th class="w-35">Descripción</th>
                    <th class="w-35">Precio</th>
                    <th class="w-35">Cantidad</th>
                    <th class="w-35">Opciones</th>
                </tr>
            </thead>
            ';
            echo '<tbody class="table-light">';
            if($count = $query2->rowCount()){
                foreach($resultado as $resultado){
                echo "<tr>";
                echo "  <td>".$resultado['id_producto']."</td>";
                echo "  <td>".$resultado['id_proveedor']."</td>";
                echo "  <td>".$resultado['id_categoria']."</td>";
                echo "  <td>".$resultado['nombre_producto']."</td>";
                echo "  <td>".$resultado['codigo_producto']."</td>";
                echo "  <td>".$resultado['descripcion_producto']."</td>";
                echo "  <td>".$resultado['precio_producto']."</td>";
                echo "  <td>".$resultado['cantidad']."</td>";
                echo "  <td>";
                echo "      <button class='btn btn-warning' onclick='updateMostrarProducto(".$resultado['id_producto'].")'>Editar</button>";
                echo "      <button class='btn btn-danger'  onclick='eliminarProducto(".$resultado['id_producto'].")'>ELIMINAR</button>";
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
                        
                    echo '<a class="page-link" onclick="buscarProducto('.($pagina_actual - 1).')" aria-label="Previous">
                            <span aria-hidden="true">&laquo;</span>
                        </a>
                        </li>';
                        for($i=1; $i<=$paginas; $i++){
                        echo ' <li class="page-item ';
                        
                        echo $pagina_actual == $i ? 'active">' : '">' ;
                        echo'<a class="page-link" onclick="buscarProducto('.($i).')">'.($i).'</a></li>';
                        }
                      
            
            
                        echo '<li class="page-item ';
            
            echo $pagina_actual >= $paginas ? 'disabled">' : '">';
                        echo '<a class="page-link" onclick="buscarProducto('.($pagina_actual + 1).')" aria-label="next">
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


    public static function editarProducto($datos)
    {   
        $recomendacion = 0;
        try{
            echo $sql = ProductoSQL::$editarProducto;
            $query = Conexion::conectar()->prepare($sql);
            
            $query->bindParam(':id_proveedor', $datos['id_proveedor'], PDO::PARAM_STR);
            $query->bindParam(':id_categoria', $datos['id_categoria'], PDO::PARAM_STR);
            $query->bindParam(':nombre_producto', $datos['nombre_producto'], PDO::PARAM_STR);
            $query->bindParam(':codigo_producto', $datos['codigo_producto'], PDO::PARAM_STR);
            $query->bindParam(':descripcion_producto', $datos['descripcion_producto'], PDO::PARAM_STR);
            $query->bindParam(':precio_producto', $datos['precio_producto'], PDO::PARAM_STR);
            $query->bindParam(':cantidad', $datos['cantidad'], PDO::PARAM_STR);
            $query->bindParam(':id_producto', $datos['id_producto'], PDO::PARAM_STR);
            
            return $query->execute();



execute();
} catch (Exception $e) {
echo 'Excepción capturada: ', $e->getMessage();
}
}



public static function updateMostrarProducto($datos)
        {
       
            try{
                $sql = ProductoSQL::$updateMostrarProducto;
                $query = Conexion::conectar()->prepare($sql);

                $query->bindParam(':id_producto', $datos["id_producto"], PDO::PARAM_INT);
                $query->execute();
                $resultado = $query->fetch(PDO::FETCH_ASSOC);
    
                $info =[
                    'id_producto' => $resultado['id_producto'],
                    'id_proveedor' => $resultado['id_proveedor'],
                    'id_categoria' => $resultado['id_categoria'],
                    'nombre_producto' => $resultado['nombre_producto'],
                    'codigo_producto' => $resultado['codigo_producto'],
                    'descripcion_producto' => $resultado['descripcion_producto'],
                    'precio_producto' => $resultado['precio_producto'],
                    'cantidad' => $resultado['cantidad'],
                ];
                echo json_encode($info);
            }
            
            catch (Exception $e) {
                echo 'Excepción capturada: ',  $e->getMessage();
            }
        }


public static function recuperarProducto($datos) {
            try{

                $sql = ProductoSQL::$recuperarProducto;
                $query = Conexion::conectar()->prepare($sql);

                $query->bindParam(':id_producto', $datos["id_producto"], PDO::PARAM_INT);
                
                echo $query->execute();
            } catch (Exception $e) {
                echo 'Excepción capturada: ',  $e->getMessage();
            }
        }


public static function cargarAgregaProducto() {
            try {
                $sql = ProductoSQL::$cargarAgregaProducto;
                $query = Conexion::conectar()->prepare($sql);
                $query->execute();
                $resultado = $query->fetchAll(PDO::FETCH_ASSOC);
                $n = 0;
                $datos_proveedor = Array();
                foreach ($resultado as $row) {
                    echo "<option id=".$row['id_proveedor'].">".$row['nombre_proveedor']."</option>"; 
                }
            } catch (Exception $e) {
                echo 'Excepción capturada: ',  $e->getMessage();
            }
        }        


public static function cargarAgregaProducto2()
        {
            try{
            // $shaPass=sha1($datos['contrasena_usuario']);
            $sql = ProductoSQL::$cargarAgregaProducto2;
            $query = Conexion::conectar()->prepare($sql);
            $query->execute();
            $resultado = $query->fetchAll(PDO::FETCH_ASSOC);
            $n = 0;
            $datos_categoria = Array();
            foreach ($resultado as $row){
                echo "<option id=".$row['id_categoria'].">".$row['nombre_categoria']."</option>"; 
    
            }
        }
            //$resultado = $query->fetch(PDO::FETCH_ASSOC);
            // $count = $query->rowCount();
            
            catch (Exception $e) {
                echo 'Excepción capturada: ',  $e->getMessage();
            }
        }


    public static function recuperarProductoTabla()
        {
            try{
            
            $sql = ProductoSQL::$recuperarProductoTabla;
            $query = Conexion::conectar()->prepare($sql);
            $query->execute();
            $resultado = $query->fetchAll(PDO::FETCH_ASSOC);
            echo '
            <div class="col-12">
            <table class="table">
                <thead class="table-dark">
                    <tr>
                        <th class="w-5">ID</th>
                        <th class="w-15">Proveedor</th>
                        <th class="w-15">Categoria</th>
                        <th class="w-35">Nombre</th>
                        <th class="w-35">Codigo</th>
                        <th class="w-35">Descripción</th>
                        <th class="w-35">Precio</th>
                        <th class="w-35">Cantidad</th>
                        <th class="w-35">Opciones</th>
                    </tr>
                </thead>
                <tbody class="table-light">';
                    
            foreach ($resultado as $row){
               echo '<tr>
                        <td>'.$row["id_producto"].'</td>
                        <td>'.$row["id_proveedor"].'</td>
                        <td>'.$row["id_categoria"].'</td>
                        <td>'.$row["nombre_producto"].'</td>
                        <td>'.$row["codigo_producto"].'</td>
                        <td>'.$row["descripcion_producto"].'</td>
                        <td>'.$row["precio_producto"].'</td>
                        <td>'.$row["cantidad"].'</td>
                        <td>
                            <button class="btn btn-info" onclick="recuperarProducto('.$row["id_producto"].')">Recuperar</button>
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
       


    
        public static function buscarProducto($datos)
        {   $pagina_var = intval($datos['pagina_actual']);
            $nombre_producto = "%".$datos['nombre_producto']."%";
            try{
                
                $sql = ProductoSQL::$buscarProducto;
                $query = Conexion::conectar()->prepare($sql);
                $query->bindParam(':nombre_producto', $nombre_producto, PDO::PARAM_STR);
                $query->execute();
                $filas = 10;
                $pagina_actual=$pagina_var;   
                $iniciar = ($pagina_actual-1)*$filas;
                $numero = $query->rowCount();
                //$query->fetch(PDO::FETCH_ASSOC);
                $resultado = $query->fetchAll(PDO::FETCH_ASSOC);
                $sql2 = ProductoSQL::$buscarProductoPagination.$iniciar.'';
               
                $query2 = Conexion::conectar()->prepare($sql2);
                $query2->bindParam(':nombre_producto', $nombre_producto, PDO::PARAM_STR);
                $query2->execute();
                $resultado = $query2->fetchAll(PDO::FETCH_ASSOC);
                $n = 1;
                echo '    <div class="col-12">
                <table class="table">
                <thead class="table-dark">
                    <tr>
                        <th class="w-5">ID</th>
                        <th class="w-15">Proveedor</th>
                        <th class="w-15">Categoria</th>
                        <th class="w-35">Nombre</th>
                        <th class="w-35">Codigo</th>
                        <th class="w-35">Descripción</th>
                        <th class="w-35">Precio</th>
                        <th class="w-35">Cantidad</th>
                        <th class="w-35">Opciones</th>
                    </tr>
                </thead>
                ';
                echo '<tbody class="table-light">';
                if($count = $query2->rowCount()){
                    foreach($resultado as $resultado){
                    echo "<tr>";
                    echo "  <td>".$resultado['id_producto']."</td>";
                    echo "  <td>".$resultado['id_proveedor']."</td>";
                    echo "  <td>".$resultado['id_categoria']."</td>";
                    echo "  <td>".$resultado['nombre_producto']."</td>";
                    echo "  <td>".$resultado['codigo_producto']."</td>";
                    echo "  <td>".$resultado['descripcion_producto']."</td>";
                    echo "  <td>".$resultado['precio_producto']."</td>";
                    echo "  <td>".$resultado['cantidad']."</td>";
                    echo "  <td>";
                    echo "      <button class='btn btn-warning' onclick='updateMostrarProducto(".$resultado['id_producto'].")'>Editar</button>";
                    echo "      <button class='btn btn-danger'  onclick='eliminarProducto(".$resultado['id_producto'].")'>ELIMINAR</button>";
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
                            
                        echo '<a class="page-link" onclick="buscarProducto('.($pagina_actual - 1).')" aria-label="Previous">
                                <span aria-hidden="true">&laquo;</span>
                            </a>
                            </li>';
                            for($i=1; $i<=$paginas; $i++){
                            echo ' <li class="page-item ';
                            
                            echo $pagina_actual == $i ? 'active">' : '">' ;
                            echo'<a class="page-link" onclick="buscarProducto('.($i).')">'.($i).'</a></li>';
                            }
                          
                
                
                            echo '<li class="page-item ';
                
                echo $pagina_actual >= $paginas ? 'disabled">' : '">';
                            echo '<a class="page-link" onclick="buscarProducto('.($pagina_actual + 1).')" aria-label="next">
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

}