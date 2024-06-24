<?php include("conexion_emp.php"); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Base de datos 01</title>
</head>
<body>
<?php
    $query = 'SELECT employees.first_name, employees.last_name,TIMESTAMPDIFF(YEAR, birth_date, CURDATE()) AS edad 
    FROM employees
    WHERE TIMESTAMPDIFF(YEAR, birth_date, CURDATE()) >= 60
    ORDER BY edad DESC;';
    $resultado = mysqli_query($mysqli, $query); // ejecuta la query y la guarda en memoria
    ?>
    <table border="1">
        <tr><th>Nombre</th><th>Precio</th></tr>
        <?php
        while ($fila = mysqli_fetch_assoc($resultado))
        {
            
            
            
            echo '<tr>';
                echo '<td>' . $fila['first_name'] . '</td><td>' . $fila['last_name'] .'</td>';
                echo '<td>'.$fila['edad'] .'</td>';
            echo '</tr>';
        }
    echo '</table>';
  
?>
</body>
</html>
<?php  mysqli_close($mysqli); ?>