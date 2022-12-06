<?php 
if($sesion = "cerrar")
{
    session_destroy();
    echo "<script>
            alert('Ha cerrado sesión.');
            window.location.href = '../Paginas/login.php';
    
        </script>";



}

?>