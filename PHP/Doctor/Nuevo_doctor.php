<?php
require_once "../../Clases/config.php";
session_start();
if ($_POST)
{
    $nombre_doc= strtoupper($_POST['nombre_doc']);
    $ape_doc = strtoupper($_POST['ape_doc']);
    $cedula_doc= $_POST['cedula_doc'];
    $genero_doc= strtoupper($_POST['genero_doc']);
    $fecha_nac_doc= $_POST['fecha_nac_doc'];
    $dire_doc= strtoupper($_POST['dire_doc']);
    $tel_doc = $_POST['telefono_doc'];

    $nuevo_doc = $con->prepare("INSERT INTO medico(ID_Medico,Nombre,Apellido,Cedula,Genero,Fecha_Nacimiento,Direccion,Telefono) VALUES(NULL,:nombre_doc,:ape_doc,:cedula_doc,:genero_doc,:fecha_nac_doc,:dire_doc,:tel_doc)");
    $nuevo_doc->bindParam(':nombre_doc',$nombre_doc,PDO::PARAM_STR);
    $nuevo_doc->bindParam(':ape_doc',$ape_doc,PDO::PARAM_STR);
    $nuevo_doc->bindParam(':cedula_doc',$cedula_doc,PDO::PARAM_STR);
    $nuevo_doc->bindParam(':genero_doc',$genero_doc,PDO::PARAM_STR);
    $nuevo_doc->bindParam(':fecha_nac_doc',$fecha_nac_doc,PDO::PARAM_STR);
    $nuevo_doc->bindParam(':dire_doc',$dire_doc,PDO::PARAM_STR);
    $nuevo_doc->bindParam(':tel_doc',$tel_doc,PDO::PARAM_STR);
    if($nuevo_doc->execute())
    {
        echo
        "
        <script>
        window.location.href='AAAAAAAAAAAAAA.php';
        alert('Medico ha sido insertado exitosamente');
        </script>
        ";
    }

}
else
{
    exit("No funciona eta mielda");
}


?>