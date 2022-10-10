<?php
require "data/bdatos.php";


$sql = "SELECT * FROM editorial";

$resultado = $db->query($sql);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EDITORIAL</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css"
    rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx"
    crossorigin="anonymous">
</head>
<body>
    <div class="container">
<h1>Registro Editorial </h1>
<hr></hr>
<a href="nuevo_editorial.php" class="btn btn-secondary"><img src="img/registro.png">Nuevo</a>
<table class="table">
    <thead>
        <tr>
        <th>Nombre</th>
        <th>Direccion</th>
        <th>Editar</th>
        <th>Eliminar</th>
        </tr>
    </thead>
    <tbody>
        <?php
        while($editorial = $resultado->fetch_assoc()):
        ?>
         <tr>
                            <td><?php echo $editorial['nombre']?></td>
                            <td><?php echo $editorial['direccion']?></td>
             
                            <td>
                            <a href="editar_editorial.php?id=<?php echo $editorial['id'];?>" class="btn btn-primary"><img src="img/editar (1).png">Editar</a>
                            <th><a href="eliminar_editorial.php?id=<?php echo $editorial['id']; ?>" class="btn btn-danger"><img src="img/eliminar.png">Eliminar</a></th>
                            </td>
                        </tr>
                        <?php
                        endwhile;
                        ?>
                        </tbody>    
                </table>
                <a href="index.php"class="btn btn-secondary"><img src="img/atras.png">Regresar</a>
                    </div>
            </boy>
        </html> 