<?php 
session_start();
require_once "../../Clases/config.php";
require_once  "../../Clases/sesion.php";

if($_POST)
{
$user_id =$_SESSION['user_id'];
$id_paciente = $_POST['id_paciente'];
$id_medico = $_POST['id_medico'];
$id_cita = $_POST['id_cita'];
$nombre_paciente = $_POST['nombre_paciente'];
$apellido_paciente = $_POST['apellido_paciente'];
$servicio = $_POST['servicio_paciente'];
$costo_servicio = $_POST['costo_servicio'];
$monto_cliente = $_POST['recibido_cliente'];
$num_tarjeta = $_POST['num_tarjeta'];
$tipopago = $_POST['tipo_pago'];

$itbis = (($costo_servicio * 18) /100) + $costo_servicio;
$balance_final = $costo_servicio + $itbis;

$query_factura = $con->prepare("INSERT INTO FACTURA VALUES (NULL,:id_paciente,:user_id,:id_medico,:ID_CITA,:costo_cita,:Balance_neto,:ITBIS,:PAGO,:BALANCE_FINAL)");
$query_factura->bindParam(":id_paciente",$id_paciente,PDO::PARAM_STR);
$query_factura->bindParam(":user_id", $user_id, PDO::PARAM_STR);
$query_factura->bindParam(":id_medico", $id_medico, PDO::PARAM_STR);
$query_factura->bindParam(":ID_CITA", $id_cita, PDO::PARAM_STR);
$query_factura->bindParam(":costo_cita", $costo_servicio,PDO::PARAM_STR);
$query_factura->bindParam(":Balance_neto",$monto_cliente,PDO::PARAM_STR);
$query_factura->bindParam(":ITBIS", $itbis, PDO::PARAM_STR);
$query_factura->bindParam(":PAGO", $tipopago, PDO::PARAM_STR);
$query_factura->bindParam(":BALANCE_FINAL",$balance_final,PDO::PARAM_STR);
if($query_factura->execute())
{
    $act_cita = $con->prepare("UPDATE 'citas' SET 'Completado' = 'SI' WHERE 'citas'.'ID_CITA' = '$id_cita'");
    $act_cita->execute();
}

}

?>