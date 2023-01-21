<?php
class ClienteSQL
{
    public static $registrarCliente = 'INSERT INTO cliente ( 
        nombre_cliente, 
        apellido_cliente, 
        region_cliente, 
        ciudad_cliente, 
        direccion_cliente, 
        formato_casa_cliente, 
        codigo_postal_cliente,
        email_cliente,
        formato_pago_cliente)
                              VALUES(:nombre_cliente,
                                     :apellido_cliente,
                                     :region_cliente,
                                     :ciudad_cliente,
                                     :direccion_cliente,
                                     :formato_casa_cliente,
                                     :codigo_postal_cliente,
                                     :email_cliente,
                                     :formato_pago_cliente) returning id_cliente as id_cliente';

}