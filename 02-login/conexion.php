<?php
// DEFINICION VALORES CONEXION
$server="sql107.infinityfree.com";   // Nuestro server mysql :puerto 
$database = "if0_36843438_peliculas";   // Nuestra base de datos  
$dbpass="L3G5oCtxKns"; //Nuestro password mysql  
$dbuser="if0_36843438";    // Nuestro user mysql 
$mysqli = @new mysqli($server, $dbuser, $dbpass, $database);
if ($mysqli->connect_errno) {
    echo "Fallo al conectar a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
} else {
   /*  echo $mysqli->host_info . "\n";
    echo 'conexión correcta'; */
}
?>
