<?php
class EmpleadoSQL
{
    public static $existeEmpleado ='SELECT rut_usuario from empleado where rut_usuario like :rut_usuario';
    public static $registrarEmpleado = 'insert into empleado (nombre_usuario, 
    apellido_usuario,
    rut_usuario, 
    contrasena_usuario, 
    email_usuario, 
    telefono_usuario, 
    region_usuario, 
    ciudad_usuario, 
    fecha_nacimiento_usuario, 
    direccion_usuario, 
    estadocivil_usuario, 
    area_usuario, 
    cargo_usuario, 
    ubicacion_trabajo_usuario, 
    fecha_inicio_usuario, 
    sueldo_usuario, 
    horas_trabajo_usuario, 
    habilitado_usuario)
    VALUES(
           :nombre_usuario,
           :apellido_usuario,
           :rut_usuario,
           :contrasena_usuario,
           :email_usuario,
           :telefono_usuario,
           :region_usuario,
           :ciudad_usuario,
           :fecha_nacimiento_usuario,
           :direccion_usuario,
           :estadocivil_usuario,
           :area_usuario,
           :cargo_usuario,
           :ubicacion_trabajo_usuario,
           :fecha_inicio_usuario,
           :sueldo_usuario,
           :horas_trabajo_usuario,
           :habilitado_usuario
           )';


    public static $selectEmpleadotable = 'select * from empleado where habilitado_usuario = true';
    public static $selectEmpleadotablePagination = 'select * from empleado where habilitado_usuario = true limit 10 offset ';

    public static $eliminarEmpleado = 'update empleado set habilitado_usuario = false where id_usuario = :id_usuario';

    public static $updateMostrarEmpleado = 'select * from empleado as e where e.id_usuario = :id_usuario';
    public static $editarEmpleado = 'update empleado set   nombre_usuario = :nombre_usuario, 
    rut_usuario = :rut_usuario, 
    apellido_usuario = :apellido_usuario, 
    contrasena_usuario = :contrasena_usuario, 
    email_usuario = :email_usuario, 
    telefono_usuario = :telefono_usuario, 
    region_usuario = :region_usuario, 
    ciudad_usuario = :ciudad_usuario, 
    fecha_nacimiento_usuario = :fecha_nacimiento_usuario, 
    direccion_usuario = :direccion_usuario, 
    estadocivil_usuario = :estadocivil_usuario, 
    area_usuario = :area_usuario, 
    cargo_usuario = :cargo_usuario, 
    ubicacion_trabajo_usuario = :ubicacion_trabajo_usuario, 
    fecha_inicio_usuario = :fecha_inicio_usuario, 
    sueldo_usuario = :sueldo_usuario, 
    horas_trabajo_usuario = :horas_trabajo_usuario
    where id_usuario = :id_usuario';

    public static $buscarEmpleado = 'select * from empleado where habilitado_usuario = true and rut_usuario like :rut_usuario';
    public static $buscarEmpleadoPagination = 'select * from empleado where habilitado_usuario = true and rut_usuario like :rut_usuario limit 10 offset ';

    public static $recuperarEmpleadoTabla = 'select * from empleado where habilitado_usuario = false';
    public static $recuperarEmpleadoTablaPagination = 'select * from empleado where habilitado_usuario = false limit 10 offset ';

    public static $recuperarEmpleado = 'update empleado set habilitado_usuario = true where id_usuario = :id_usuario';
}