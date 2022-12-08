<?php
session_start();
require_once "../../Clases/config.php";

if ($_GET) {
    $id = $_GET['id'];
    $action = $_GET['action'];
    if ($action == 'fac') {
        $query = $con->prepare("select * from citas join medico on Citas.ID_Medico = medico.ID_Medico JOIN pacientes on pacientes.ID_Paciente = citas.ID_Paciente JOIN usuario on usuario.User_ID = citas.User_ID WHERE ID_CITA ='$id'");
        $query->execute();
        $result = $query->fetch(PDO::FETCH_ASSOC);
        $nombre_paciente = $result['Nombre_Paciente'];
        $ape_paciente = $result['Apellido_Paciente'];
        $titulo = $result['Titulo'];
        $costo = $result['Costo'];
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
    <!-- Liberias-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <script src="https://kit.fontawesome.com/41bcea2ae3.js" crossorigin="anonymous"></script>
    <!-- Fin de las Liberias-->
    <link rel="stylesheet" href="../../CSS/Pag_Usuarios.css">
    <link rel="stylesheet" href="../../CSS/Tablas_Medic.css">
    <link rel="stylesheet" href="../../CSS/Factura.css">
    <title>Factura</title>
</head>

<body>

    <header>
        <div class="icon__menu">
            <i class="fas fa-bars" id="btn_open"></i>
        </div>

        <div id="current-date"> <span>Fecha Actual:</span>
            <div class="right-date" id="fecha">AAAAAAAAAAA</div>
        </div>

        <div class="dropdown">
            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <?php echo $_SESSION['nombre']; ?>
            </button>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                <a class="dropdown-item" href="../../PHP/Sesion.php?sesion=cerrar">Cerrar sesion </a>
            </div>
        </div>
    </header>

    <div class="menu__side" id="menu_side">

        <div class="name__page">
            <i class="fa-solid fa-hospital"></i>
            <h4>Clinica Grullón</h4>
        </div>

        <div class="options__menu">

            <a href="../Administrativo/Pag_usuario.php">
                <div class="option">
                    <i class="fas fa-home" title="Inicio"></i>
                    <h4>Inicio</h4>
                </div>
            </a>

            <a href="../Administrativo/Doctores_CRUD.php">
                <div class="option">
                    <i class="fa-solid fa-user-doctor" title="Doctores"></i>
                    <h4>Doctores</h4>
                </div>
            </a>

            <a href="../Administrativo/Pacientes_CRUD.php">
                <div class="option">
                    <i class='bx bx-group' title="Pacientes"></i>
                    <h4>Pacientes</h4>
                </div>
            </a>

            <a href="../Pacientes/Citas.php" class="selected">
                <div class="option">
                    <i class="fa-solid fa-calendar-check"></i>
                    <h4>Citas</h4>
                </div>
            </a>

            <a href="Facturas.php" class="selected">
                <div class="option">
                    <i class="fa-solid fa-receipt"></i>
                    <h4>Facturas</h4>
                </div>
            </a>

            <?php
            if ($_SESSION["tipo_usuario"] == "ADMIN") {
                echo "<a href='../config/config.php'>
                <div class='option'>
                    <i class='bx bx-cog' title='Contacto'></i>
                    <h4>Configuración</h4>
                </div>
            </a>";
            }


            ?>


        </div>

    </div>


    <main>
        <form action="../../PHP/Factura/Factura_final.php" method="post" id="FormFac">
            <h1>Facturación:</h1>

            <div class="tab">Datos del cliente:
                <p class="inf">Nombre<input class="text" value="<?php echo $nombre_paciente ?>" readonly name="nombre_paciente"></p>
                <p class="inf">Apellido<input class="text" name="apellido_paciente" value="<?php echo $ape_paciente ?>" readonly></p>
                <p class="inf">Servicio Realizado<input class="text" value=" <?php echo $titulo; ?>" readonly name="servicio_paciente"></p>
            </div>

            <div class="tab">Datos de pago:
                <p class="inf"><input class="text" name="costo_serv" placeholder="Costo del servicio" value="<?php echo $costo ?>" readonly></p>
                <p class="inf">Tipo de Pago</p>
                <a href="#efe" style="text-decoration: none; color:black;" class="pago" id="efeA">
                    <p class="inf">Efectivo</p>
                </a><br>

            </div>



            <div style="overflow:auto;">
                <div style="float:right;">
                    <button type="button" id="prevBtn" onclick="nextPrev(-1)">Atras</button>
                    <button type="button" id="nextBtn" onclick="nextPrev(1)">Siguiente</button>
                </div>
            </div>

            <!-- Circles which indicates the steps of the form: -->
            <div style="text-align:center;margin-top:40px;">
                <span class="step"></span>
                <span class="step"></span>
                <span class="step"></span>
                <span class="step"></span>
            </div>


            <div id="efe" class="overlay1">
                <div class="popupc">
                    <h2>Efectivo</h2>
                    <a class="close" href="#">&times;</a>
                    <div class="content">
                        RD$<p class="inf"><input class="text" name="costo_servicio" placeholder="Costo del servicio" value="<?php echo $costo ?>" readonly></p>
                        RD$<p class="inf"><input class="text" placeholder="Monto Recibido" name="recibido_cliente"></p>
                    </div>
                    <a href="#" class="button1" id="efeBtn" onClick="oculta()">Aceptar</a>
                </div>
            </div>

            <div id="tar" class="overlay1">
                <div class="popupc">
                    <h2 class="center">Tarjeta</h2>
                    <a class="close" href="#">&times;</a>
                    <div class="content">
                        Nombre de la tarjeta
                        <p class="inf">
                            <input type="text" id="cname" name="nomb_tarjeta" placeholder="">
                        </p>
                        Numero de la tarjeta
                        <p class="inf">
                            <input type="text" id="ccnum" name="num_tarjeta" placeholder="1111-2222-3333-4444">
                        </p>
                        Mes de expiración
                        <p class="inf">
                            <input type="text" id="expmonth" name="mesexp_tarj" placeholder="September">
                        </p>
                        Año de expiracion
                        <p class="inf">
                            <input type="text" id="añoexp_tarj" name="añoexp_tarj" placeholder="2018">
                        </p>
                        CVV
                        <p class="inf">
                            <input type="text" id="cvv" name="cvv" placeholder="352">
                        </p>

                    </div>
                    <a href="#" class="button1" id="efeBtn" onClick="oculta1()">Aceptar</a>
                </div>
            </div>
            </div>
            </div>

            <input type="hidden" value="" id="tipoHidden" name="tipo_pago">
            <input type="hidden" value="<?php echo $result['ID_Paciente']; ?>" name="id_paciente">
            <input type="hidden" name="id_cita" value="<?php echo $result['ID_CITA']; ?>">
            <input type="hidden" name="id_medico" value="<?php echo $result['ID_Medico']; ?>">
            <input type="hidden" name="dire_paci" value="<?php echo $result['Direccion']; ?>">

        </form>

    </main>
    <script src="../../JS/factura.js"></script>
</body>

</html>