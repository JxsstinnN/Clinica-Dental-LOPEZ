<?php
session_start();
require_once "../../Clases/config.php";
require_once  "../../Clases/sesion.php";

if ($_POST) {
    $user_id = $_SESSION['user_id'];
    $dire_paciente = $_POST['dire_paci'];
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

    $query_factura = $con->prepare("INSERT INTO FACTURA VALUES (NULL,:id_paciente,:user_id,:id_medico,:ID_CITA,:costo_cita,:Balance_neto,:ITBIS,:PAGO,:BALANCE_FINAL,NULL)");
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
    $query_factura = $con->prepare("SELECT * FROM FACTURA");
    $query_factura->execute();
    $result = $query_factura->fetch(PDO::FETCH_ASSOC);
    $id_factura = $result['ID_Factura'];
    $creado_a = $result['Creado_A'];
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Factura</title>
    <!-- Liberias-->
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css'>
    <link rel="stylesheet" href="../../CSS/factura_final.css">
    <!-- Fin de las Liberias-->

</head>

<body>

    </div>
    <div id="factura" class="col-11">

        <h2>Factura</h2>

        <div class="row my-3">
            <div class="col-10">
                <h1>Clinica Grullón</h1>
                <p>Av. Juan pablo duarte</p>
                <p>Plaza internacional 12vo nivel</p>
                <p>local 3512</p>
            </div>
            <div class="col-2">
            <img src="../../IMGS/LOGOS/Logo_Principal.png" alt="" width="250px"> 
            </div>
        </div>

        <hr />

        <div class="row fact-info mt-3">
            <div class="col-3">
                <h5>Facturar a</h5>
                <p>
                    <?php echo $nombre_paciente; ?>
                </p>
            </div>
            <div class="col-3">
                <h5>Enviar a</h5>
                <p>
                    <?php echo $dire_paciente; ?>
                </p>
            </div>
            <div class="col-3">
                <h5>N° de factura</h5>
                <h5>Fecha</h5>
                <h5>Fecha de vencimiento</h5>
            </div>
            <div class="col-3">
                <h5><?php echo $id_factura;  ?></h5>
                <p><?php echo $creado_a ; ?></p>
                <p>09/05/2250</p>
            </div>
        </div>

        <div class="row my-5">
            <table class="table table-borderless factura">
                <thead>
                    <tr>
                        <th>Descripcion</th>
                        <th>Precio del Servicio</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><?php echo $servicio; ?></td>
                        <td><?php echo $costo_servicio; ?></td>
                    </tr>
                </tbody>
                <tfoot>
                    <tr>
                        <th>ITBIS</th>
                        <td><?php echo $itbis; ?></td>
                        <th>Total Factura</th>
                        <td>RD <?php echo $balance_final; ?></td>
                        <th>Usuario que lo atendio</th>
                        <td><?php echo $_SESSION['nombre']; ?></td>
                    </tr>
                </tfoot>
            </table>
        </div>


    </div>


</body>

</html>