<?php
require "crud/Conexion.php";
require "crud/Crud.php";

$model = new Crud;
$model->select = '*';
$model->from = 'productos';
//$model->condition = 'id_productos=3';
$model->Read();
$filas = $model->rows;
$total = count($filas);
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
                    <h1>CRUD : Read. Tabla productos</h1>
                    <h2><strong>El total de Productos ingresados es... <?php echo $total ?></strong></h2>
                </hgroup>
            </header>
            <table display: block border="02">
                <tr>
                    <td><strong>id_producto</strong></td>
                    <td><strong>Nombre</strong></td>
                    <td><strong>Descripcion</strong></td>
                    <td><strong>Categoria</strong></td>
                    <td><strong>Precio</strong></td>
                    <td><strong>Actualizar</strong></td>
                    <td><strong>Eliminar</strong></td>
                </tr>
                <?php
                foreach ($filas as $fila)
                    {
                        echo "<tr>";
                        echo "<td>".$fila['id_producto']."</td>";
                        echo "<td>".$fila['nombre']."</td>";
                        echo "<td>".$fila['descripcion']."</td>";
                        echo "<td>".$fila['categoria']."</td>";
                        echo "<td>".$fila['precio']."</td>";
                        echo "<td><a href='update.php?id_producto=".$fila['id_producto']."'>Actualizar</a></td>";
                        echo "<td><a href='delete.php?id_producto=".$fila['id_producto']."'>Eliminar</a></td>";
                        echo "</tr>";
                    }
                ?>
            </table><hr>
            <a href="create.php">Crear nuevo registro</a>
        </div>
    </body>
</html>
