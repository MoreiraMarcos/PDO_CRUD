<?php
require "crud/Conexion.php";
require "crud/Crud.php";
$mensaje = null;
if(isset($_POST["delete"]))
{
    $id_producto = htmlspecialchars($_POST["id_producto"]);
    if(!is_numeric($id_producto))
    {
        header("location: read.php");
    }else{
        $model = new Crud;
        $model->deleteFrom = "productos";
        $model->condition = "id_producto=$id_producto";
        $model->Delete();
        $mensaje = $model->mensaje;
    }
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
                    <h1>CRUD : Delete. Tabla productos</h1>
                </hgroup>
            </header>
            <?php if(isset($_GET["id_producto"])): ?>
            <strong>Desea eliminar el producto <?php echo htmlspecialchars($_GET["id_producto"])?></strong><br><br>
            <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                <center>
                    <table>
                    <input type="hidden" name="delete">
                    <input type="hidden" name="id_producto" value="<?php echo htmlspecialchars($_GET["id_producto"]) ?>">
                    <input type="submit" value="Eliminar">
                    </table>
                </center>
            </form>
            <?php endif ?>
            <strong><?php echo $mensaje ?></strong>
            <br><br><hr>
            <br><a href="read.php">Ver Lista de productos</a>
        </div>
    </body>
</html>
