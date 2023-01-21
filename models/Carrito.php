<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require '../../PHPMailer-master/src/Exception.php';
require '../../PHPMailer-master/src/PHPMailer.php';
require '../../PHPMailer-master/src/SMTP.php';
require_once '../../models/Conexion.php';
require_once '../../models/SQL/CarritoSQL.php';
require '../../vendor/autoload.php';
            use Transbank\Webpay\WebpayPlus\Transaction;

class Carrito extends Conexion
{

    public static function verCarrito()
    {
        session_start();
        try {
            $sql = CarritoSQL::$verCarrito;

            $query = Conexion::conectar()->prepare($sql);

            
            $query->bindParam(':id_carro', $_SESSION['id_carro'], PDO::PARAM_STR);
            $query->execute();
            $resultado = $query->fetchAll(PDO::FETCH_ASSOC);
            // $count = $query->rowCount();
            $n = 1;
            echo '    <div class="row">
            <div class="col-12 text-center">
            <table class="table">
            <thead>
                <tr>
                <th scope="col">#</th>
                <th scope="col">Producto</th>
                <th scope="col">Precio</th>
                <th scope="col">Cantidad</th>
                <th scope="col">Total</th>
                <th scope="col">Eliminar</th>
                </tr>
            </thead>
            <tbody>';
            $total = 0;
            foreach($resultado as $resultado){
            echo '   
                    <tr>
                    <th scope="row">'.$n.'</th>
                    <td>'.$resultado['nombre_producto'].'</td>
                    <td>'.$resultado['precio_producto'].'</td>
                    <td class="inline">
                    <div class="input-group">
                    <button onclick="restarProductoCarrito('.$resultado["id_producto"].')" class="input-group-text">-</button>
                    <input id="'.$resultado['id_producto'].'" value='.$resultado['cantidad'].' class="text-center"></input>
                    <button onclick="sumarProductoCarrito('.$resultado["id_producto"].')"class="input-group-text">+</button>
                    </div>
                    </td>
                    <td>'.$resultado['cantidad']*$resultado['precio_producto'].'</td>
                    <td><button class="btn btn-danger" onclick="eliminarProductoCarrito('.$resultado['id_producto'].')">ELIMINAR</button></td>
                    </tr>
                    <tr>';
               $n++;
               $total = $total + ($resultado['cantidad']*$resultado['precio_producto']);

            }
            echo '             </tbody>
            </table>
            
            </div>
        </div>
        <br>
        <br>
        <br>
        <div class="row">
            <div class="col-6">
            </div>
            <div class="col-6 text-center d-grid gap-2">
                <h3>Total del carrito</h3>
                <div class="row">
                <div class="row">
                    <div class="col-6">
                        <h5>Total</h5>
                    </div>
                    <div class="col-6">
                        <input id="totalCarrito" disabled value='.$total.' class="text-center"></input>
                    </div>
                </div>
                <button class="btn btn-dark" onclick="location.href=\'finalizar-compra.php\'">FINALIZAR COMPRA</button>
            </div>
        </div>';
        } catch (Exception $e) {
            echo 'Excepción capturada: ', $e->getMessage();
        }
    }
    public static function agregarAlCarrito($datos)
    {
        try{
            $sql = CarritoSQL:: $agregaAlCarrito;
            $query = Conexion::conectar()->prepare($sql);
            session_start();
            $_SESSION['id_carro'];
            $query->bindParam(':id_carro', $_SESSION['id_carro'], PDO::PARAM_STR);
            $query->bindParam(':id_producto', $datos['id_producto'], PDO::PARAM_STR);
            $query->bindParam(':cantidad', $datos['cantidad'], PDO::PARAM_STR);
            
            echo $query->execute();
            
            // $resultado = $query->fetch(PDO::FETCH_ASSOC);
            // $count = $query->rowCount();
            }
            catch (Exception $e) {
                //echo 'Excepción capturada: ',  $e->getMessage();
                echo 2;
            }
    }
    public static function crearCarrito()
        
    {
        $compra_expira = gmdate('Y-m-d h:i:s \G\M\T', time());
        try{
            $sql = CarritoSQL:: $crearCarrito;
            $query = Conexion::conectar()->prepare($sql);
            $query->bindParam(':compra_expira', $compra_expira, PDO::PARAM_STR);
            $query->execute();
            $resultado = $query->fetch(PDO::FETCH_ASSOC);
            //$id = Conexion::$conn->lastInsertId();
            session_start();
            echo $_SESSION['id_carro'] = $resultado['id_carro'];
            echo $_SESSION['compra_expira'] = $compra_expira;

            // $resultado = $query->fetch(PDO::FETCH_ASSOC);
            // $count = $query->rowCount();
            }
            catch (Exception $e) {
                echo 'Excepción capturada: ',  $e->getMessage();
            }
    }
    public static function mostrarTotal()
    {
        session_start();
        $id_carro = intval($_SESSION['id_carro']);
        try{
            $sql = 'SELECT distinct
            sum((p.precio_producto*a.cantidad)) as total
            from carrito_de_compras as c join 
              agrega as a on 
              c.id_carro = a.id_carro join 
              producto as p on
              p.id_producto = a.id_producto where c.id_carro ='.$id_carro;
             $query = Conexion::conectar()->prepare($sql);
             $query->execute();
             $resultado = $query->fetchAll(PDO::FETCH_ASSOC);
             $count = $query->rowCount();
             $total = 0;
             
            foreach($resultado as $resultado){
                if($resultado['total'] != null )
             $total = $resultado['total'];
            }
            

            
            $total;
            $sql2 = 'UPDATE carrito_de_compras set cantidad_carro ='.$total.' where id_carro ='.$_SESSION['id_carro'];
            $query = Conexion::conectar()->prepare($sql2);

            $_SESSION['total'] = $total;
             $query->execute();
             $amount = $_SESSION['total'];
             //$transaction = new \Transbank\Webpay\WebpayPlus\Transaction();
             $transaction = new Transaction();
             // Por simplicidad de este ejemplo, este es nuestro "controlador" que define que vamos a hacer dependiendo del parametro ?action= de la URL.
             $response = $transaction->create('ordertest', 1, $amount, 'http://localhost/views/compraRealizada.php');
 
             $url = $response->getUrl();
             $token = $response->getToken();
             $webpay = "<form method='post' action='$url'>
             <input type='hidden' id='token_ws' name='token_ws' value='$token'>
             <input id='botonWebpay' onsubmit='return registrarCliente()' class=btn btn-primary btn-lg btn-block' type='submit' value='Ir a pagar' disabled/>
             </form>";
              $info = [
                 'total' => $total,
                 'webpay' => $webpay,
                 'token' => $token,
              ];
            
             echo json_encode($info);
            
        }   catch (Exception $e) {
                echo 'Excepción capturada: ',  $e->getMessage();
            }

        
    }
    public static function limpiarCarrito(){
        session_start();
        $id_carro = intval($_SESSION['id_carro']);
        $id_cliente = $_SESSION['id_cliente'];
        $total = $_SESSION['total'];
        $pagado = "pagado";
        try{
            $sql = CarritoSQL::$limpiarCarrito;

             $query = Conexion::conectar()->prepare($sql);
             $query->bindParam(':id_carro', $id_carro, PDO::PARAM_STR);
             $query->bindParam(':id_venta', $id_cliente, PDO::PARAM_STR);
             $query->bindParam(':total_venta', $total, PDO::PARAM_STR);
             $query->bindParam(':pagado', $pagado, PDO::PARAM_STR);
             $query->execute();
             $resultado = $query->fetchAll(PDO::FETCH_ASSOC);
             $count = $query->rowCount();
             $total = 0;
             
            foreach($resultado as $resultado){
            $id_cliente = $resultado['id_cliente'];
            $id_venta = $resultado['id_venta'];
            }

            $sql2= 'SELECT nombre_cliente, email_cliente from cliente where id_cliente = '.$id_cliente.'';
            $query2 = Conexion::conectar()->prepare($sql2);
            $query2->execute();
            $resultado2 = $query2->fetchAll(PDO::FETCH_ASSOC);
           foreach($resultado2 as $resultado2){
           $email_cliente = $resultado2['email_cliente'];
           $nombre_cliente = $resultado2['nombre_cliente'];
           }

            $sql3 = CarritoSQL:: $limpiarCarrito2;
            $query3 = Conexion::conectar()->prepare($sql3);
            $query3->bindParam(':id_carro', $id_carro, PDO::PARAM_STR);
            $query3->execute();
            $resultado3 = $query3->fetchAll(PDO::FETCH_ASSOC);

            
           

       
        foreach($resultado3 as $resultado3){
        $tabla=  '   
                <tr>
                <td>'.$resultado3['nombre_producto'].'</td>
                <td>'.$resultado3['precio_producto'].'</td>
                <td>'.$resultado3['cantidad'].'</td>
                <td>'.$resultado3['precio_producto']*$resultado3['cantidad'].'</td>
                </tr>
                <tr>';
                $fecha = $resultado3['compra_expira'];
                $total_venta = $resultado3['total_venta'];
        }


           $mensaje = ' <h1> Gracias Por Comprar </h1>
                        <br>
                        <p>ID VENTA:'.$id_venta.'</p>
                        <br>
                        <p>Fecha:'.$fecha.' 
                        <br>
                         <thead>
                        <tr>
                        <th scope="col">Producto</th>
                        <th scope="col">Precio Unitario</th>
                        <th scope="col">Cantidad</th>
                        <th scope="col">Subtotal</th>
                        </tr>
                    </thead>
                    <tbody>
                        '.$tabla.'
                        </tbody>
                        </table>
                        <br>
                        <p>Total: '.$total_venta.'</p>


           
           
           ';
           $mail = new PHPMailer(true);
           $mail->isSMTP();
           $mail->Host = 'smtp.gmail.com';
           $mail->SMTPAuth = true;
           $mail->Username = 'ricardo.nakagawa.c@gmail.com';
           $mail->Password = 'osispvhbiioxjege';
           $mail->SMTPSecure = 'ssl';
           $mail->Port = 465;
            $mail-> setFrom('ricardo.nakagawa.c@gmail.com');
            $mail->addAddress($email_cliente);
            $mail->isHTML(true);
            $mail->Subject = "Gracias por Comprar";
            $mail->Body = $mensaje;
            $mail->send();


            }   catch (Exception $e) {
                echo 'Excepción capturada: ',  $e->getMessage();
            } 
        echo "<p>".$email_cliente."</p>";                           
        session_destroy();

        
        //echo "sesion destruida";
    }

    public static function eliminarProductoCarrito($datos){
        session_start();
        echo $id_carro = intval($_SESSION['id_carro']);
        echo $id_producto = $datos['id_producto'];
        try{
            $sql = CarritoSQL:: $eliminarProductoCarrito;

             $query = Conexion::conectar()->prepare($sql);
             $query->bindParam(':id_carro', $id_carro, PDO::PARAM_STR);
             $query->bindParam(':id_producto', $id_producto, PDO::PARAM_STR);
             echo $query->execute();
            }   catch (Exception $e) {
                echo 'Excepción capturada: ',  $e->getMessage();
            }                              
        
    }
    public static function modificarProductoCarrito($datos)
    {
        session_start();
        $id_carro = $_SESSION['id_carro'];
        echo $datos['cantidad'];
        try{
        // $shaPass=sha1($datos['contrasena_usuario']);
        $sql = CarritoSQL::$modificarProductoCarrito;
        $query = Conexion::conectar()->prepare($sql);
        $query->bindParam(':cantidad', $datos['cantidad'], PDO::PARAM_STR);
        $query->bindParam(':id_producto', $datos['id_producto'], PDO::PARAM_STR);
        $query->bindParam(':id_carro', $id_carro, PDO::PARAM_STR);
        //$query->bindParam(':habilitado_usuario', $datos['habilitado_usuario'], PDO::PARAM_STR);
        echo $query->execute();
        // $resultado = $query->fetch(PDO::FETCH_ASSOC);
        // $count = $query->rowCount();
        }
        catch (Exception $e) {
            echo 'Excepción capturada: ',  $e->getMessage();
        }
    }

}