<?php
class ProductoSQL
{
    public static $registrarProducto = 'insert into producto (
                 id_proveedor, 
                 id_categoria, 
                 nombre_producto, 
                 codigo_producto, 
                 descripcion_producto, 
                 precio_producto, 
                 cantidad,
                 habilitado_producto,
                 recomendacion)
                 VALUES(
                                                 
                                                 :id_proveedor,
                                                 :id_categoria,
                                                 :nombre_producto,
                                                 :codigo_producto,
                                                 :descripcion_producto,
                                                 :precio_producto,
                                                 :cantidad,
                                                 true,
                                                 :recomendacion)';




    public static $eliminarProducto = 'update producto set habilitado_producto = false where id_producto = :id_producto';



    public static $selectProductotable = 'select * from producto where habilitado_producto = true';
    public static $selectProductotablePagination = 'select * from producto where habilitado_producto = true limit 10 offset ';

    public static $editarProducto = 'update producto set id_proveedor = :id_proveedor, 
    id_categoria = :id_categoria, 
    nombre_producto = :nombre_producto, 
    codigo_producto = :codigo_producto, 
    descripcion_producto = :descripcion_producto, 
    precio_producto = :precio_producto, 
    cantidad = :cantidad
    where id_producto = :id_producto';



    public static $updateMostrarProducto = 'select * from producto as e where e.id_producto = :id_producto';

    public static $recuperarProducto = 'update producto set habilitado_producto = true where id_producto = :id_producto';

    public static $cargarAgregaProducto = 'select id_proveedor, nombre_proveedor from proveedor';

    public static $cargarAgregaProducto2 = 'select id_categoria, nombre_categoria from categoria';

    public static $recuperarProductoTabla = 'select * from producto where habilitado_producto = false';
    public static $recuperarProductoTablaPagination = 'select * from producto where habilitado_producto = false limit :filas offset :iniciar';
    
    public static $buscarProducto = 'select * from producto where habilitado_producto = true and nombre_producto like :nombre_producto';
    public static $buscarProductoPagination = 'select * from producto where habilitado_producto = true and nombre_producto like :nombre_producto limit 10 offset ';
}

