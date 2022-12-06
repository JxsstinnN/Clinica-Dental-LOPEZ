<?php
if($_POST)
{
    require_once "../../Clases/config.php";
    $id = $_POST['id'];
    $delete_doc=$con->prepare("DELETE from citas where ID_CITA ='$id'");
    $com = $con->prepare("SET foreign_key_checks = 0");
    $com->execute();
    if($delete_doc->execute())
    {
        $com1 = $con->prepare("SET foreign_key_checks = 1");
        $com1->execute();
        echo "<script>
    alert('Se ha Borrado Correctamente.');
    window.location.href ='../../Paginas/Citas/Citas.php';
    </script>";
    }
    else
    {
        echo "No funciona eta mielda";
    }
 }   
?>