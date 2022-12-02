<?php
if($_POST)
{
    require_once "../../Clases/config.php";
    $id = $_POST['id'];
    $delete_doc=$con->prepare("DELETE from pacientes where ID_Paciente ='$id'");
    if($delete_doc->execute())
    {
        echo "<h2>Se ha editado exitosamente</h2>";
        header('Location:http://localhost/Clinica%20Dental%20LOPEZ/Paginas/Administrativo/pruebalista_pacientes.php');
    }
    else
    {
        echo "No funciona eta mielda";
    }
 }   
?>