<?php session_start();
    if (isset($_SESSION['usuario']))
    {
        echo '<p>Ongi Etorri ' . $_SESSION['usuario'] . '</p>';
    } else {
        echo '<p>No existe usurio, has pasado por el login?</p>';
    }
?>