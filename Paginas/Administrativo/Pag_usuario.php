<?php
session_start();
require_once "../../Clases/config.php";
require_once '../../Clases/sesion.php';

$querypaciente = $con->prepare("SELECT * FROM PACIENTES ");
$querypaciente->execute();

$citas_proximas = $con->prepare("select Fecha_Cita from citas where Fecha_Cita > CURRENT_DATE");
$citas_proximas->execute();

$citas_hoy = $con->prepare("Select * from citas where Fecha_Cita = CURRENT_DATE");
$citas_hoy->execute();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <!-- Liberias-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../CSS/cards.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <script src="https://kit.fontawesome.com/41bcea2ae3.js" crossorigin="anonymous"></script>
    <!-- Fin de las Liberias-->
    <!-- Estilos-->
    <link rel="stylesheet" href="../../CSS/Pag_Usuarios.css">
    <link rel="stylesheet" href="../../CSS/Tablas_Medic.css">
</head>

<body id="body">

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

            <a href="Pag_usuario.php" class="selected">
                <div class="option">
                    <i class="fas fa-home" title="Inicio"></i>
                    <h4>Inicio</h4>
                </div>
            </a>

            <a href="Doctores_CRUD.php">
                <div class="option">
                <i class="fa-solid fa-user-doctor" title="Doctores"></i>
                    <h4>Doctores</h4>
                </div>
            </a>

            <a href="Pacientes_CRUD.php">
                <div class="option">
                    <i class='bx bx-group' title="Pacientes"></i>
                    <h4>Pacientes</h4>
                </div>
            </a>

            <a href="../Citas/Citas.php">
                <div class="option">
                    <i class="fa-solid fa-calendar-check"></i>
                    <h4>Citas</h4>
                </div>
            </a>

            <a href="../Facturas/Facturas_index.php">
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
        <h1>Hola <?php echo $_SESSION['tipo_usuario'] . '&nbsp;' . $_SESSION['nombre']; ?></h1><br>
        <div class="card">
            <img src="../../IMGS/administrativo/cita_icon.png" alt="Avatar" style="width:50px">
            <div class="container">
                <h4><b>Citas Próximas Generales</b></h4>
                <p style="font-size:20px"><?php echo $citas_proximas->rowCount(); ?></p>
            </div>
        </div>

        <div class="card">
            <img src="../../IMGS/administrativo/cita_icon.png" alt="Avatar" style="width:50px">
            <div class="container">
                <h4><b>Pacientes</b></h4>
                <p style="font-size:20px"><?php echo $querypaciente->rowCount(); ?></p>
            </div>
        </div>

        <div class="card">
            <img src="../../IMGS/administrativo/cita_icon.png" alt="Avatar" style="width:50px">
            <div class="container">
                <h4><b>Sesiones Hoy</b></h4>
                <p style="font-size:20px"><?php echo $citas_hoy->rowCount(); ?></p>
            </div>
        </div>



    </main>



    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.9.2/umd/popper.min.js"></script>
    <script src="../../JS/usuario_pag.js"></script>
</body>

</html>