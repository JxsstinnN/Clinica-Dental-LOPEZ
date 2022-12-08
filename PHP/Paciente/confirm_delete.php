<?php
if($_POST)
{
    require_once "../../Clases/config.php";
    $id = $_POST['id'];
    $com = $con->prepare("SET foreign_key_checks = 0");
    $com->execute();
    $delete_doc=$con->prepare("DELETE from pacientes where ID_Paciente ='$id'");
    if($delete_doc->execute())
    {
        $com1 = $con->prepare("SET foreign_key_checks = 1");
        $com1->execute();
        echo "<h2>Se ha editado exitosamente</h2>";
        header('Location:http://localhost/Clinica%20Dental%20LOPEZ/Paginas/Administrativo/Pacientes_CRUD.php');
    }
    else
    {
        echo "No funciona eta mielda";
    }
 }   
?>