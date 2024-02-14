<?php 
 $id=$_GET['id'];
 include("conexion.php");
 
 $sql="delete from clientes where id='".$id."'";
 $resultado=mysqli_query($conexion,$sql);

 if($resultado){
    echo'<script type="text/javascript">alert("los datos fueron eliminados de la BD");
            location.assign("index2.php");</script>';
            
     echo'<script type="text/javascript">alert("los datos no fueron eliminados de la BD");
            location.assign("index2.php");</script>';
 }
?>