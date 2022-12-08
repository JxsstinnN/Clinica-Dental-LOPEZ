<?php 
session_start();
require_once "../../Clases/config.php";
require_once  "../../Clases/sesion.php";

if($_POST)
{
$user_id =$_SESSION['user_id'];
$id_paciente = $_POST['id_paciente'];
$nombre_paciente = $_POST['nombre_paciente'];
$apellido_paciente = $_POST['apellido_paciente'];
$servicio = $_POST['servicio_paciente'];
$costo_servicio = $_POST['costo_servicio'];
$monto_cliente = $_POST['recibido_cliente'];
$num_tarjeta = $_POST['num_tarjeta'];
$tipopago = $_POST['tipo_pago'];

$query_factura = $con->prepare("INSERT INTO FACTURAS VALUES (:id_paciente,:user_id,:id_medico,:ID_CITA,:Balance_neto,:ITBIS,:PAGO,BALANCE_FINAL)");
$query_factura->bindParam(":id_paciente",$id_paciente,PDO::PARAM_STR);
$query_factura->bindParam(":user_id", $user_id, PDO::PARAM_STR);
$query_factura->bindParam(":ID_Medico", $ID_medico, PDO::PARAM_STR);



}

?>