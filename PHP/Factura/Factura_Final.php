<?php
session_start();
require_once "../../Clases/config.php";
require_once  "../../Clases/sesion.php";

if ($_POST) {
    $user_id = $_SESSION['user_id'];
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

    $itbis = (($costo_servicio * 18) / 100) + $costo_servicio;
    $balance_final = $costo_servicio + $itbis;

    $query_factura = $con->prepare("INSERT INTO FACTURA VALUES (NULL,:id_paciente,:user_id,:id_medico,:ID_CITA,:costo_cita,:Balance_neto,:ITBIS,:PAGO,:BALANCE_FINAL)");
    $query_factura->bindParam(":id_paciente", $id_paciente, PDO::PARAM_STR);
    $query_factura->bindParam(":user_id", $user_id, PDO::PARAM_STR);
    $query_factura->bindParam(":id_medico", $id_medico, PDO::PARAM_STR);
    $query_factura->bindParam(":ID_CITA", $id_cita, PDO::PARAM_STR);
    $query_factura->bindParam(":costo_cita", $costo_servicio, PDO::PARAM_STR);
    $query_factura->bindParam(":Balance_neto", $monto_cliente, PDO::PARAM_STR);
    $query_factura->bindParam(":ITBIS", $itbis, PDO::PARAM_STR);
    $query_factura->bindParam(":PAGO", $tipopago, PDO::PARAM_STR);
    $query_factura->bindParam(":BALANCE_FINAL", $balance_final, PDO::PARAM_STR);
    if ($query_factura->execute()) {
        $act_cita = $con->prepare("UPDATE `citas` SET `Completado` = 'SI' WHERE `citas`.`ID_CITA` = '$id_cita'");
        $act_cita->execute();
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Factura</title>
    <link rel="stylesheet" href="../../CSS/factura_final.css">
</head>

<body>

    </div>
    <div id="app" class="col-11">

        <h2>Factura <img src="../../IMGS/LOGOS/Logo_Principal.png" alt=""></h2>

        <div class="row my-3">
            <div class="col-10">
                <h1>Clñinica</h1>
                <p>Av. Winston Churchill</p>
                <p>Plaza Orleans 3er. nivel</p>
                <p>local 312</p>
            </div>
            <div class="col-2">
                <img src="~/images/Mil-Pasos_Negro.png" />
            </div>
        </div>

        <hr />

        <div class="row fact-info mt-3">
            <div class="col-3">
                <h5>Facturar a</h5>
                <p>
                    Arian Manuel Garcia Reynoso
                </p>
            </div>
            <div class="col-3">
                <h5>Enviar a</h5>
                <p>
                    Cotui, Sanchez Ramirez
                    Santa Fe, #19
                    arianmanuel75@gmail.com
                </p>
            </div>
            <div class="col-3">
                <h5>N° de factura</h5>
                <h5>Fecha</h5>
                <h5>Fecha de vencimiento</h5>
            </div>
            <div class="col-3">
                <h5>103</h5>
                <p>09/05/2019</p>
                <p>09/05/2019</p>
            </div>
        </div>

        <div class="row my-5">
            <table class="table table-borderless factura">
                <thead>
                    <tr>
                        <th>Cant.</th>
                        <th>Descripcion</th>
                        <th>Precio Unitario</th>
                        <th>Importe</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>Clases de Cha-Cha-Cha</td>
                        <td>3,000.00</td>
                        <td>3,000.00</td>
                    </tr>
                    <tr>
                        <td>3</td>
                        <td>Clases de Salsa</td>
                        <td>4,000.00</td>
                        <td>12,000.00</td>
                    </tr>
                </tbody>
                <tfoot>
                    <tr>
                        <th></th>
                        <th></th>
                        <th>Total Factura</th>
                        <th>RD$15,000.00</th>
                    </tr>
                </tfoot>
            </table>
        </div>

        <div class="cond row">
            <div class="col-12 mt-3">
                <h4>Condiciones y formas de pago</h4>
                <p>El pago se debe realizar en un plazo de 15 dias.</p>
                <p>
                    Banco Banreserva
                    <br />
                    IBAN: DO XX 0075 XXXX XX XX XXXX XXXX
                    <br />
                    Código SWIFT: BPDODOSXXXX
                </p>
            </div>
        </div>
    </div>

</body>

</html>