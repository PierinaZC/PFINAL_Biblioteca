<?php
require "data/bdatos.php";
$sql="SELECT * FROM categoria";
$resultado = $db->query($sql);
$numero_filas = $resultado->num_rows;
$listado_tipos = [];
$listado_categoria =[];
$tipoCategoria = null;
$tipo = 0;
$cantidad_categoria = 0;
for($idx = 0; $idx < $numero_filas; $idx ++){
    $row = $resultado->fetch_assoc();
    $listado_tipos[] = $row;
}

if($_SERVER['REQUEST_METHOD'] ==='POST'){
    $tipo= $_POST['cboTipo'];
    $sql = "SELECT * FROM categoria WHERE id = $tipo";
    $resultado = $db -> query($sql);
    if($resultado->num_rows > 0){
        $tipoCategoria = $resultado ->fetch_object();
    }



    $sql = "SELECT A.id,titulo, B.nombre AS autor, C.nombre AS editorial, D.nombre As categoria
    FROM Libro A INNER JOIN autor B
    ON A.id_autor = B.id INNER JOIN editorial C 
    ON A.id_editorial = C.id INNER JOIN categoria D
    ON A.id_categoria = D.id
    WHERE A.id_categoria = $tipo;";
$resultado = $db->query($sql);

if($resultado->num_rows >0){
    $cantidad_categoria = $resultado->num_rows;
    while($row = $resultado->fetch_assoc()):
        $listado_categoria[] = $row;
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
        <h1>Consulta de Libro</h1>
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
        if(isset($tipoCategoria)) :
            ?>
         <h3>Resultados de la consulta para el tipo: <?php echo $tipoCategoria->nombre; ?></h3>
            <?php
            if(count($listado_categoria) > 0):
            ?>
          <table class="table">
            <thead>
                <tr>
                <th>Titulo</th>
                <th>Autor</th>
                <th>Editorial</th>
                <th>Categoria</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
            <?php

              
foreach($listado_categoria as $libro):
?>
    <tr>
                         <td><?php echo $libro['titulo']?></td>
                            <td><?php echo $libro['autor']?></td>
                            <td><?php echo $libro['editorial']?></td>
                            <td><?php echo $libro['categoria']?></td>
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
                        <th colspan="5">Cantidad de registros: <?php echo $cantidad_categoria ?></th>
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