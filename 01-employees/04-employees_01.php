<?php include("conexion_emp.php"); 
    $query = 'SELECT employees.first_name, employees.last_name,TIMESTAMPDIFF(YEAR, birth_date, CURDATE()) AS edad 
    FROM employees
    WHERE TIMESTAMPDIFF(YEAR, birth_date, CURDATE()) >= 60
    ORDER BY edad DESC;';
    $resultado = mysqli_query($mysqli, $query); // ejecuta la query y la guarda en memoria
    $numfilas = mysqli_num_rows($resultado);
    echo "<p>hay $numfilas </p>";
    while ($fila = mysqli_fetch_assoc($resultado))
    {       
            print_r ($fila) ;  
            echo '<hr>';      
    }
   mysqli_close($mysqli); ?>