<?php
class LoginSQL
{
    public static $iniciarSesion = 'select rut_usuario, contrasena_usuario, area_usuario from empleado where rut_usuario like :rut_usuario and contrasena_usuario like :contrasena_usuario and habilitado_usuario = true';
}