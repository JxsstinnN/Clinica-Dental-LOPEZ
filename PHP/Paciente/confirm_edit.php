<?php
require_once "../../Clases/config.php";

if($_POST)
{
    $id = $_POST['id'];
    $Nombre = $_POST['nombre_paciente'];
    $Apellido = $_POST['ape_paciente'];
    $Cedula = $_POST['cedula_paciente'];
    $Genero = $_POST['genero_paciente'];
    $Fecha_Nac = $_POST['fecha_paciente'];
    $Direccion = $_POST['dire_paciente'];
    $Telefono = $_POST['tele_paciente'];
    $edit_patient=$con->prepare("UPDATE pacientes set Nombre_Paciente='$Nombre',Apellido_Paciente='$Apellido',Cedula='$Cedula',Genero='$Genero',Fecha_Nac='$Fecha_Nac',Direccion='$Direccion',Telefono='$Telefono' where ID_Paciente ='$id'");
    if($edit_patient->execute())
    {
        echo "<h2>Se ha editado exitosamente</h2>";
        header('Location:http://localhost/Clinica%20Dental%20LOPEZ/Paginas/Administrativo/pruebalista_pacientes.php');
    }

}
?>