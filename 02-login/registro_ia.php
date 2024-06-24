<?php
// Conexión a la base de datos
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "peliculas";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
    die("Conexión fallida: " . mysqli_connect_error());
}

// Función para generar un token aleatorio de 252 caracteres
function generarToken($longitud = 252) {
    return bin2hex(random_bytes($longitud / 2));
}

// Inicializar variables y mensajes de error
$nombre = $apellidos = $mail = $usuario = $telefono = "";
$nombreErr = $apellidosErr = $mailErr = $usuarioErr = $passwordErr = $telefonoErr = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $error = false;

    if (empty($_POST['nombre'])) {
        $nombreErr = "Nombre es requerido";
        $error = true;
    } else {
        $nombre = mysqli_real_escape_string($conn, $_POST['nombre']);
    }

    if (empty($_POST['apellidos'])) {
        $apellidosErr = "Apellidos son requeridos";
        $error = true;
    } else {
        $apellidos = mysqli_real_escape_string($conn, $_POST['apellidos']);
    }

    if (empty($_POST['mail'])) {
        $mailErr = "Email es requerido";
        $error = true;
    } else {
        $mail = mysqli_real_escape_string($conn, $_POST['mail']);
        if (!filter_var($mail, FILTER_VALIDATE_EMAIL)) {
            $mailErr = "Formato de email inválido";
            $error = true;
        }
    }

    if (empty($_POST['usuario'])) {
        $usuarioErr = "Usuario es requerido";
        $error = true;
    } else {
        $usuario = mysqli_real_escape_string($conn, $_POST['usuario']);
    }

    if (empty($_POST['password'])) {
        $passwordErr = "Contraseña es requerida";
        $error = true;
    } else {
        $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
    }

    if (empty($_POST['telefono'])) {
        $telefonoErr = "Teléfono es requerido";
        $error = true;
    } else {
        $telefono = mysqli_real_escape_string($conn, $_POST['telefono']);
    }

    if (!$error) {
        // Valores predeterminados
        $rol = 'U';
        $estado = 'P';
        $imagen = 'imagen.jpg';
        $token = generarToken();
        $boletin = 'N';
        $creado = $modificado = time();

        // Insertar el usuario en la base de datos
        $sql = "INSERT INTO usuarios (nombre, apellidos, mail, usuario, password, telefono, rol, estado, token, imagen, boletin, creado, modificado)
                VALUES ('$nombre', '$apellidos', '$mail', '$usuario', '$password', '$telefono', '$rol', '$estado', '$token', '$imagen', '$boletin', '$creado', '$modificado')";

        if (mysqli_query($conn, $sql)) {
            echo "Registro exitoso.";
            $nombre = $apellidos = $mail = $usuario = $telefono = ""; // Limpiar campos
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
    }
}

mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Registro de Usuarios</title>
</head>
<body>
    <h2>Registro de Usuarios</h2>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        Nombre: <input type="text" name="nombre" value="<?php echo $nombre; ?>"><span><?php echo $nombreErr; ?></span><br>
        Apellidos: <input type="text" name="apellidos" value="<?php echo $apellidos; ?>"><span><?php echo $apellidosErr; ?></span><br>
        Email: <input type="email" name="mail" value="<?php echo $mail; ?>"><span><?php echo $mailErr; ?></span><br>
        Usuario: <input type="text" name="usuario" value="<?php echo $usuario; ?>"><span><?php echo $usuarioErr; ?></span><br>
        Contraseña: <input type="password" name="password"><span><?php echo $passwordErr; ?></span><br>
        Teléfono: <input type="text" name="telefono" value="<?php echo $telefono; ?>"><span><?php echo $telefonoErr; ?></span><br>
        <input type="submit" value="Registrarse">
    </form>
</body>
</html>
