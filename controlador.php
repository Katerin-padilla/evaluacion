<?php
require "modelo.php"; 

$results = $_DB->select(
    "SELECT * FROM `usuario` WHERE `nombre` LIKE ?",
    ["%{$_POST["search"]}%"] );

 // Resultados
 echo json_encode(count($results)==0 ? null : $results);
?>