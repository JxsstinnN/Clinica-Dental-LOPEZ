<?php
session_start();
require_once "../../Clases/config.php";
require_once "../../Clases/Sesion.php";
if ($_POST)
{
    $nombre_pac= strtoupper($_POST['nombre_pac']);
    $ape_pac = strtoupper($_POST['ape_pac']);
    $cedula_pac= $_POST['cedula_pac'];
    $genero_pac= strtoupper($_POST['genero_pac']);
    $fecha_nac_pac= $_POST['fecha_nac_pac'];
    $dire_pac= strtoupper($_POST['dire_pac']);
    $tel_pac = $_POST['telefono_pac'];

    $nuevo_pac = $con->prepare("INSERT INTO pacientes(ID_Paciente,Nombre_Paciente,Apellido_Paciente,Cedula,Genero,Fecha_Nac,Direccion,Telefono) VALUES(NULL,:nombre_pac,:ape_pac,:cedula_pac,:genero_pac,:fecha_nac_pac,:dire_pac,:tel_pac)");
    $nuevo_pac->bindParam(':nombre_pac',$nombre_pac,PDO::PARAM_STR);
    $nuevo_pac->bindParam(':ape_pac',$ape_pac,PDO::PARAM_STR);
    $nuevo_pac->bindParam(':cedula_pac',$cedula_pac,PDO::PARAM_STR);
    $nuevo_pac->bindParam(':genero_pac',$genero_pac,PDO::PARAM_STR);
    $nuevo_pac->bindParam(':fecha_nac_pac',$fecha_nac_pac,PDO::PARAM_STR);
    $nuevo_pac->bindParam(':dire_pac',$dire_pac,PDO::PARAM_STR);
    $nuevo_pac->bindParam(':tel_pac',$tel_pac,PDO::PARAM_STR);
    if($nuevo_pac->execute())
    {
    echo "<script>
    alert('Se ha agregado correctamente.');
    window.location.href ='../../Paginas/Administrativo/Pacientes_CRUD.php';
    </script>";
    }

}
else
{
    exit("No se pudo ejecutar la sentencia");
}


?>