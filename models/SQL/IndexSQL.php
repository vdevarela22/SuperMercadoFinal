<?php
class IndexSQL
{
    public static $mostrarProductoTienda = 'select * from producto where habilitado_producto = true';
    public static $mostrarProductoTiendaPagination = 'select id_producto, nombre_producto, precio_producto from producto where habilitado_producto = true ';

    public static $mostrarRecomendacion = 'select * from producto where habilitado_producto = true order by recomendacion desc limit 3';

    public static $agregarAlCarrito = 'insert into agrega (
        id_carro, 
        id_producto, 
        cantidad) 
        VALUES(
               :id_carro,
               :id_producto,
               :cantidad)';

    public static $agregarAlCarrito2 = 'SELECT recomendacion from producto where id_producto =:id_producto';
    public static $agregarAlCarrito3 = 'UPDATE producto set recomendacion = :valor_total where id_producto = :id_producto';

    public static $crearCarrito = 'insert into carrito_de_compras (
        compra_expira
        ) 
        VALUES(
               :compra_expira
              ) returning id_carro as id_carro';

    public static $buscarProductoCliente = 'select * from producto where habilitado_producto = true and nombre_producto like :productoBuscado';
    public static $verDetalles = 'select * from producto where habilitado_producto = true and nombre_producto like :nombre_producto';
}