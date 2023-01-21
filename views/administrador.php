<head>
    <title>Administración</title>
<head>
<body>
    <?php
        session_start();
        ?>
<div class="container-fluid bg-dark">
    <div class="row">
        <div class="col-2">
            <div class="btn-group">
            <button type="button" class="btn btn-dark">Opción</button>
            <button type="button" class="btn btn-dark dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown" aria-expanded="false">
                <span class="visually-hidden">Toggle Dropdown</span>
            </button>
            <ul class="dropdown-menu">
                <?php 
                if(isset($_SESSION['area_usuario']) && ($_SESSION['area_usuario'] == 'TRABAJADOR')){
                    echo '<li><button class="btn btn-dark w-100" onclick="mostrarTablaTrabajador(); selectEmpleadotable(1);">Trabajador</button></li>';
                }elseif(isset($_SESSION['area_usuario']) && ($_SESSION['area_usuario'] == 'PROVEEDOR')){
                // <li><button class="btn btn-dark w-100" onclick="mostrarTablaTrabajador(); selectEmpleadotable();">Trabajador</button></li>
                 echo '<li><hr class="dropdown-divider"></li>';
                 echo '<li><button class="btn btn-dark w-100" onclick="mostrarTablaProveedor()">Proveedor</button></li>';
                }elseif(isset($_SESSION['area_usuario']) && ($_SESSION['area_usuario'] == 'PRODUCTO')){
                echo '<li><hr class="dropdown-divider"></li>';
                echo '<li><button class="btn btn-dark w-100" onclick="mostrarTablaProducto(); selectProductotable(1);">Producto</button></li>';
                }elseif($_SESSION['area_usuario'] == 'ADMINISTRADOR'){
                    echo '<li><button class="btn btn-dark w-100" onclick="mostrarTablaTrabajador(); selectEmpleadotable(1);">Trabajador</button></li>';
                    echo '<li><hr class="dropdown-divider"></li>';
                    echo '<li><button class="btn btn-dark w-100" onclick="mostrarTablaProveedor(); selectProveedortable(1)">Proveedor</button></li>';
                    echo '<li><hr class="dropdown-divider"></li>';
                    echo '<li><button class="btn btn-dark w-100" onclick="mostrarTablaProducto(); selectProductotable(1);">Producto</button></li>';

                }

                
                ?>
            </ul>
            </div>
        </div>
        <div class="col-8 text-center">
            <p class="text-light">Panel de Administración</p>
        </div>
        <div class="col-1">
        </div>
        <div class="col-1">
            <button type="button" class="btn btn-dark" onclick="location.href='auth/login.php'">Cerrar sesión</button>
        </div>
    </div>
</div>
<br>
<br>
<br>

<!-- TRABAJADOR -->

<div class="container bg-dark" id="tablaTrabajador" style="display: none">
    <br>
    <div class="row">
        <div class="col-8 text-start">
            <h3 class="text-light"> Menú Trabajador</h3>
        </div>
        <div class="col-2">
        </div>
        <div class="col-2 text-end d-grid gap-2">
            <button class="btn btn-success" onclick="registrarTrabajador()">Agregar Trabajador</button>
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-6">
        </div>
        <div class="col-4 d-grid gap-2 text-right">
            <input class="text-right" id="buscarTrabajador" type="text" placeholder="11111111-1"></input>
        </div>
        <div class="col-2 text-end d-grid gap-2">
            <button class="btn btn-info" onclick="buscarTrabajador(1)">Buscar Trabajador</button>
        </div> 
    </div>
    <br>
    <div class="row">
        <div class="col-6">
        </div>
        <div class="col-4 d-grid gap-2 text-right">
            <!-- <input class="text-right" id="buscarTrabajador" type="text" placeholder="11111111-1"></input> -->
        </div>
        <div class="col-2 text-end d-grid gap-2">
            <button class="btn btn-danger" onclick="recuperarTrabajadorTabla(1)">Recuperar Trabajador</button>
        </div> 
    </div>
    <div class="row" id="ID">

    </div>
</div>
<div id="registrarTrabajador" class="modal fade">
	<div class="modal-dialog">
		<div class="modal-content">
			
            <div class="modal-header">
                <h5 class="modal-title">Registrar Trabajador</h5>
                <button type="button" class="close" onclick="cerrarTrabajador()" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">					
                <div class="form-group">
                <form id="registrarEmpleado" role="form">
                    
                    <label><p class="">Nombre</p></label>
                    <input type="text" min="0" id="nombre_usuario" name ="nombre_usuario"  maxlength="64" class="form-control"></input>
                    <label><p class="">Apellido</p></label>
                    <input type="text" min="0" id="apellido_usuario" name ="apellido_usuario"  maxlength="64" class="form-control"></input>
                    <label><p class="">Rut</p></label>
                    <input type="text" min="0" name ="rut_usuario" id="rut_usuario" maxlength="64" class="form-control"></input>
                    <label><p class="">Contraseña</p></label>
                    <input type="text" min="0" name ="contrasena_usuario" id="contrasena_usuario" maxlength="64" class="form-control"></input>
                    <label><p class="">Correo</p></label>
                    <input type="text" min="0" name ="email_usuario" id="email_usuario" maxlength="64" class="form-control"></input>
                    <label><p class="">Telefono</p></label>
                    <input type="text" min="0" name ="telefono_usuario" id="telefono_usuario" maxlength="64" class="form-control"></input>
                    <label><p class="">Region</p></label>
                    <input type="text" min="0" name ="region_usuario" id="region_usuario" maxlength="64" class="form-control"></input>
                    <label><p class="">Ciudad</p></label>
                    <input type="text" min="0" name ="ciudad_usuario" id="ciudad_usuario" maxlength="64" class="form-control"></input>
                    <label><p class="">Fecha Nacimiento</p></label>
                    <input type="date" min="0" name ="fecha_nacimiento_usuario" id="fecha_nacimiento_usuario" maxlength="64" class="form-control"></input>
                    <label><p class="">Direccion, Casa</p></label>
                    <input type="text" min="0" name ="direccion_usuario" id="direccion_usuario" maxlength="64" class="form-control"></input>
                    <label><p class="">Estado Civil</p></label>
                    <input type="text" min="0" name ="estadocivil_usuario" id="estadocivil_usuario" maxlength="64" class="form-control"></input>
                    <label><p class="">Area</p></label>
                    <!-- <input type="text" min="0" name ="area_usuario" id="area_usuario" maxlength="64" class="form-control"></input> -->
                    <select id="area_usuario" name ="area_usuario" class='form-control formatoTextoinput'>
                        <option disabled='' selected='' value="0"></option>
                        <option value='TRABAJADOR'> TRABAJADOR </option>
                        <option value='PROVEEDOR'> PROVEEDOR </option>
                        <option value='PRODUCTO'> PRODUCTO </option>
                    </select>
                    <label><p class="">Cargo</p></label>
                    <input type="text" min="0" name ="cargo_usuario" id="cargo_usuario" maxlength="64" class="form-control"></input>
                    <label><p class="">Ubicación</p></label>
                    <input type="text" min="0" name ="ubicacion_trabajo_usuario" id="ubicacion_trabajo_usuario" maxlength="64" class="form-control"></input>
                    <label><p class="">Fecha Inicio Contrato</p></label>
                    <input type="date" min="0" name ="fecha_inicio_usuario" id="fecha_inicio_usuario" maxlength="64" class="form-control"></input>
                    <label><p class="">Sueldo</p></label>
                    <input type="text" min="0" name ="sueldo_usuario" id="sueldo_usuario" maxlength="64" class="form-control"></input>
                    <label><p class="">Horas trabajo semanal</p></label>
                    <input type="text" min="0" name ="horas_trabajo_usuario" id="horas_trabajo_usuario" maxlength="64" class="form-control"></input>
                    <!-- <label><p class="">habilitado_usuario</p></label> -->
                    <!-- <input type="text" min="0" name ="habilitado_usuario" id="habilitado_usuario" maxlength="64" class="form-control"></input> -->
                </div>
            </div>
            <div class="modal-footer">
                <div class="inline pull-left">
                
                <input type="button" onclick="cerrarTrabajador()" class="btn btn-default1" data-dismiss="modal" value="Cancelar">
                </div>
                <div class="inline pull-right">
                <button type="button" onclick="registrarEmpleado()" class="btn btn-primary" value="Registrar">Registrar</button>
                </form>
                </div>
            </div>
			
		</div>
	</div>
</div>
<div id="editarTrabajador" class="modal fade">
	<div class="modal-dialog">
		<div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Editar Trabajador</h5>
                <button type="button" class="close" onclick="cerrareditarTrabajador()" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">					
                <div class="form-group">
                    <form id="formularioEditarEmpleado" role="form"> 
                    <input type="hidden" id="updateid_usuario" name="updateid_usuario">
                    <label><p class="">Nombre</p></label>
                    <input type="text" min="0" id="updatenombre_usuario" name="updatenombre_usuario" maxlength="64" class="form-control">
                    <label><p class="">Apellido</p></label>
                    <input type="text" min="0" id="updateapellido_usuario" name="updateapellido_usuario" maxlength="64" class="form-control">
                    <label><p class="">Rut</p></label>
                    <input type="text" min="0" id="updaterut_usuario" name="updaterut_usuario" maxlength="64" class="form-control" disabled>
                    <label><p class="">Contraseña</p></label>
                    <input type="text" min="0" id="updatecontrasena_usuario" name="updatecontrasena_usuario" maxlength="64" class="form-control">
                    <label><p class="">Correo</p></label>
                    <input type="text" min="0" id="updateemail_usuario" name="updateemail_usuario" maxlength="64" class="form-control">
                    <label><p class="">Telefono</p></label>
                    <input type="text" min="0" id="updatetelefono_usuario" name="updatetelefono_usuario"  maxlength="64" class="form-control">
                    <label><p class="">Region</p></label>
                    <input type="text" min="0" id="updateregion_usuario" name="updateregion_usuario"  maxlength="64" class="form-control">
                    <label><p class="">Ciudad</p></label>
                    <input type="text" min="0" id="updateciudad_usuario" name="updateciudad_usuario" maxlength="64" class="form-control">
                    <label><p class="">Fecha Nacimiento</p></label>
                    <input type="date" min="0" id="updatefecha_nacimiento_usuario" name="updatefecha_nacimiento_usuario" " maxlength="64" class="form-control">
                    <label><p class="">Direccion</p></label>
                    <input type="text" min="0" id="updatedireccion_usuario" name="updatedireccion_usuario" maxlength="64" class="form-control">
                    <label><p class="">Estado Civil</p></label>
                    <input type="text" min="0" id="updateestadocivil_usuario" name="updateestadocivil_usuario"  maxlength="64" class="form-control">
                    <label><p class="">Area</p></label>
                    <!-- <input type="text" min="0" id="updatearea_usuario" name="updatearea_usuario" maxlength="64" class="form-control"> -->
                    <select id="updatearea_usuario" name ="updatearea_usuario" class='form-control formatoTextoinput'>
                        <option disabled='' selected='' value="0"></option>
                        <option value='TRABAJADOR'> TRABAJADOR </option>
                        <option value='PROVEEDOR'> PROVEEDOR </option>
                        <option value='PRODUCTO'> PRODUCTO </option>
                    </select>
                    <label><p class="">Cargo</p></label>
                    <input type="text" min="0" id="updatecargo_usuario" name="updatecargo_usuario" maxlength="64" class="form-control">
                    <label><p class="">Ubicacion</p></label>
                    <input type="text" min="0" id="updateubicacion_trabajo_usuario" name="updateubicacion_trabajo_usuario" maxlength="64" class="form-control">
                    <label><p class="">Fecha inicio Contrato</p></label>
                    <input type="text" min="0" id="updatefecha_inicio_usuario" name="updatefecha_inicio_usuario"  maxlength="64" class="form-control">
                    <label><p class="">Sueldo</p></label>
                    <input type="text" min="0" id="updatesueldo_usuario" name="updatesueldo_usuario" maxlength="64" class="form-control">
                    <label><p class="">horas trabajo semanal</p></label>
                    <input type="text" min="0" id="updatehoras_trabajo_usuario" name="updatehoras_trabajo_usuario" maxlength="64" class="form-control">
                </div>
            </div>
            <div class="modal-footer">
                <div class="inline pull-left">
                
                <input type="button" onclick="cerrareditarTrabajador()" class="btn btn-default1" data-dismiss="modal" value="Cancelar">
                </div>
                <div class="inline pull-right">
                <button type="button" onclick="editarEmpleado()" class="btn btn-warning" value="Editar">EDITAR</button>
                </form>
                </div>
            </div>
			
		</div>
	</div>
</div>
<div id="mostrarTrabajador" class="modal fade">
	<div class="modal-dialog">
		<div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Editar Trabajador</h5>
                <button type="button" class="close" onclick="cerrarmostrarTrabajador()" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">					
                <div class="form-group">
                    <form id="formularioEditarEmpleado" role="form"> 
                    <input type="hidden" id="detalleid_usuario" name="detalleid_usuario">
                    <label><p class="">Nombre</p></label>
                    <input type="text" min="0" id="detallenombre_usuario" name="detallenombre_usuario" maxlength="64" class="form-control" disabled>
                    <label><p class="">Apellido</p></label>
                    <input type="text" min="0" id="detalleapellido_usuario" name="detalleapellido_usuario" maxlength="64" class="form-control" disabled>
                    <label><p class="">Rut</p></label>
                    <input type="text" min="0" id="detallerut_usuario" name="detallerut_usuario" maxlength="64" class="form-control" disabled>
                    <label><p class="">Contraseña</p></label>
                    <input type="text" min="0" id="detallecontrasena_usuario" name="detallecontrasena_usuario" maxlength="64" class="form-control" disabled>
                    <label><p class="">Correo</p></label>
                    <input type="text" min="0" id="detalleemail_usuario" name="detalleemail_usuario" maxlength="64" class="form-control" disabled>
                    <label><p class="">Telefono</p></label>
                    <input type="text" min="0" id="detalletelefono_usuario" name="detalletelefono_usuario"  maxlength="64" class="form-control" disabled>
                    <label><p class="">Region</p></label>
                    <input type="text" min="0" id="detalleregion_usuario" name="detalleregion_usuario"  maxlength="64" class="form-control" disabled>
                    <label><p class="">Ciudad</p></label>
                    <input type="text" min="0" id="detalleciudad_usuario" name="detalleciudad_usuario" maxlength="64" class="form-control" disabled>
                    <label><p class="">Fecha Nacimiento</p></label>
                    <input type="date" min="0" id="detallefecha_nacimiento_usuario" name="detallefecha_nacimiento_usuario" " maxlength="64" class="form-control" disabled>
                    <label><p class="">Direccion</p></label>
                    <input type="text" min="0" id="detalledireccion_usuario" name="detalledireccion_usuario" maxlength="64" class="form-control" disabled>
                    <label><p class="">Estado Civil</p></label>
                    <input type="text" min="0" id="detalleestadocivil_usuario" name="detalleestadocivil_usuario"  maxlength="64" class="form-control" disabled>
                    <label><p class="">Area</p></label>
                    <input type="text" min="0" id="detallearea_usuario" name="detallearea_usuario" maxlength="64" class="form-control" disabled>
                    <!-- <select id="detallearea_usuario" name ="detallearea_usuario" class='form-control formatoTextoinput'>
                        <option disabled='' selected='' value="0"></option>
                        <option value='TRABAJADOR'> TRABAJADOR </option>
                        <option value='PROVEEDOR'> PROVEEDOR </option>
                        <option value='PRODUCTO'> PRODUCTO </option>
                    </select> -->
                    <label><p class="">Cargo</p></label>
                    <input type="text" min="0" id="detallecargo_usuario" name="detallecargo_usuario" maxlength="64" class="form-control" disabled>
                    <label><p class="">Ubicacion</p></label>
                    <input type="text" min="0" id="detalleubicacion_trabajo_usuario" name="detalleubicacion_trabajo_usuario" maxlength="64" class="form-control" disabled>
                    <label><p class="">Fecha inicio</p></label>
                    <input type="text" min="0" id="detallefecha_inicio_usuario" name="detallefecha_inicio_usuario"  maxlength="64" class="form-control" disabled>
                    <label><p class="">Sueldo</p></label>
                    <input type="text" min="0" id="detallesueldo_usuario" name="detallesueldo_usuario" maxlength="64" class="form-control" disabled>
                    <label><p class="">horas trabajo semanal</p></label>
                    <input type="text" min="0" id="detallehoras_trabajo_usuario" name="detallehoras_trabajo_usuario" maxlength="64" class="form-control" disabled>
                </div>
            </div>
            <div class="modal-footer">
                <div class="inline pull-left">
                
                <input type="button" onclick="cerrarmostrarTrabajador()" class="btn btn-default1" data-dismiss="modal" value="Cancelar">
                </div>
                <div class="inline pull-right">
                <!-- <button type="button" onclick="imprimirEmpleado()" class="btn btn-danger" value="Editar">IMPRIMIR</button> -->
                </form>
                </div>
            </div>
			
		</div>
	</div>
</div>

<!-- PROVEEDOR -->

<div class="container bg-dark" id="tablaProveedor"  style="display: none">
    <br>
    <div class="row">
        <div class="col-8 text-start">
            <h3 class="text-light"> Menú Proveedor</h3>
        </div>
        <div class="col-4 text-end">
            <button class="btn btn-success" onclick="registrarProveedor()">Agregar Proveedor</button>
        </div>
        <div class="row">
        <div class="col-6">
        </div>
        <div class="col-4 d-grid gap-2 text-right">
            <input class="text-right" id="buscarProveedor" type="text" placeholder="Buscar proveedor"></input>
        </div>
        <div class="col-2 text-end d-grid gap-2">
            <button class="btn btn-info" onclick="buscarProveedor(1)">Buscar Proveedor</button>
        </div> 
    </div>

    <br>
    <div class="row">
        <div class="col-6">
        </div>
        <div class="col-4 d-grid gap-2 text-right">
            <!-- <input class="text-right" id="buscarTrabajador" type="text" placeholder="11111111-1"></input> -->
        </div>
        <div class="col-2 text-end d-grid gap-2">
            <button class="btn btn-danger" onclick="mostrarTablaProveedor();recuperarProveedorTabla()">Recuperar Proveedor</button>
            <form method="get" action="reporte-prov.php">
            <div>
                <button class="btn btn-primary" href="reporte-prov.php">GENERAR REPORTE</button>
            </div>
            </form>
        </div> 
    </div>
    <div class="row" id="tablaProveedorMostrar">

    </div>

    
</div>
<div id="registrarProveedor" class="modal fade">
	<div class="modal-dialog">
		<div class="modal-content">
			<form>
            <div class="modal-header">
                <h5 class="modal-title">Registrar Proveedor</h5>
                <button type="button" class="close" onclick="cerrarRegistrarProveedor()" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">					
                <div class="form-group" role = "form">

                    <input type="hidden" id="updateid_proveedor">
                    <!-- label><p class="">ID Proveedor</p></label>
                    <input type="text" min="0" id="id_proveedor" maxlength="64" class="form-control"> -->
                    <label><p class="">Rut Proveedor</p></label>
                    <input type="text" min="0" id="rut_proveedor" maxlength="64" class="form-control">
                    <label><p class="">Nombre Proveedor</p></label>
                    <input type="text" min="0" id="nombre_proveedor" maxlength="64" class="form-control">
                    <label><p class="">Email Proveedor</p></label>
                    <input type="text" min="0" id="email_proveedor" maxlength="64" class="form-control">
                    <label><p class=""> Telefono Proveedor</p></label>
                    <input type="text" min="0" id="telefono_proveedor" maxlength="64" class="form-control">
                    <label><p class="">Area Proveedor</p></label>
                    <input type="text" min="0" id="area_proveedor" maxlength="64" class="form-control">
                    <label><p class="">Empresa Proveedor</p></label>
                    <input type="text" min="0" id="nombre_empresa_proveedor" maxlength="64" class="form-control">
                    <label><p class="">Cargo Proveedor</p></label>
                    <input type="text" min="0" id="cargo_proveedor" maxlength="64" class="form-control">
                    <label><p class="">Ubicacion Proveedor</p></label>
                    <input type="text" min="0" id="ubicacion_proveedor" maxlength="64" class="form-control">
                    <label><p class="">Descripcion Proveedor</p></label>
                    <input type="text" min="0" id="descripcion_proveedor" maxlength="64" class="form-control">
                    <label><p class="">Producto Proveedor</p></label>
                    <input type="text" min="0" id="tipo_producto_proveedor" maxlength="64" class="form-control">
                    
                </div>
            </div>
            <div class="modal-footer">
                <div class="inline pull-left">
                
                <input type="button" onclick="cerrarRegistrarProveedor()" class="btn btn-default1" data-dismiss="modal" value="Cancelar">
                </div>
                <div class="inline pull-right">
                <input type="button" onclick="registrarProveedordatos()" class="btn btn-primary" value="Registrar">
                </div>
            </div>
			</form>
		</div>
	</div>
</div>
<div id="editarProveedor" class="modal fade">
	<div class="modal-dialog">
		<div class="modal-content">
			
            <div class="modal-header">
                <h5 class="modal-title">Editar Proveedor</h5>
                <button type="button" class="close" onclick="cerrarRegistrarCliente()" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">					
                <div class="form-group">
                <form id="formularioEditarProveedor">
                    <label><p class="">Rut Proveedor</p></label>
                    <input type="text" min="0" id="updaterut_proveedor" maxlength="64" class="form-control" disabled>
                    <label><p class="">Nombre Empleado</p></label>
                    <input type="text" min="0" id="updatenombre_proveedor" maxlength="64" class="form-control">
                    <label><p class="">Email Proveedor</p></label>
                    <input type="text" min="0" id="updateemail_proveedor" maxlength="64" class="form-control">
                    <label><p class=""> Telefono Proveedor</p></label>
                    <input type="text" min="0" id="updatetelefono_proveedor" maxlength="64" class="form-control">
                    <label><p class="">Area Proveedor</p></label>
                    <input type="text" min="0" id="updatearea_proveedor" maxlength="64" class="form-control">
                    <label><p class="">Empresa Proveedor</p></label>
                    <input type="text" min="0" id="updatenombre_empresa_proveedor" maxlength="64" class="form-control">
                    <label><p class="">Cargo Proveedor</p></label>
                    <input type="text" min="0" id="updatecargo_proveedor" maxlength="64" class="form-control">
                    <label><p class="">Ubicacion Proveedor</p></label>
                    <input type="text" min="0" id="updateubicacion_proveedor" maxlength="64" class="form-control">
                    <label><p class="">Descripcion Proveedor</p></label>
                    <input type="text" min="0" id="updatedescripcion_proveedor" maxlength="64" class="form-control">
                    <label><p class="">Producto Proveedor</p></label>
                    <input type="text" min="0" id="updatetipo_producto_proveedor" maxlength="64" class="form-control">
                </div>
            </div>
            <div class="modal-footer">
                <div class="inline pull-left">
                
                <input type="button" onclick="cerrarRegistrarCliente()" class="btn btn-default1" data-dismiss="modal" value="Cancelar">
                </div>
                <div class="inline pull-right">
                <input type="button" onclick="editarProveedor()" class="btn btn-warning" value="Editar">
                </div>
            </div>
			</form>
		</div>
	</div>
</div>
            </div>

<!-- PRODUCTO -->

<div class="container bg-dark" id="tablaProducto"  style="display: none">
    <br>
    <div class="row">
        <div class="col-8 text-start">
            <h3 class="text-light"> Menú Producto</h3>
        </div>
        <div class="col-4 text-end">
            <button class="btn btn-success" onclick="registrarProducto()">Agregar Producto</button>
        </div>
        <div class="row">
        <div class="col-6">
        </div>
        <div class="col-4 d-grid gap-2 text-right">
            <input class="text-right" id="buscarProducto" type="text" placeholder="Buscar producto"></input>
        </div>
        <div class="col-2 text-end d-grid gap-2">
            <button class="btn btn-info" onclick="buscarProducto(1)">Buscar Producto</button>
        </div> 
        
    </div>

    <br>
    <div class="row">
        <div class="col-6">
        </div>
        <div class="col-4 d-grid gap-2 text-right">
            <!-- <input class="text-right" id="buscarTrabajador" type="text" placeholder="11111111-1"></input> -->
        </div>
        <div class="col-2 text-end d-grid gap-2">
            <button class="btn btn-danger" onclick="mostrarTablaProducto();recuperarProductoTabla()">Recuperar Producto</button>
            <form method="get" action="reporte-prod.php">
            <div>
                <button class="btn btn-primary" href="reporte-prod.php">GENERAR REPORTE</button>
            </div>
            </form>
        </div> 

    </div>
    <div class="row" id="tablaProductoMostrar">

    </div>
    <br>
    
    
   
            
    
    </div>
</div>
<div id="registrarProducto" class="modal fade">
	<div class="modal-dialog">
		<div class="modal-content">
			<form>
            <div class="modal-header">
                <h5 class="modal-title">Agregar Producto</h5>
                <button type="button" class="close" onclick="cerrarRegistrarCliente()" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">					
                <div class="form-group">
                <form id="registrarProductoForm" role="form">
                    <label><p class="">Proveedor</p></label>
                    <select id="id_proveedor" class='form-control formatoTextoinput'>
					</select>
                    <label><p class="">Categoria</p></label>
                    <select id="id_categoria" class='form-control formatoTextoinput'>
                    </select>
                    <label><p class="">Nombre Producto</p></label>
                    <input type="text" min="0" name ="nombre_producto" id="nombre_producto" maxlength="64" class="form-control"></input>
                    <label><p class="">Codigo Producto</p></label>
                    <input type="text" min="0" name ="codigo_producto" id="codigo_producto" maxlength="64" class="form-control"></input>
                    <label><p class="">Descripción</p></label>
                    <input type="text" min="0" name ="descripcion_producto" id="descripcion_producto" maxlength="64" class="form-control"></input>
                    <label><p class="">Precio</p></label>
                    <input type="text" min="0" name ="precio_producto" id="precio_producto" maxlength="64" class="form-control"></input>
                    <label ><p for="quantity">Cantidad (entre 1 y 999):</p></label>
                    <input type="number" id="cantidad" name="cantidad" min="1" max="999"></input>
                </form>    
                </div>
            </div>
                <div class="inline pull-left">
                
                <input type="button" onclick="cerrarRegistrarCliente()" class="btn btn-default1" data-dismiss="modal" value="Cancelar">
                </div>
                <div class="inline pull-right">
                <button type="button" onclick="registrarProductodatos()" class="btn btn-primary" value="Registrar">Registrar</button>
                
                </div>
            </div>
			
		</div>
	</div>
</div>
<div id="editarProducto" class="modal fade">
	<div class="modal-dialog">
		<div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Editar Producto</h5>
                <button type="button" class="close" onclick="cerrarEditarProducto()" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">					
                <div class="form-group">
                   
                    <label><p class="">Proveedor</p></label>
                    <select id="updateid_proveedor_producto" class='form-control formatoTextoinput'>
					</select>
                    <label><p class="">Categoria</p></label>
                    <select id="updateid_categoria" class='form-control formatoTextoinput'>
                    </select>
                    <form id="formularioEditarProducto" role="form"> 
                    <input type="hidden" id="updateid_producto" name="updateid_producto">
                    <label><p class="">NOMBRE</p></label>
                    <input type="text" min="0" id="updatenombre_producto" name="updatenombre_producto" maxlength="64" class="form-control">
                    <label><p class="">CODIGO</p></label>
                    <input type="text" min="0" id="updatecodigo_producto" name="updatecodigo_producto" maxlength="64" class="form-control">
                    <label><p class="">DESCRIPCION</p></label>
                    <input type="text" min="0" id="updatedescripcion_producto" name="updatedescripcion_producto"  maxlength="64" class="form-control">
                    <label><p class="">PRECIO</p></label>
                    <input type="text" min="0" id="updateprecio_producto" name="updateprecio_producto"  maxlength="64" class="form-control">
                    <label for="quantity">Cantidad (entre 1 y 999):</label>
                    <input type="number" id="updatecantidad" name="updatecantidad" min="1" max="999"></input>
                </div>
            </div>
            <div class="modal-footer">
                <div class="inline pull-left">
                
                <input type="button" onclick="cerrareditarProducto()" class="btn btn-default1" data-dismiss="modal" value="Cancelar">
                </div>
                <div class="inline pull-right">
                <button type="button" onclick="editarProducto()" class="btn btn-warning" value="Editar">EDITAR</button>
                </form>
                </div>
            </div>
			
		</div>
	</div>
</div>
    <br>
    <br>
    <br>
    <br>
    <link href="../bootstrap-5.2.2-dist/css/bootstrap.min.css" rel="stylesheet" >
    <link href="../dist/css/style.css" rel="stylesheet" >
    <script src="../bootstrap-5.2.2-dist/js/bootstrap.bundle.min.js"></script>
    <script src="../dist/js/jquery.js"></script>
    <script src="../dist/js/popper.min.js"></script>
    <script src="../dist/js/functions.js"></script>
    <script src="../../controllers/ajax/EmpleadoAjax.js" type="text/javascript"></script>
    <script src="../../controllers/ajax/ProductoAjax.js" type="text/javascript"></script>
    <script src="../../controllers/ajax/ProveedorAjax.js" type="text/javascript"></script>
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