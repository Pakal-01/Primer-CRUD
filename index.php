<?php
    $conexion=mysqli_connect('localhost', 'root', '', 'dbsample' );
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <script type="text/javascript">
        function confirmar(){
            return confirm('¿Estas seguro?, se eliminaran los datos selecionados');                         
        }
    </script>
    <!-- estilo de borde de tabla  -->
    <style>
        table, th, td {
            border: 1px solid blue;
            border-collapse:collapse;
        }
        th,td{
            padding: 5px;
        }
        th{
            text-align: left;
        }
    </style>
    <!-- FIN DE estilo de borde de tabla  -->
</head>
<body>
    <h1>Clientes</h1>
    <a href="agregar.php">Nuevo Cliente</a><br><br>
    <table style="width: 40%;">
        <tr>   
            <td><b>ID</b></td>
            <td><b>NOMBRE</b></td>
            <td><b>APELLIDOS</b></td>
            <td><b>NIT</b></td>
            <td><b>Acciones</b></td> 
        </tr>

        <?php
        $sql="SELECT * from clientes";
        $result=mysqli_query($conexion,$sql);

        while($mostrar=mysqli_fetch_array($result)) {
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
    ?>
    </table>
</body>
</html>