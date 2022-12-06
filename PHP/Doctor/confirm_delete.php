<?php
if($_POST)
{
    require_once "../../Clases/config.php";
    $id = $_POST['id'];
    $delete_doc=$con->prepare("DELETE from medico where ID_medico ='$id'");
    if($delete_doc->execute())
    {
        echo "<script>
    alert('Se ha editado correctamente.');
    window.location.href ='../../Paginas/Administrativo/Doctores_CRUD.php';
    </script>";
    }
    else
    {
        echo "No funciona eta mielda";
    }
 }   
?>