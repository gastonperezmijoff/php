
<?php

include_once "config.php";
include_once "entidades/usuario.php";

$usuario = new Usuario();

if($_POST){
    if(isset($_POST["btnGuardar"])){

        $usuario->cargarFormulario($_REQUEST);

        if (isset($_GET["id"]) && $_GET["id"] > 0 ){
            $usuario->actualizar();
            $msg["texto"] = "Actualizado correctamente";
            $msg["codigo"] = "alert-success";
            }else{           
            $usuario->insertar();
            $msg["texto"] = "Insertado correctamente";
            $msg["codigo"] = "alert-success";     
            }   
    }else if(isset($_POST["btnBorrar"])){
        $usuario->cargarFormulario($_REQUEST);
        $usuario->eliminar();
        header("Location: usuario-formulario.php");
    }
}

if(isset($_GET["id"]) && $_GET["id"] > 0 ){
    $usuario ->cargarFormulario($_REQUEST);
    $usuario ->obtenerPorId();
}

$usuario = new Usuario();
$aUsuarios = $usuario->obtenerTodos();

include_once("header.php");

?>
        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800">Usuario</h1>
            <div class="row">
                <div class="col-12 mb-3">
                    <a href="usuario-listado.php" class="btn btn-primary mr-2">Listado</a>
                    <a href="usuario-formulario.php" class="btn btn-primary mr-2">Nuevo</a>
                    <button type="submit" class="btn btn-success mr-2" id="btnGuardar" name="btnGuardar">Guardar</button>
                    <button type="submit" class="btn btn-danger" id="btnBorrar" name="btnBorrar">Borrar</button>
                </div>
            </div>
            <div class="row">
                <div class="col-6 form-group">
                    <label for="txtNombre">Usuario:</label>
                    <input type="text" required class="form-control" name="txtUsuario" id="txtUsuario" value="<?php echo $usuario->usuario ?>">
                </div>
                <div class="col-6 form-group">
                    <label for="txtCuit">Nombre:</label>
                    <input type="text" required class="form-control" name="txtNombre" id="txtNombre" value="<?php echo $usuario->nombre ?>">
                </div>
                <div class="col-6 form-group">
                    <label for="txtCuit">Apellido:</label>
                    <input type="text" required class="form-control" name="txtApellido" id="txtApellido" value="<?php echo $usuario->apellido ?>">
                </div>
                <div class="col-6 form-group">
                    <label for="txtCorreo">Correo:</label>
                    <input type="email" class="form-control" name="txtCorreo" id="txtCorreo" required value="<?php echo $usuario->correo ?>">
                </div>
                <div class="col-6 form-group">
                    <label for="txtCorreo">Clave:</label>
                    <input type="password" class="form-control" name="txtClave" id="txtClave" value="">
                    <small>Completar únicamente para cambiar la clave</small>
                </div>
            </div>
        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->
<?php include_once "footer.php";?>