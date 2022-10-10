<?php
require "data/bdatos.php";
$sql="SELECT * FROM tipo_prestamo";
$resultado = $db->query($sql);
$numero_filas = $resultado->num_rows;
$listado_tipos = [];
$listado_prestamo =[];
$tipoPrestamo = null;
$tipo = 0;
$cantidad_prestamo = 0;
for($idx = 0; $idx < $numero_filas; $idx ++){
    $row = $resultado->fetch_assoc();
    $listado_tipos[] = $row;
}

if($_SERVER['REQUEST_METHOD'] ==='POST'){
    $tipo= $_POST['cboTipo'];
    $sql = "SELECT * FROM tipo_prestamo WHERE id = $tipo";
    $resultado = $db -> query($sql);
    if($resultado->num_rows > 0){
        $tipoPrestamo = $resultado ->fetch_object();
    }



    $sql = "SELECT A.id,fechaPrestamo,horaPrestamo,fechaEntrega,horaEntrega, B.nombres AS alumno, C.titulo AS libro, D.tipo As tipo_prestamo
    FROM prestamo A INNER JOIN alumno B
    ON A.id_alumno = B.id INNER JOIN libro C 
    ON A.id_libro = C.id INNER JOIN tipo_prestamo D
    ON A.id_tipo_prestamo = D.id
    WHERE A.id_tipo_prestamo = $tipo;";
$resultado = $db->query($sql);

if($resultado->num_rows >0){
    $cantidad_prestamo = $resultado->num_rows;
    while($row = $resultado->fetch_assoc()):
        $listado_prestamo[] = $row;
    endwhile;
}


}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consulta</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" 
        rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" 
        crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <h1>Consulta de Prestamo</h1>
        <form method="POST">
            <div class="mb-3">
            <label for="cboTipo" class="form-label">Tipo de Carrera:</label>
                <select class="form-control" id="cboTipo" name="cboTipo">
                    <option value="0">--SELECCIONE--</option>
               
                <?php
                if(count($listado_tipos) > 0){
                    foreach($listado_tipos as $tipo):
  
                ?>
                <option value="<?php echo $tipo['id'] ?>"><?php echo $tipo['tipo'] ?></option>
                <?php
                endforeach;
            }
                ?>
                 </select>
            </div>
            <input type="submit" value="Consultar" class="btn btn-primary">
         </form>
        <?php
        if(isset($tipoPrestamo)) :
            ?>
         <h3>Resultados de la consulta para el tipo: <?php echo $tipoPrestamo->tipo; ?></h3>
            <?php
            if(count($listado_prestamo) > 0):
            ?>
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
                <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
            <?php

              
foreach($listado_prestamo as $prestamo):
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
            <a href="#" class="btn btn-primary">Ver detalle</a>                                
        </td>
    </tr>
<?php
endforeach;
?>
            </tbody>
                <tfoot>
                    <tr>
                        <th colspan="5">Cantidad de registros: <?php echo $cantidad_prestamo ?></th>
                    </tr>   
                 </tfoot>
            </table>
        <?php
        endif;
         ?>
        
        <?php
        endif;
         ?>
                  <a href="index.php"class="btn btn-secondary"><img src="img/atras.png">Regresar</a>

         </div>

</body>
</html>