<?php 
if($sesion = "cerrar")
{
    session_destroy();
    echo "<script>
            alert('Ha cerrado sesión.');
            window.location.href = 'http://localhost/Clinica%20Dental%20LOPEZ/Paginas/login.php';
    
        </script>";



}

?>