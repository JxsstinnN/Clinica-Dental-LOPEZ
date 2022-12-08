<?php
session_start();
require_once "../../Clases/config.php";

if ($_POST) {
    $id = $_POST['id'];
    $action = $_POST['action'];
    if ($action == 'fac') {
        $query = $con->prepare("select * from citas  WHERE ID_CITA ='$id'");
        $query->execute();
        $result = $query->fetchALL(PDO::FETCH_ASSOC);;
        print_r($result);
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Procesar_Factura</title>
</head>
<body>

    <div class="tab">Datos del cliente:
        <p><input placeholder="Nombre del paciente" oninput="this.className = ''" value=""></p>
        <p><input placeholder="Last name..." oninput="this.className = ''"></p>
    </div>



</body>

</html>