<?php
require "crud/Conexion.php";
require "crud/Crud.php";

$mensaje = null;
if(isset($_POST["create"]))
    {
        $nombre = htmlspecialchars($_POST['nombre']);
        $descripcion = htmlspecialchars($_POST['descripcion']);
        $categoria = htmlspecialchars($_POST['categoria']);
        $precio = $_POST['precio'];
        
        if (!is_numeric($precio))
            {
                $mensaje="Error del campo numerico";
            }
        else if($nombre == '')
            {
                $mensaje = "Error, el campo nombre es requerido";
            }
        else if(strlen($nombre)>100)
            {
                $mensaje = "Error, el campo nombre acepta un maximo de 100 caracteres";
            }
        else if($descripcion == '')
            {
                $mensaje = "Error, el campo descripcion es requerido";
            }
        else if(strlen($descripcion)>500)
            {
                $mensaje = "Error, el campo descripcion acepta un maximo de 500 caracteres";
            }
        else if($categoria == '')
            {
                $mensaje = "Error, el campo categoria es requerido";
            }
        else if(strlen($categoria)>100)
            {
                $mensaje = "Error, el campo categoria acepta un maximo de 100 caracteres";
            }    
        else
            {
                $model = new Crud;
                $model->insertInto = 'productos';
                $model->insertColumns = 'nombre, descripcion, categoria, precio';
                $model->insertValues="'$nombre', '$descripcion', '$categoria', '$precio'";
                $model->Create();
                $mensaje=$model->mensaje;
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
                    <h1>CRUD :Create. Tabla productos</h1>
                </hgroup>
            </header>
            
            <strong><?php echo $mensaje; ?></strong>
            <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                <center>
                    <table>
                        <tr>
                            <td><span><strong>Nombre:</strong></span></td>
                            <td><input type="text" name="nombre"></td>
                        </tr>
                         <tr>
                            <td><span><strong>Descripcion:</strong></span></td>
                            <td><textarea cols="30" rows="10" name="descripcion"></textarea></td>
                        </tr>
                         <tr>
                            <td><span><strong>Categoria:</strong></span></td>
                            <td><input type="text" name="categoria"></td>
                        </tr>
                         <tr>
                            <td><span><strong>Precio:</strong></span></td>
                            <td><input type="text" name="precio"></td>
                        </tr>
                    </table>
                    <input type="hidden" name="create">
                    <input type="submit" value="Guardar">
                </center><hr>
                <a href="read.php">Ver lista de productos</a>
            </form>
        </div>
    </body>
</html>