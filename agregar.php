<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregrar Clientes</title>
</head>
<body>
    <?php
        if(isset($_POST['enviar'])){
            $Nombre=$_POST['Nombre'];
            $Apellido=$_POST['Apellido'];
            $NIT=$_POST['NIT'];

            include("conexion.php");
            $sql="insert into clientes(Nombre,Apellido, NIT)
            values('".$Nombre."','".$Apellido."','".$NIT."')";

            $result=mysqli_query($conexion,$sql);

            if($result){
                //los datos furon ingresados de forma correcta
                echo "<script language='JavaScript'>
                        alert('Los datos fueron ingresados 
                        correctamente a la BD');
                        location.assign('index.php');
                     </script>";

            }else{
                echo "<script language='JavaScript'>
                        alert('ERROR.Los datos NO fueron ingresados 
                        correctamente a la BD');
                        location.assign('index.php');
                     </script>";
            }
            mysqli_close($conexion);
        }else{

        }
    ?>
    <h1>AGREGAR NUEVO CLIENTE</h1>
    <form action="<?=$_SERVER['PHP_SELF']?>" method="post">
        <label> nombre: </label>
        <input type ="text" name="Nombre"> <br>
        <label> Apellido: </label>
        <input type ="text" name="Apellido"> <br>
        <label> NIT: </label>
        <input type ="int" name="NIT"> <br>
        <input type="submit" name="enviar" value="AGREGAR">
        <a href="index.php"> Regresar</a> 
    </form>


    
</body>
</html>