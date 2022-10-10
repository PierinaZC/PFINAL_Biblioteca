<?php
require "data/bdatos.php";

$sql = "SELECT A.id,fechaPrestamo,horaPrestamo,fechaEntrega,horaEntrega, B.nombres AS alumno, C.titulo AS libro, D.tipo As tipo_prestamo
FROM prestamo A INNER JOIN alumno B
ON A.id_alumno = B.id INNER JOIN libro C 
ON A.id_libro = C.id INNER JOIN tipo_prestamo D
ON A.id_tipo_prestamo = D.id;";

$resultado = $db->query($sql);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PRESTAMO</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css"
    rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx"
    crossorigin="anonymous">
</head>
<body>
    <div class="container">
<h1>Registro Prestamo </h1>
<hr></hr>
<a href="nuevo_prestamo.php" class="btn btn-secondary"><img src="img/registro.png">Nuevo</a>
<a href="consulta_prestamo.php" class="btn btn-primary"><img src="img/consulta.png">Consultar</a>

<table class="table">
    <thead>
        <tr>
        <th>Alumno</th>
        <th>Libro</th>
        <th>Fecha_Prestamo</th>
        <th>Hora_Prestamo</th>
        <th>Tipo_Prestamo</th>
        <th>Fecha_Entrega</th>
        <th>Hora_Entrega</th>
        <th>Editar</th>
        <th>Eliminar</th>
        </tr>
    </thead>
    <tbody>
        <?php
        while($prestamo = $resultado->fetch_assoc()):
        ?>
         <tr>
                            <td><?php echo $prestamo['alumno']?></td>
                            <td><?php echo $prestamo['libro']?></td>
                            <td><?php echo $prestamo['fechaPrestamo']?></td>
                            <td><?php echo $prestamo['horaPrestamo']?></td>
                            <td><?php echo $prestamo['tipo_prestamo']?></td>
                            <td><?php echo $prestamo['fechaEntrega']?></td>
                            <td><?php echo $prestamo['horaEntrega']?></td>
                            <td>
                            <a href="editar_prestamo.php?id=<?php echo $prestamo['id'];?>" class="btn btn-primary"><img src="img/editar (1).png">Editar</a>
                            <th><a href="eliminar_prestamo.php?id=<?php echo $prestamo['id']; ?>" class="btn btn-danger"><img src="img/eliminar.png">Eliminar</a></th>
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