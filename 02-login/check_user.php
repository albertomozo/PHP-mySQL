<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "peliculas";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
    die("Conexión fallida: " . mysqli_connect_error());
}

if (isset($_POST['usuario'])) {
    $usuario = mysqli_real_escape_string($conn, $_POST['usuario']);
    $query = "SELECT * FROM usuarios WHERE usuario = '$usuario'";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) > 0) {
        echo "usuario_exists";
    } else {
        echo "usuario_available";
    }
} elseif (isset($_POST['mail'])) {
    $mail = mysqli_real_escape_string($conn, $_POST['mail']);
    $query = "SELECT * FROM usuarios WHERE mail = '$mail'";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) > 0) {
        echo "mail_exists";
    } else {
        echo "mail_available";
    }
}

mysqli_close($conn);
?>
