<?php
require_once "../../Clases/config.php";

if($_POST)
{
    $id = $_POST['id'];
    $Titulo = $_POST['titulo_cita'];
    $Notas = $_POST['notas_cita'];
    $Mensaje = $_POST['mensaje_cita'];
    $Fecha_Cita = $_POST['fecha_cita'];
    $Hora_Cita = $_POST['hora_cita'];
    $Costo = $_POST['costo_cita'];
    $com = $con->prepare("SET foreign_key_checks = 0");
    $com->execute();
    $edit_medic=$con->prepare("UPDATE cita set Titulo='$Titulo',Notas='$Notas',Mensaje='$Mensaje',Fecha_Cita='$Fecha_Cita',Hora_Cita='$Hora_Cita',Costo='$Costo' where ID_Medico ='$id'");
    if($edit_medic->execute())
    {
        $com1 = $con->prepare("SET foreign_key_checks = 1");
        $com1->execute();
        echo "<script>
    alert('Se ha editado correctamente.');
    window.location.href ='../../Paginas/Administrativo/Citas.php';
    </script>";
    }

}
?>