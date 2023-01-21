<?php
class CarritoSQL
{
    public static $verCarrito = 'SELECT p.nombre_producto as nombre_producto,
    p.precio_producto as precio_producto,
    a.cantidad as cantidad,
    a.id_producto as id_producto
from carrito_de_compras as c join 
      agrega as a on 
      c.id_carro = a.id_carro join 
      producto as p on
      p.id_producto = a.id_producto where c.id_carro = :id_carro';


    public static $agregaAlCarrito = 'insert into agrega (
        id_carro, 
        id_producto, 
        cantidad) 
        VALUES(
               :id_carro,
               :id_producto,
               :cantidad)';


    public static $crearCarrito = 'insert into carrito_de_compras (
        compra_expira
        ) 
        VALUES(
               :compra_expira
              ) returning id_carro as id_carro';

    public static $limpiarCarrito = 'INSERT into pedido (
        id_carro,
        id_cliente,
        total_venta,
        estado_venta)
        VALUES (
                :id_carro,
                :id_venta,
                :total_venta,
                :pagado) returning id_cliente as id_cliente, id_venta as id_venta';

    public static $limpiarCarrito2 = 'SELECT prd.nombre_producto, prd.precio_producto, a.cantidad, cc.compra_expira, p.total_venta FROM producto as prd
    JOIN agrega as a on
    a.id_producto = prd.id_producto
    JOIN carrito_de_compras as cc on
    cc.id_carro = a.id_carro
    JOIN pedido as p on
    p.id_carro = a.id_carro
    WHERE p.id_carro = :id_carro';

    public static $eliminarProductoCarrito = 'DELETE FROM agrega WHERE id_carro = :id_carro and id_producto = :id_producto';

    public static $modificarProductoCarrito = 'update agrega set cantidad = :cantidad 
    where id_producto = :id_producto and id_carro = :id_carro';
}