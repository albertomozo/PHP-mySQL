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
    $query = 'SELECT employees.first_name, employees.last_name,employees.birth_date
    FROM employees
    WHERE employees.emp_no >= 300000
    ORDER BY employees.birth_date DESC;';
    $resultado = mysqli_query($mysqli, $query); // ejecuta la query y la guarda en memoria
    ?>
    <table border="1">
        <tr><th>Nombre</th><th>Apellidos</th><th>Nac</th><th>Oro 50 años</th><th>>50</th></tr>
        <?php
        while ($fila = mysqli_fetch_assoc($resultado))
        {
            
            $fec_nac = $fila['birth_date'];
            $ahora = date("Y-m-d");
            $fecha2 = date("Y-m-d",strtotime($fec_nac." + 50 year")); 
            if ($fecha2 > $ahora){$m50='N';}else {$m50='S';}
                       
            echo '<tr>';
                echo '<td>' . $fila['first_name'] . '</td><td>' . $fila['last_name'] .'</td>';
                echo '<td>'.$fila['birth_date'] .'</td>';
                echo '<td>'.$fecha2 .'</td>';
                echo '<td>'.$m50 .'</td>';
            echo '</tr>';
        }
    echo '</table>';
  
?>
</body>
</html>
<?php  mysqli_close($mysqli); ?>