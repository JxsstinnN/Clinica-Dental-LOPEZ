<?php
session_start();
if(!isset($_SESSION['nombre']))
{
     echo "<script>
    alert('Debe de iniciar sesion para estar autorizado.');
    window.location.href ='http://localhost/Clinica-Dental-LOPEZ/Paginas/login.php';
    </script>";
}

?>