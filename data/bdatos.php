<?php
$db = new mysqli('localhost', 'biblioteca_2', '123456', 'biblioteca');
if(!$db){
    echo 'Error al conectar la base de datos';
    exit;
}

?>