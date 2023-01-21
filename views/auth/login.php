<head>
    <title>Login</title>
    
<head>
<body>
    <div class="container">
        <div class="position-absolute top-50 start-50 translate-middle text-center" width="480px">
            <div>
                <img src="../../dist/images/logo.png">
            </div>
            <form id="loginform" role="form">
                <div>
                    <input id="rut_usuario" class="text-center inputLogin" name="rut_usuario" type="text" placeholder="11.111.111-1"></input>
                </div>
                <p>RUT</p>
                <div>
                    <input id="contrasena_usuario" name="contrasena_usuario" class="text-center inputLogin" type="password" placeholder="****"></input>
                </div>
                <p>Contraseña</p>
                <div class="d-grid gap-2">
                    <button class="btn btn-primary" type="button" onclick="login()" id="ingresarLogin">INICIAR SESIÓN</button>
                    <!-- <button class="btn btn-primary" type="button" onclick="registrarLogin()" id="mostrarRegistrarLogin">REGISTRAR</button> -->
                </div>
            </form>
        </div>
    <div>
    <link href="../../bootstrap-5.2.2-dist/css/bootstrap.min.css" rel="stylesheet" >
    <link href="../../dist/css/style.css" rel="stylesheet" >
    <script src="../../bootstrap-5.2.2-dist/js/bootstrap.bundle.min.js"></script>
    <script src="../../dist/js/jquery.js"></script>
    <script src="../../dist/js/popper.min.js"></script>
    <script src="../../dist/js/functions.js"></script>
    <script src="../../controllers/ajax/LoginAjax.js" type="text/javascript"></script>
    <!-- JavaScript -->
    <script src="../../dist/alertifyjs/alertify.min.js"></script>


    <!-- CSS -->
    <link rel="stylesheet" href="../../dist/alertifyjs/css/alertify.min.css"/>
    <!-- Default theme -->
    <link rel="stylesheet" href="../../dist/alertifyjs/css/themes/default.min.css"/>
    <!-- Semantic UI theme -->
    <link rel="stylesheet" href="../../dist/alertifyjs/css/themes/semantic.min.css"/>
    <!-- Bootstrap theme -->
    <link rel="stylesheet" href="../../dist/alertifyjs/css/themes/bootstrap.min.css"/>

<body>