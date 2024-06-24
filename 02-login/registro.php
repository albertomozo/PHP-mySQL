<?php
$verformulario = true;
$nombre = $apellidos=$mail=$telefono=$usuario=$password1=$password2='';
if ($_POST){
    // recoger 
    if (isset($_POST["nombre"])){$nombre=$_POST["nombre"];}
    if (isset($_POST["apellidos"])){$apellidos=$_POST["apellidos"];}
    if (isset($_POST["mail"])){$mail=$_POST["mail"];}
    

    //validar formuluario

} 
if ($verformulario)
{
    ?>
    <form method="post" action="">
    Nombre : <input type="text" name="nombre" id="nombre" value="<?php echo $nombre; ?>" ><br>
    Apellidos : <input type="text" name="apellidos" id="apellidos" value="<?php echo $apellidos; ?>" ><br>
    mail  : <input type="text" name="mail" id="mail" value="<?php echo $mail; ?>" ><br>
    usuario : <input type="text" name="usuario" id="usuario" value="<?php echo $usuario; ?>" ><br>
    contraseña : <input type="password" name="password1" id="password1" value="<?php echo $password1; ?>" ><br>
    Repite contraseña : <input type="password" name="password2" id="password2" value="<?php echo $password2; ?>" ><br>
    telefono : <input type="text" name="telefono" id="telefono" value="<?php echo $telefono; ?>" ><br>
    <button type="submit" >REGISTRAR</button>
 </form>

<?PHP

}
?>