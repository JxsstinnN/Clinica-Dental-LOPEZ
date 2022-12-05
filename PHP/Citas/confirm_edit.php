<?php
require_once "../../Clases/config.php";

if($_POST)
{
    $id = $_POST['id'];
    $Nombre = $_POST['nombre_medico'];
    $Apellido = $_POST['ape_medico'];
    $Cedula = $_POST['cedula_medico'];
    $Genero = $_POST['genero_medico'];
    $Fecha_Nac = $_POST['fecha_medico'];
    $Direccion = $_POST['dire_medico'];
    $Telefono = $_POST['tele_medico'];
    $edit_medic=$con->prepare("UPDATE medico set Nombre_Medico='$Nombre',Apellido_Medico='$Apellido',Cedula='$Cedula',Genero='$Genero',Fecha_Nacimiento='$Fecha_Nac',Direccion='$Direccion',Telefono='$Telefono' where ID_Medico ='$id'");
    if($edit_medic->execute())
    {
        echo "<h2>Se ha editado exitosamente</h2>";
        header('Location:http://localhost/Clinica%20Dental%20LOPEZ/Paginas/Administrativo/pruebalista.php');
    }

}
?>