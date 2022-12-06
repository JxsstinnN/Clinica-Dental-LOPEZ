<?php
session_start();
require_once "../../Clases/config.php";

if($_POST)
{
$ID_Paciente= $_POST['Nombre_Paciente'];
$Titulo_cita = $_POST['titulo_cita'];
$Notas_Cita = $_POST['Notas_Cita'];
$mensaje_cita = $_POST['mensaje_cita'];
$Fecha_Cita = $_POST['fecha_cita'];
$Hora_Cita = $_POST['hora_cita'];
$ID_Medico = $_POST['ID_Medico'];
$User_ID = $_POST['Usuario_Iniciado'];
$costo_cita = $_POST['costo_cita'];

if($_SESSION['tipo_usuario'] == "SECRE")
{
$insertar_cita = $con->prepare("INSERT INTO citas (ID_CITA,Titulo,Notas,Mensaje,Fecha_Cita,Hora_Cita,ID_Paciente,ID_Medico,User_ID,Costo) VALUES ('NULL',:titulo_cita,:notas_cita,:mensaje_cita,:fecha_Cita,:Hora_Cita,:id_paciente,:ID_Medico,:User_ID,:costo_cita)");
$insertar_cita->bindParam(':id_paciente',$ID_Paciente,PDO::PARAM_INT);
$insertar_cita->bindParam(':titulo_cita',$Titulo_cita,PDO::PARAM_STR);
$insertar_cita->bindParam(':notas_cita',$Notas_Cita,PDO::PARAM_STR);
$insertar_cita->bindParam('mensaje_cita',$mensaje_cita,PDO::PARAM_STR);
$insertar_cita->bindParam(':fecha_Cita',$Fecha_Cita,PDO::PARAM_STR);
$insertar_cita->bindParam(':Hora_Cita',$Hora_Cita,PDO::PARAM_STR);
$insertar_cita->bindParam(':ID_Medico',$ID_Medico,PDO::PARAM_STR);
$insertar_cita->bindParam(':User_ID',$User_ID,PDO::PARAM_STR);
$insertar_cita->bindParam('costo_cita',$costo_cita,PDO::PARAM_STR);
if($insertar_cita->execute())
{
    echo "<script>
    alert('Cita creada correctamente');
    window.location.href ='../../Paginas/Citas/Citas.php';
    </script>";
}

}
else
{
    echo "<script>
    alert('Necesita Ser secretario para poder crear citas..');
    window.location.href ='../../Paginas/Citas/Citas.php';
    </script>";
}

}
?>