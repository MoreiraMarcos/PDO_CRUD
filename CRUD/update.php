<?php
require "crud/Conexion.php";
require "crud/Crud.php";

if(isset($_REQUEST["id_producto"]))
{
    $id_producto = htmlspecialchars($_REQUEST["id_producto"]);
    $model = new Crud();
    $model->select = "*";
    $model->from = "productos";
    $model->condition = "id_producto=$id_producto";
    $model->Read();
    $filas = $model->rows;
    foreach($filas as $fila)
    {
        $nombre = $fila["nombre"];
        $descripcion = $fila["descripcion"];
        $categoria = $fila["categoria"];
        $precio = $fila["precio"];
    }
    
}
$mensaje = null;
if(isset($_POST["update"]))
{
   $id_producto = htmlspecialchars($_POST["id_producto"]);
   $nombre = htmlspecialchars($_POST["nombre"]);
   $descripcion = htmlspecialchars($_POST["descripcion"]);
   $categoria = htmlspecialchars($_POST["categoria"]);
   $precio = htmlspecialchars($_POST["precio"]);
   
   $model = new Crud();
   $model->update = "productos";
   $model->set = "nombre='$nombre', descripcion='$descripcion', categoria='$categoria', precio='$precio'";
   $model->condition = "id_producto=$id_producto";
   $model->Update();
   $mensaje = $model->mensaje;
}
?>
<!DOCTYPE HTML>
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="stylesheet.css"/>
    </head>
    <head>       
        <title>Mi sitio | CRUD</title>   
    </head>
    <body>
        <div id="contenido">
            <header>
                <hgroup>
                    <h1>CRUD : Update. Tabla productos</h1>
                </hgroup>
            </header>
            <strong><?php echo $mensaje;?></strong>
            <br><br>
            <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                <center>
                    <table>
                        <tr>
                            <td><span><strong>Nombre:</strong></span></td>
                            <td><input type="text" name="nombre" value="<?php echo $nombre ?>"></td>
                        </tr>
                         <tr>
                            <td><span><strong>Descripcion:</strong></span></td>
                            <td><textarea name="descripcion" cols="30" rows="10" ><?php echo $descripcion ?></textarea></td>
                        </tr>
                         <tr>
                            <td><span><strong>Categoria:</strong></span></td>
                            <td><input type="text" name="categoria" value="<?php echo $categoria ?>"></td>
                        </tr>
                         <tr>
                            <td><span><strong>Precio:</strong></span></td>
                            <td><input type="text" name="precio" value="<?php echo $precio ?>"></td>
                        </tr>
                    </table>
                    <input type="hidden" name="update">
                    <input type="hidden" name="id_producto" value="<?php echo $id_producto;?>">
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <a href="read.php">Regresar a la lista de productos</a>
                    <input type="submit" value="Actualizar">
                </center><hr>
            </form>
        </div>
    </body>
</html>


