<?php
$server = "localhost";
$user = "root";
$pass = "";
$db = "dbsample";

$conexion = new mysqli($server, $user, $pass, $db);

if($conexion->connect_errno){
        die("coneccion Fallida". $conexion->connected_errno);
        }else{echo "conectado";}
?>

