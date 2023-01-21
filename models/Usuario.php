<?php
class Usuario {
    // Properties
    private $rut_usuario;
    private $contrasena_usuario;
  
    // Methods
    function get_rut_usuario() {
      return $this->rut_usuario;
    }
    function get_contrasena_usuario() {
      return $this->contrasena_usuario;
    }


    public function __construct($rut_usuario, $contrasena_usuario) {
        $this->rut_usuario = $rut_usuario;
        $this->contrasena_usuario = $contrasena_usuario;
    }
  }
?>
