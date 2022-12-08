<?php
session_start();
require_once "../../Clases/config.php";
require_once '../../Clases/sesion.php';
//Consultar Datos de los medicos
$query_medic = $con->prepare("SELECT * FROM Factura");
$query_medic->execute();

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

            <a href="Pag_usuario.php">
                <div class="option">
                    <i class="fas fa-home" title="Inicio"></i>
                    <h4>Inicio</h4>
                </div>
            </a>

            <a href="Doctores_CRUD.php" >
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

        <button type="button" class="btn btn-primary" id="BtnAgregarDoc"><a href="?action=insert">Agregar nuevo dotor </a></button>
        <!-- Script para buscar por nombres-->
        <script src="../../JS/sort.js"></script>

        <h1>Facturas</h1>

        <table class="table align-middle mb-0 bg-white" id="miTabla">
            <tr class="table-heading" id="Table-header">
                <th scope="col">ID_FACTURA</th>
                <th scope="col">ID_Paciente</th>
                <th scope="col">User_ID</th>
                <th scope="col">ID_Medico</th>
                <th scope="col">ID_Cita</th>
                <th scope="col">Balance Final</th>
                <th scope="col">Creado_A</th>
                <th scope="col">Eventos</th>
            </tr>
            <?php
            foreach ($query_medic as $inf) {
            ?>
                <tr id="info_tabla">
                    <td scope="row"> <?php echo $inf['ID_Factura']; ?></td>
                    <td> <?php echo $inf['ID_Paciente']; ?></td>
                    <td> <?php echo $inf['User_ID']; ?></td>
                    <td> <?php echo $inf['ID_Medico']; ?></td>
                    <td> <?php echo $inf['ID_Cita']; ?></td>
                    <td> <?php echo $inf['Balance_Final']; ?></td>
                    <td> <?php echo $inf['Creado_A']; ?></td>
                    <td>
                        <a href="?action=view&id=<?php echo $inf['ID_Medico'] ?>" class="non-style-link"><button class="btn-primary-soft btn button-icon btn-view">
                                <font class="tn-in-text">Ver</font>
                            </button></a>
                        &nbsp;&nbsp;&nbsp;
                        <a href="?action=edit&id=<?php echo $inf['ID_Medico']; ?>" class="non-style-link"><button class="btn-primary-soft btn button-icon btn-edit">
                                <font class="tn-in-text">Editar</font>
                            </button> </a>
                        &nbsp;&nbsp;&nbsp;
                        <?php
                        if ($_SESSION["tipo_usuario"] == "ADMIN") {
                        ?>
                            <a href="?action=drop&id=<?php echo $inf['ID_Medico'] . '&name=' . $inf['Nombre_Medico']  ?>" class="non-style-link"><button class="btn-primary-soft btn button-icon btn-delete">
                                    <font class="tn-in-text">Remove</font>
                                </button></a>
                    </td>
                <?php } ?>
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