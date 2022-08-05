<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

//Preguntar si existe el archivo
  //vamos a leerlo y almacenarlo en jsonClientes

  if(file_exists("archivo.txt")){
    $jsonClientes = file_get_contents("archivo.txt");

    $aClientes = json_decode($jsonClientes, true);
    
  }else{
    $aClientes = array() ;
  }

    //Convertir jsonClientes en un array llamado aClientes

//Si no existe el archivo
    //Creamos un aClientes inicializado como un array vacio

    $pos = isset($_GET["pos"]) && $_GET["pos"] >= 0? $_GET["pos"]:"";

if($_POST){

$nombre = trim($_POST["txtNombre"]);
$documento = trim($_POST["txtDocumento"]);
$telefono = trim($_POST["txtTelefono"]);
$correo = trim($_POST["txtCorreo"]);

//Creamos un array que contendrá el listado de clientes

if($pos>=0){
    //Actualizar
    $aClientes[$pos] = array("documento" => $documento,
                     "nombre" => $nombre,
                     "telefono" => $telefono,
                     "correo" => $correo,
                     "imagen" => $nombreImagen);

}else{
    //Insertar

    $aClientes[] = array("documento" => $documento,
                     "nombre" => $nombre,
                     "telefono" => $telefono,
                     "correo" => $correo,
                     "imagen" => $nombreImagen);
}
//Convertir el array de acliente en json

$jsonClientes = json_encode($aClientes);


//Almacenar el string jsonClientes en el archivo "archivo.txt"
file_put_contents("archivo.txt", $jsonClientes);


}

if(isset($_GET["do"]) && $_GET["do"] == "eliminar"){
   unset($aClientes[$pos]);

   //Convertir el array de clientes en jsonClientes
   $jsonClientes = json_encode($aClientes);

   //Almacenar el string jsonClientes en el "archivo.txt"

   file_put_contents("archivo.txt", $jsonClientes,);
   header("location:index.php");
}


?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
</head>
<body>
<main class="container">
        <div class="row text-center py-4">
            <div class="col-12">
                <h1>Registro de clientes</h1>
            </div>
        </div>
        <form action="" method="POST" enctype="multipart/form-data">
        <div class="row">
            <div class="col-5">

            <div class="pb-2">
                    <label for=" txtDocumento">DNI:</label>
                    <input type="text" name="txtDocumento" id="txtDocumento" class="form-control my-1" require value="<?php echo isset($aClientes[$pos])? $aClientes[$pos]["documento"] : ""; ?>">
                </div>

                <div class="pb-2">
                    <label for="txtNombre">Nombre:</label>
                    <input type="text" name="txtNombre" id="txtNombre" class="form-control my-1" require value="<?php echo isset($aClientes[$pos])? $aClientes[$pos]["nombre"] : ""; ?>">
                </div>

                <div class="pb-2">
                    <label for=" txtTelefono">Telefono:</label>
                    <input type="text" name="txtTelefono" id="txtTelefono" class="form-control my-1" require value="<?php echo isset($aClientes[$pos])? $aClientes[$pos]["telefono"] : ""; ?>">
                </div>

                <div class="pb-2">
                    <label for="txtCorreo">Correo:</label>
                    <input type="text" name="txtCorreo" id="txtCorreo" class="form-control my-1" require value="<?php echo isset($aClientes[$pos])? $aClientes[$pos]["correo"] : ""; ?>">
                </div>
                <div class="pb-2">
                   <label for="">Adjuntar archivo: </label>
                   <input type="file" name="archivo" id="archivo" class="my-2">  <br>   
                    <small class="d-block"> Archivos admitidos: .jpg, .jpeg, .png </small>
                </div>
                <div class="pb-2">
                    <button class="btn btn-primary" name="btnGuardar" id="btnGuardar">Guardar</button>
                    <a href="index.php" class="btn btn-danger my-2">Nuevo</a>
                    
                </div>
                
                
            </div>


            <div class="col-5 offset-1 mt-4">
                <table class="table table-hover border">
                    <thead>
                        <tr>
                            <th>Imagen:</th>
                            <th>DNI:</th>
                            <th>Nombre:</th>
                            <th>Correo:</th>
                            <th>Acciones:</th>
                            
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($aClientes as $pos => $cliente):  ?>
                        <tr>
                            <td></td>
                            <td><?php echo $cliente["documento"]; ?></td>
                            <td><?php echo $cliente["nombre"]; ?></td>
                            <td><?php echo $cliente["correo"]; ?></td>
                            <td>
                                <a href="index.php?pos=<?php echo $pos; ?>&do=editar"><i class="bi bi-pencil"></i></a>
                                <a href="index.php?pos=<?php echo $pos; ?>&do=eliminar"><i class="bi bi-trash3-fill"></i></a>
                            </td>
                            
                            <td></td>
                            
                        </tr>
                        <?php endforeach ?>
                    </tbody>

                </table>
            </div>
        </div>
        </form>     

    </main>
    
</body>
</html>