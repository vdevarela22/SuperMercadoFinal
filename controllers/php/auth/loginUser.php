<?php
require_once '../../../models/Usuario.php';
require_once '../../../dal/loginDal.php';

$usuario = new Usuario($_POST['rut_usuario'], $_POST['contrasena_usuario']);
$res = LoginDal::__logear($usuario);
if($res != null){
    session_start();
    $_SESSION['area_usuario'] = $res['area_usuario'];
    echo 1;
}
?>