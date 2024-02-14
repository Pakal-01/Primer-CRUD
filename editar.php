<?php
    include("conexion.php")
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar</title>
    <link rel="stylesheet" type="text/css" href="estilo.css">
</head>
<body>
    <?php
        if(isset($_POST['enviar'])){
            $id=$_POST['id'];
            $Nombre=$_POST['Nombre'];
            $Apellido=$_POST['Apellido'];
            $NIT=$_POST['NIT'];

            $sql="update clientes set Nombre='".$Nombre."', Apellido='".$Apellido."',
                NIT='".$NIT."' where id='".$id."'";
            $resultado=mysqli_query($conexion,$sql);

            if($resultado){
                echo '<script type="text/javascript">alert("modificado");location.assign("index2.php");</script>';

            }else{
                echo '<script type="text/javascript">alert("no se realizo la modificion");location.assign("index2.php");</script>';

            }
            mysqli_close($conexion);
        }else{
            $id=$_GET['id'];
            $sql="select * from clientes where id='".$id. "'";
            $resultado=mysqli_query($conexion,$sql);

            $fila=mysqli_fetch_assoc($resultado);
            $Nombre=$fila["Nombre"];
            $Apellido=$fila["Apellido"];
            $NIT=$fila["NIT"];
            mysqli_close($conexion);
        
    ?>
    <h1>Editar Alumno</h1>
    <form action="<?=$_SERVER['PHP_SELF']?>" method="post"> 

        <label> Nombre: </label>
        <input type ="text" name="Nombre"
        value="<?php echo $Nombre; ?>"><br>

        <label> Apellido: </label>
        <input type ="text" name="Apellido"
        value="<?php echo $Apellido; ?>"><br>

        <label> NIT: </label>
        <input type ="int" name="NIT"
        value="<?php echo $NIT; ?>"><br>

        <input type="hidden" name="id"
        value="<?php echo $id; ?>">
        
        <input type="submit" name="enviar" value="ACTUALIZAR" >
        <a href="index2.php"> Regresar</a> 
    </form>
    <?php
        }
    ?>
</body>
</html>