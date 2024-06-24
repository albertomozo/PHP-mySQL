<?php include("conexion_emp.php"); 
function obtener_edad_segun_fecha($fecha_nacimiento)
{
    $nacimiento = new DateTime($fecha_nacimiento);
    $ahora = new DateTime(date("Y-m-d"));
    $diferencia = $ahora->diff($nacimiento);
    return $diferencia->format("%y");
}
/* https://parzibyte.me/blog/2020/05/05/php-calcular-edad-fecha-nacimiento/ */
?>
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
    $ano_limite = 18;
    echo '<h1>Employees<h1>';
    echo "<h2>Año limite : $ano_limite</h2>";
    ?>
    <table border="1">
        <tr><th>Nombre</th><th>Apellidos</th><th>Nac</th><th><?php echo "año > $ano_limite";?></th><th><?php echo "> $ano_limite";?></th><th>Edad</th></tr>
        <?php
        while ($fila = mysqli_fetch_assoc($resultado))
        {
            
            $fec_nac = $fila['birth_date'];
            $ahora = date("Y-m-d");
            $fecha2 = date("Y-m-d",strtotime($fec_nac." + $ano_limite year")); 
            if ($fecha2 > $ahora){$mlim='N';}else {$mlim='S';}
                       
            echo '<tr>';
                echo '<td>' . $fila['first_name'] . '</td><td>' . $fila['last_name'] .'</td>';
                echo '<td>'.$fila['birth_date'] .'</td>';
                echo '<td>'.$fecha2 .'</td>';
                echo '<td>'.$mlim .'</td>';
                echo '<td>'.obtener_edad_segun_fecha($fec_nac) .'</td>';
            echo '</tr>';
        }
    echo '</table>';
  
?>
</body>
</html>
<?php  mysqli_close($mysqli); ?>