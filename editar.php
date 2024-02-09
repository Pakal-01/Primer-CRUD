<?php
    include("conexion.php")
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar</title>
</head>
<body>
    <?php
        if(isset($_POST['enviar'])){

        }else{
            $id=$_GET['id'];
            $sql="select * from clientes where id='".$id. "'";
            $resultado=mysqli_query($conexion,$sql);

            $fila=mysqli_fetch_assoc($resultado);
            $ID=$fila['ID_clientes'];
            $Nombre=$fila['Nombre'];
            $Apellido=$fila['Apellido'];
            $NIT=$fila['NIT'];
            mysqli_close($conexion);
        
    ?>
    <h1>Editar Alumno</h1>
    <form action="<?=$_SERVER['PHP_SELF']?>" method="post"> 
        <label> ID: </label>
        <input type ="int" name="ID_clientes"> <br>
        value="<?php echo $ID;?>"<br>

        <label> Nombre: </label>
        <input type ="text" name="Nombre"> <br>
        value="<?php echo $Nombre;?>"<br>

        <label> Apellido: </label>
        <input type ="text" name="Apellido"> <br>
        value="<?php echo $Apellido;?>"<br>

        <label> NIT: </label>
        <input type ="int" name="NIT"> <br>
        value="<?php echo $NIT;?>"<br>

        <input type="hidden" name="id"
        value="<?php echo $id; ?>">
        
        <input type="submit" name="enviar" value="ACTUALIZAR">
        <a href="index.php"> Regresar</a> 
    </form>
    <?php
        }
    ?>
</body>
</html>