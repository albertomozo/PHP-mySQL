<?php session_start();
   include("conexion.php"); 
    /* recibo variables de formulario */
    // isset 
    $seguir = 'SI';
    if (isset($_POST['usuario']))
    {
        $usuario = $_POST['usuario'] ;    
        if (empty($usuario)){ // validacion
            $seguir = 'NO';
            $msg = 0; // numero de mensaje de error. Sirve para personalizar errores
        }
    } else { 
        $seguir ='N0';
        $msg = 2;  
    }
    if (isset($_POST['password']))
    {
        $password = $_POST['password'] ;
        if (empty($password)){ // validacion
            $seguir ='NO';
            $msg = 0; // numero de mensaje de error. Sirve para personalizar errores
        }
    
    } 
    else { 
        $seguir ='N0';
        $msg = 2;  
    }
    if ($seguir == 'SI'){
        $query = "SELECT * FROM usuarios WHERE usuario = '$usuario' and password = '$password'";
        $resultado = mysqli_query($mysqli, $query); //     ejecuta la query y la guarda en memoria
        $numFilas = mysqli_num_rows($resultado);
        echo "<h1>Numero filas : $numFilas </h1>";
        if (mysqli_num_rows($resultado)>0){
            $fila = mysqli_fetch_array($resultado);
             // recoger los datos del usuario y CREAR variables de sesion
             $_SESSION['usuario'] = $fila['usuario'];
             $_SESSION['rol'] = $fila['rol'];
             header("location:acceso_correcto.php");
            
        } else {
            header("location:login.php?msg=1");
        }  

        
    } else {
        header("location:login.php?msg=$msg");
    }
 
?>
<?php  mysqli_close($mysqli); ?>