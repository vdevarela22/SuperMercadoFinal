<?php

?>

<head>
    <title>Finalizar Compra</title>

    <head>

    <body>
        <div class="container-fluid bg-warning">
            <div class="row">
                <div class="col-2">
                    <a href="../index.php"> Tienda </a>
                </div>
                <div class="col-4">
                    <a>Quienes somos</a>
                </div>
                <div class="col-4">
                </div>
                <div class="col-1">
                </div>
                <div class="col-1">
                    <div class="dropdown">
                        <button class="btn btn-dark btn-lg float-right text-align-right" data-bs-toggle="dropdown"><img
                                src="images/logo.png" width="30px" height="30px"></button>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">Producto 1</a></li>
                            <li><a class="dropdown-item" href="#">Producto 2</a></li>
                            <button class="btn btn-primary btn-lg btn-block w-100"
                                onclick="location.href='carrito.php'">Pagar</button>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <br>
        <br>
        <br>
        <div class="container">
            <div class="row">
                <div class="col-12 text-center">
                    <h2>Finalizar Compra</h2>
                </div>
            </div>
            <div class="row">
                <div class="col-6">
                    <div class="col-12 text-start">
                        <h3>Detalles de Facturación</h3>
                    </div>
                    <form id="registrarCliente" role="form">
                        <input type="hidden" id="id_cliente">
                        <label>
                            <p class="">Nombre</p>
                        </label>
                        <input type="text" min="0" id="nombre_cliente" name="nombre_cliente" maxlength="64"
                            class="form-control" >
                        <input type="hidden" id="id_cliente">
                        <label>
                            <p class="">Apellido</p>
                        </label>
                        <input type="text" min="0" id="apellido_cliente" name="apellido_cliente" maxlength="64"
                            class="form-control" >
                            <input type="hidden" id="id_cliente">
                        <label>
                            <p class="">Region</p>
                        </label>
                        <input type="text" min="0" id="region_cliente" name="region_cliente" maxlength="64"
                            class="form-control" >
                        <input type="hidden" id="id_cliente">
                        <label>
                            <p class="">Ciudad</p>
                        </label>
                        <input type="text" min="0" id="ciudad_cliente" name="ciudad_cliente" maxlength="64"
                            class="form-control" >
                        <input type="hidden" id="id_cliente">
                        <label>
                            <p class="">Direccion</p>
                        </label>
                        <input type="text" min="0" id="direccion_cliente" name="direccion_cliente" maxlength="64"
                            class="form-control" >
                        <input type="hidden" id="id_cliente">
                        <label>
                            <p class="">Departamento o Casa</p>
                        </label>
                        <input type="text" min="0" id="formato_casa_cliente" name="formato_casa_cliente"
                            maxlength="64" class="form-control" >
                        <input type="hidden" id="id_cliente">
                        <label>
                            <p class="">Código Postal</p>
                        </label>
                        <input type="text" min="0" id="codigo_postal_cliente" name="codigo_postal_cliente"
                            maxlength="64" class="form-control" >
                        <input type="hidden" id="id_cliente">
                        <label>
                        <p class="">Email</p>
                        </label>
                        <input type="text" min="0" id="email_cliente" name="email_cliente" maxlength="64"
                            class="form-control" >
                        <input type="hidden" id="id_cliente">
                        <!-- <label>
                            <p class="">Formato pago</p>
                        </label> -->
                        <input type="hidden" min="0" id="formato_pago_cliente" name="formato_pago_cliente" maxlength="64"
                            class="form-control" >

                        <!-- <select id="detallearea_usuario" name ="detallearea_usuario" class='form-control formatoTextoinput'>
                        <option disabled='' selected='' value="0"></option>
                        <option value='TRABAJADOR'> TRABAJADOR </option>
                        <option value='PROVEEDOR'> PROVEEDOR </option>
                        <option value='PRODUCTO'> PRODUCTO </option>
                    </select> -->

                        <button type="button" onclick="registrarCliente()" class="btn btn-danger"
                            value="Editar">Agregar</button>
                        </form>
                </div>
        
        



            <br>
        <div class="col-6">
            <div class="row">
                <div class="col-12 text-end">
                    <h3>Tu pedido</h3>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <table class="table">
                        <thead class="table-dark">

                        </thead>
                        <tbody>

                            <tr>
                                <th scope="row">Total</th>
                                <td class="text-end" colspan="2"><input id="totalCarrito" disabled></input></td>
                            </tr>
                        </tbody>
                    </table>

                </div>
                <div class="col-12">
                    <div id="webpay">
                        
                    </div>
                <!-- <?php
                // echo "<form method='post' action=$url>
        
                //     <input type='hidden' id='token_ws' name='token_ws' value='$token'>
                //     <input class='btn btn-primary btn-lg btn-block'type='submit' value='Ir a pagar' />
                // </form>";
                ?> -->
            <!-- <button type="button" class='btn btn-dark' onclick="registrarCliente()">Realizar Pedido</button> -->
                </div>
            </div>
        </div>
        </div>
        </div>
        <link href="../bootstrap-5.2.2-dist/css/bootstrap.min.css" rel="stylesheet">
        <link href="../dist/css/style.css" rel="stylesheet">
        <script src="../bootstrap-5.2.2-dist/js/bootstrap.bundle.min.js"></script>
        <script src="../dist/js/jquery.js"></script>
        <script src="../dist/js/popper.min.js"></script>
        <script src="../dist/js/functions.js"></script>
        <script src="../controllers/ajax/ClienteAjax.js" type="text/javascript"></script>
        <!-- JavaScript -->
        <script src="../dist/alertifyjs/alertify.min.js"></script>
        <script src="../Controllers/ajax/FinalizarCompraAjax.js"></script>
            <!-- CSS -->
    <link rel="stylesheet" href="../../dist/alertifyjs/css/alertify.min.css"/>
    <!-- Default theme -->
    <link rel="stylesheet" href="../../dist/alertifyjs/css/themes/default.min.css"/>
    <!-- Semantic UI theme -->
    <link rel="stylesheet" href="../../dist/alertifyjs/css/themes/semantic.min.css"/>
    <!-- Bootstrap theme -->
    <link rel="stylesheet" href="../../dist/alertifyjs/css/themes/bootstrap.min.css"/>

<body>