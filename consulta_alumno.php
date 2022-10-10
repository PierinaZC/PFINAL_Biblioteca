<?php
require "data/bdatos.php";
$sql="SELECT * FROM carrera";
$resultado = $db->query($sql);
$numero_filas = $resultado->num_rows;
$listado_tipos = [];
$listado_alumno =[];
$tipoCliente = null;
$tipo = 0;
$cantidad_clientes = 0;
for($idx = 0; $idx < $numero_filas; $idx ++){
    $row = $resultado->fetch_assoc();
    $listado_tipos[] = $row;
}

if($_SERVER['REQUEST_METHOD'] ==='POST'){
    $tipo= $_POST['cboTipo'];
    $sql = "SELECT * FROM carrera WHERE id = $tipo";
    $resultado = $db -> query($sql);
    if($resultado->num_rows > 0){
        $tipoCliente = $resultado ->fetch_object();
    }



    $sql = "SELECT A.id,A.nombres,A.direccion,A.email,A.telefono, B.nombre AS carrera
    FROM alumno A INNER JOIN carrera B
    ON A.id_carrera = B.id
    WHERE A.id_carrera = $tipo;";
$resultado = $db->query($sql);

if($resultado->num_rows >0){
    $cantidad_clientes = $resultado->num_rows;
    while($row = $resultado->fetch_assoc()):
        $listado_alumno[] = $row;
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
        <h1>Consulta de Alumnos</h1>
        <form method="POST">
            <div class="mb-3">
            <label for="cboTipo" class="form-label">Tipo de Carrera:</label>
                <select class="form-control" id="cboTipo" name="cboTipo">
                    <option value="0">--SELECCIONE--</option>
               
                <?php
                if(count($listado_tipos) > 0){
                    foreach($listado_tipos as $tipo):
  
                ?>
                <option value="<?php echo $tipo['id'] ?>"><?php echo $tipo['nombre'] ?></option>
                <?php
                endforeach;
            }
                ?>
                 </select>
            </div>
            <input type="submit" value="Consultar" class="btn btn-primary">
         </form>
        <?php
        if(isset($tipoCliente)) :
            ?>
         <h3>Resultados de la consulta para el tipo: <?php echo $tipoCliente->nombre; ?></h3>
            <?php
            if(count($listado_alumno) > 0):
            ?>
          <table class="table">
            <thead>
                <tr>
                <th>Nombre</th>
                <th>Carrera</th>
                 <th>Direccion</th>
                 <th>Email</th>
                 <th>Telefono</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
            <?php

              
foreach($listado_alumno as $alumno):
?>
    <tr>
                            <td><?php echo $alumno['nombres']?></td>
                            <td><?php echo $alumno['carrera']?></td>
                            <td><?php echo $alumno['direccion']?></td>
                            <td><?php echo $alumno['email']?></td>
                            <td><?php echo $alumno['telefono']?></td>
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
                        <th colspan="5">Cantidad de registros: <?php echo $cantidad_clientes ?></th>
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