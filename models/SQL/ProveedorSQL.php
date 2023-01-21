<?php
class ProveedorSQL
{
    public static $selectProveedortable = 'SELECT * FROM proveedor WHERE habilitado_proveedor = true';
    public static $selectProveedorPagination = 'SELECT * FROM proveedor WHERE habilitado_proveedor = true  limit 10 offset ';

    public static $existeProveedor = 'SELECT rut_proveedor from proveedor where rut_proveedor like :rut_proveedor';

    public static $registrarProveedor = 'INSERT INTO proveedor (id_usuario, rut_proveedor, nombre_proveedor, email_proveedor,
    telefono_proveedor, area_proveedor, nombre_empresa_proveedor,
     cargo_proveedor, ubicacion_proveedor, descripcion_proveedor, tipo_producto_proveedor, habilitado_proveedor)
                                 VALUES(
                                        :id_usuario,
                                        :rut_proveedor,
                                        :nombre_proveedor,
                                        :email_proveedor,
                                        :telefono_proveedor,
                                        :area_proveedor,
                                        :nombre_empresa_proveedor,
                                        :cargo_proveedor,
                                        :ubicacion_proveedor,
                                        :descripcion_proveedor,
                                        :tipo_producto_proveedor,
                                        :habilitado_proveedor
                                        )';

    public static $eliminarProveedor = 'update proveedor set habilitado_proveedor = false where id_proveedor = :id_proveedor';

    public static $buscarProveedor  = 'SELECT * FROM proveedor WHERE habilitado_proveedor = true AND nombre_proveedor LIKE :nombre_proveedor';
    public static $buscarProveedorPagination = 'SELECT * FROM proveedor WHERE habilitado_proveedor = true AND nombre_proveedor LIKE :nombre_proveedor limit 10 offset ';

    public static $recuperarProveedortabla = 'SELECT * FROM proveedor WHERE habilitado_proveedor=false';

    public static $recuperarProveedor = 'update proveedor set habilitado_proveedor = true where id_proveedor = :id_proveedor';

    public static $updateMostrarProveedor = 'SELECT * FROM proveedor AS e WHERE e.id_proveedor = :id_proveedor';

    public static $editarProveedor ='UPDATE proveedor SET 
    rut_proveedor = :updaterut_proveedor, 
    nombre_proveedor = :updatenombre_proveedor, 
    email_proveedor = :updateemail_proveedor, 
    telefono_proveedor = :updatetelefono_proveedor, 
    area_proveedor = :updatearea_proveedor, 
    nombre_empresa_proveedor = :updatenombre_empresa_proveedor,
    cargo_proveedor = :updatecargo_proveedor,
    ubicacion_proveedor = :updateubicacion_proveedor,
    descripcion_proveedor = :updatedescripcion_proveedor,
    tipo_producto_proveedor = :updatetipo_producto_proveedor
    WHERE id_proveedor = :updateid_proveedor';
}