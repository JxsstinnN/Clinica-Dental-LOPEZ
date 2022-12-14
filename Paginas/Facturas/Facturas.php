<?php
session_start();
require_once "../../Clases/config.php";
require_once  "../../Clases/sesion.php";
//Consultar Información Adicional de la citas
$query_citas = $con->prepare("select * from citas join medico on Citas.ID_Medico = medico.ID_Medico JOIN pacientes on pacientes.ID_Paciente = citas.ID_Paciente JOIN usuario on usuario.User_ID = citas.User_ID WHERE citas.Completado = 'NO'");
$query_citas->execute();

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista PHP</title>
    <!-- Liberias-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css">
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

            <a href="../Citas/Citas.php">
                <div class="option">
                    <i class="fa-solid fa-calendar-check"></i>
                    <h4>Citas</h4>
                </div>
            </a>

            <a href="Facturas_index.php" class="selected">
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

    <!--Inicio Del contenido -->

    <main>
        <input type="text" id="BuscarInput" onkeyup="Sort()" placeholder="Busqueda" title="Type in a name" size="20">

        <button type="button" class="btn btn-primary" id="BtnAgregarDoc"><a href="Insertar_Citas.php">Agregar nueva cita </a></button>
        <!-- Script para buscar por nombres-->
        <script src="../../JS/sort.js"></script>

        <h1>Citas</h1>

        <table class="table align-middle mb-0 bg-white" id="miTabla">
            <tr class="table-heading" id="Table-header">
                <th scope="col">ID_CITA</th>
                <th scope="col">Titulo</th>
                <th scope="col">Fecha_Cita</th>
                <th scope="col">Hora_Cita</th>
                <th scope="col">Nombre_Paciente</th>
                <th scope="col">Medico_Asignado</th>
                <th scope="col">Usuario_Creador</th>
                <th scope="col">Costo</th>
            </tr>
            <?php
            foreach ($query_citas as $inf) {
            ?>
                <tr id="info_tabla">
                    <td scope="row"> <?php echo $inf['ID_CITA']; ?></td>
                    <td> <?php echo $inf['Titulo']; ?></td>
                    <td> <?php echo $inf['Fecha_Cita']; ?></td>
                    <td> <?php echo $inf['Hora_Cita']; ?></td>
                    <td> <?php echo $inf['Nombre_Paciente']; ?></td> <!-- Nombre de paciente -->
                    <td> <?php echo $inf['Nombre_Medico']; ?></td> <!-- Nombre del doctor -->
                    <td> <?php echo $inf['Nombre_usuario']; ?></td>
                    <td> <?php echo $inf['Costo']; ?></td>
                    <td>
                        <a href="?action=view&id=<?php echo $inf['ID_CITA'] ?>" class="non-style-link"><button class="btn-primary-soft btn button-icon btn-view">
                                <font class="tn-in-text">Ver</font>
                            </button></a>
                        &nbsp;&nbsp;&nbsp;
                        <a href="procesar_factura.php?action=fac&id=<?php echo $inf['ID_CITA']; ?>" class="non-style-link"><button class="btn-primary-soft btn button-icon btn-edit">
                                <font class="tn-in-text">Facturar</font>
                            </button> </a>
                        &nbsp;&nbsp;&nbsp;
                    <?php
                }
                    ?>
                </tr>
        </table>

        <!-- Scripts Necesarios para la pagina-->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.9.2/umd/popper.min.js"></script>
        <script src="../../JS/usuario_pag.js"></script>
    </main>
</body>

</html>

<?php

if ($_GET) {
    $id = $_GET['id'];
    $action = $_GET['action'];


    if ($action == 'view') {
        $query = $con->prepare("SELECT * FROM citas WHERE ID_CITA ='$id'");
        $query->execute();
        $result = $query->fetch(PDO::FETCH_ASSOC);
        $Titulo = $result['Titulo'];
        $Notas = $result['Notas'];
        $Mensaje = $result['Mensaje'];
        $Fecha_Cita = $result['Fecha_Cita'];
        $Hora_Cita = $result['Hora_Cita'];
        $Costo = $result['ID_Paciente'];


        echo "<div class='overlay' id='divOne'>
    <div class='wrapper'>
    <h2>Ver Detalles del medico</h2>
    <a href='Facturas.php' class='close'>&times;</a>
    <div class='content'>
    <div class='container'>
    <label>Titulo de la cita:</label>
    <strong>" . $Titulo . "</strong>
    <br>
<label>Notas:</label>
<strong>" . $Notas . "</strong>
<br>
<label>Mensaje:</label>
<strong>" . $Mensaje . "</strong>
<br>
<label>Fecha de la cita:</label>
<strong>" . $Fecha_Cita . "</strong>
<br>
<label>Fecha de Nacimiento:</label>
<strong>" . $Hora_Cita . "</strong>
<br>
<label>Costo de la cita</label>
<strong>" . $Costo . "</strong>
<br>

<br>
</div>
</div>
</div>
</div>
";
    }
}

?>