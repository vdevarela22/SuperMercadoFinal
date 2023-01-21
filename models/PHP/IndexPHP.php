<?php
require_once '../../models/Conexion.php';
require_once '../../models/SQL/IndexSQL.php';

class IndexPHP extends Conexion
{

    public static function mostrarProductoTienda($pagina)
    {
        $pagina = $pagina;
        try{
        
            $sql = IndexSQL::$mostrarProductoTienda;
            $query = Conexion::conectar()->prepare($sql);
            $query->execute();
            $filas = 10;
            $pagina_actual=$pagina;   
            $iniciar = ($pagina_actual-1)*$filas;
            $numero = $query->rowCount();
            //$query->fetch(PDO::FETCH_ASSOC);
            $resultado = $query->fetchAll(PDO::FETCH_ASSOC);
            $sql2 = IndexSQL::$mostrarProductoTiendaPagination;
           
            $query2 = Conexion::conectar()->prepare($sql2);
            $query2->execute();
            $data = $query2->fetchAll(PDO::FETCH_ASSOC);
            return json_encode($data);


        }
        catch (Exception $e) {
            echo 'Excepción capturada: ',  $e->getMessage();
        }
    }

    public static function mostrarProductosRecomendados()
    {
        
        try{
        
            $sql = IndexSQL:: $mostrarRecomendacion;
            $query = Conexion::conectar()->prepare($sql);
            $query->execute();
            $resultado = $query->fetchAll(PDO::FETCH_ASSOC);
            $n = 0;

            echo '<div class="container-fluid bg-warning">';
            echo '<div class="row">';    
            foreach($resultado as $resultado){
                // if($n==0 | ($n/4 == 1)){
                   
                // }
           
            echo ' <div class="col-4 text-center container d-flex align-items-center justify-content-center">
                    <div class="card" style="width: 20rem;">
                    <h5>DISPONIBLE</h5>
                    <img class="card-img-top" src="/dist/images/producto.png" alt="Card image cap">
                    <div class="card-body d-grid gap-2">
                        <h5 class="card-title">'.$resultado["nombre_producto"].'</h5>
                        <h3>$'.$resultado["precio_producto"].'</h3>
                    </div>
                    </div>
                </div>';
               
                // if($n==0 | ($n/4 == 1)){ 
            
                // }
            $n ++;
            }
            echo '</div>';
            echo '</div>';
            echo '</div>';

        }
        catch (Exception $e) {
            echo 'Excepción capturada: ',  $e->getMessage();
        }
    }
    public static function agregarAlCarrito($datos)
    {
        try{
           $valor = intval($datos['valor']);
            $sql = IndexSQL::$agregarAlCarrito;
            $query = Conexion::conectar()->prepare($sql);
            session_start();
            $_SESSION['id_carro'];
            $query->bindParam(':id_carro', $_SESSION['id_carro'], PDO::PARAM_STR);
            $query->bindParam(':id_producto', $datos['id_producto'], PDO::PARAM_STR);
            $query->bindParam(':cantidad', $datos['cantidad'], PDO::PARAM_STR);
            
            echo $query->execute();
            
            $sql2= IndexSQL::$agregarAlCarrito2;
            $query2 = Conexion::conectar()->prepare($sql2);
            $query2->bindParam(':id_producto', $datos['id_producto'], PDO::PARAM_STR);
            $query2->execute();
            $resultado = $query2->fetchAll(PDO::FETCH_ASSOC);
            //$recomendacion = 0;
            foreach ($resultado as $resultado){
            $recomendacion = intval($resultado["recomendacion"]);
            }
            $valor_total = intval($recomendacion) + $valor;
            $sql3 = IndexSQL::$agregarAlCarrito3;

            $query3 = Conexion::conectar()->prepare($sql3);
            $query3->bindParam(':valor_total', $valor_total, PDO::PARAM_STR);
            $query3->bindParam(':id_producto', $datos['id_producto'], PDO::PARAM_STR);
            $query3->execute();
            
            // $resultado = $query->fetch(PDO::FETCH_ASSOC);
            // $count = $query->rowCount();
            }
            catch (Exception $e) {
                //echo 'Excepción capturada: ',  $e->getMessage();
                echo 2;
            }
    }
    public static function crearCarrito()
        
    {   session_start();
        if(!isset($_SESSION['id_carro'])){
            $compra_expira = gmdate('Y-m-d h:i:s \G\M\T', time());
            try{
                $sql = IndexSQL::$crearCarrito;
                $query = Conexion::conectar()->prepare($sql);
                $query->bindParam(':compra_expira', $compra_expira, PDO::PARAM_STR);
                $query->execute();
                $resultado = $query->fetch(PDO::FETCH_ASSOC);
                //$id = Conexion::$conn->lastInsertId();
                
                echo $_SESSION['id_carro'] = $resultado['id_carro'];
                echo $_SESSION['compra_expira'] = $compra_expira;
    
                // $resultado = $query->fetch(PDO::FETCH_ASSOC);
                // $count = $query->rowCount();
                }
                catch (Exception $e) {
                    echo 'Excepción capturada: ',  $e->getMessage();
                }
                
        }else{
            echo "carro ya creado";
        }
    }

    public static function buscarProductoCliente($datos)
    {
        $productoBuscado = "%".$datos['productoBuscado']."%";
        try{
        
            $sql = IndexSQL:: $buscarProductoCliente;
           
            $query = Conexion::conectar()->prepare($sql);
            $query->bindParam(':productoBuscado', $productoBuscado, PDO::PARAM_STR);
            $query->execute();
            $resultado = $query->fetchAll(PDO::FETCH_ASSOC);
            $n = 0;

            echo '<div class="container-fluid bg-warning">';
            echo '<div class="row">';    
            foreach($resultado as $resultado){
                // if($n==0 | ($n/4 == 1)){
                   
                // }
           
            echo ' <div class="col-3 text-center container d-flex align-items-center justify-content-center">
                    <div class="card" style="width: 18rem;">
                    <h5></h5>
                    <img class="card-img-top" src="dist/images/producto.png" alt="Card image cap">
                    <div class="card-body d-grid gap-2">
                        <h5 class="card-title">'.$resultado["nombre_producto"].'</h5>
                        <div class="d-inline">
                        <span id="'.$resultado["id_producto"].".1".'" onclick="seleccionarRecomendacion('.strval($resultado["id_producto"]).".1".');" class="fa fa-star"></span>
                        <span id="'.$resultado["id_producto"].".2".'" onclick="seleccionarRecomendacion('.strval($resultado["id_producto"]).".2".');" class="fa fa-star"></span>
                        <span id="'.$resultado["id_producto"].".3".'" onclick="seleccionarRecomendacion('.strval($resultado["id_producto"]).".3".');" class="fa fa-star"></span>
                        <span id="'.$resultado["id_producto"].".4".'" onclick="seleccionarRecomendacion('.strval($resultado["id_producto"]).".4".');" class="fa fa-star"></span>
                        <span id="'.$resultado["id_producto"].".5".'" onclick="seleccionarRecomendacion('.strval($resultado["id_producto"]).".5".');" class="fa fa-star"></span>
                        </div>
                        <h3>$'.$resultado["precio_producto"].'</h3>
                        <div class="input-group">
                            <button onclick="restarProductoIndex('.$resultado["id_producto"].')" class="input-group-text">-</button>
                            <input id='.$resultado["id_producto"].' type="text" aria-label="First name" class="form-control text-center" value="1">
                            <button onclick="sumarProductoIndex('.$resultado["id_producto"].')"class="input-group-text">+</button>
                        </div>
                        <br>
                        <button onclick="agregarAlCarrito('.$resultado["id_producto"].')" type="button" class="btn btn-primary btn-lg btn-block">Agregar</button>
                        <a href="../views/vista.php" class="btn btn-primary btn-lg btn-block">Ver</a>    
                    </div>
                </div>';
               
                // if($n==0 | ($n/4 == 1)){ 
            
                // }
            $n ++;
            }
            echo '</div>';
            echo '</div>';
            echo '</div>';

        }
        catch (Exception $e) {
            echo 'Excepción capturada: ',  $e->getMessage();
        }
    }

    
}