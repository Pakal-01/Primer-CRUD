<?php
    include ("conexion.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script type="text/javascript">
        function confirmar(){
            return confirm('¿Estas seguro?, se eliminarán los datos');
        }
    </script>
    <link rel="stylesheet" type="text/css" href="estilo.css">
</head>
<body>
    <form action="<?=$_SERVER['PHP_SELF']?>" method="post">
        <table> 
            <tr>
                <th colspan="5"> <h1>Lista de Alumnos</h1></th>
            </tr>
            <tr>
                <td>
                    <label>Nombre: </label>
                    <input type="text" name="Nombre">
                </td>
                <td>
                    <label>Apellido: </label>
                    <input type="text" name="Apellido">
                </td>
                <td>
                    <label>NIT: </label>
                    <input type="int" name="NIT">
                </td>
                <td>
                    <input type="submit" name="enviar" value="BUSCAR">
                </td>
                <td>
                    <a href="index2.php">Mostrar Todos los Alumnos</a>
                </td>
                <td>
                    <a href="agregar.php">Nuevo Alumno</a>
                </td>
            </tr>

        <table> 
    </form>

    <table >
        <thead>
                <tr>   
                    <th>ID</th>
                    <th>NOMBRE</th>
                    <th>APELLIDOS</th>
                    <th>NIT</th>
                    <th>Acciones</th> 
                </tr>
            </thead>

            <tbody>
                <?php
                    if(isset($_POST['enviar'])){
                        $Nombre=$_POST['Nombre'];
                        $Apellido=$_POST['Apellido'];
                        $NIT=$_POST['NIT'];
                        if(empty ($_POST['Nombre']) && empty($_POST['Apellido']) && empty($_POST['NIT'])){
                            echo'<script type="text/javascript">alert("Ingrese datos");location.assign("index.php");</script>';
                        }else{
                            if(empty ($_POST['Nombre'])){
                                $sql="select * from clientes where Apellido='".$Apellido."' AND NIT='".$NIT."'";
                            }
                            if(empty($_POST['Apellido'])){
                                $sql="select * from clientes where NIT='".$NIT."'AND Nombre='".$Nombre."'";
                            }
                            if(empty($_POST['NIT'])){
                                $sql="select * from clientes where Apellido='".$Apellido."' AND Nombre='".$Nombre."'";
                            }
                            if(!empty ($_POST['Nombre']) && !empty($_POST['Apellido']) && !empty($_POST['NIT'])){
                                $sql="select * from clientes where NIT=".$NIT."and Nombre like
                                    '%".$Nombre."%' and Apellido like '%".$Apellido."%'";             
                            }
                        }
                        $resultado=mysqli_query($conexion,$sql);
                        if (!$resultado) {
                            die("Error en la consulta: " . mysqli_error($conexion));
                        }
                        while($mostrar=mysqli_fetch_assoc($resultado)) {
                            ?>
                            <tr>
                                <td><?php echo $mostrar ['id'] ?></td>
                                <td><?php echo $mostrar ['Nombre'] ?></td>
                                <td><?php echo $mostrar ['Apellido'] ?></td>
                                <td><?php echo $mostrar ['NIT'] ?></td>
                                <td>  
                                <?php echo "<a href='editar.php?id=".$mostrar['id']."'>EDITAR</a>"; ?>
                                <?php echo "<a href='eliminar.php?id=".$mostrar['id']."'
                                    onclick='return confirmar()'>ELIMINAR</a>"; ?>
                                </td>  
                            </tr>
 
                <?php
                        }
                    }else{
                        $sql="select * from clientes";
                        $resultado=mysqli_query($conexion,$sql);
                        while($mostrar=mysqli_fetch_assoc($resultado)) {
                            ?>
                            <tr>
                                <td><?php echo $mostrar ['id'] ?></td>
                                <td><?php echo $mostrar ['Nombre'] ?></td>
                                <td><?php echo $mostrar ['Apellido'] ?></td>
                                <td><?php echo $mostrar ['NIT'] ?></td>
                                <td>  
                                <?php echo "<a href='editar.php?id=".$mostrar['id']."'>EDITAR</a>"; ?>
                                <?php echo "<a href='eliminar.php?id=".$mostrar['id']."'
                                    onclick='return confirmar()'>ELIMINAR</a>"; ?>
                                </td>  
                            </tr>      
                <?php
                        }
                    }
                ?>

            </tbody>

    </table >
    
</body>
</html>