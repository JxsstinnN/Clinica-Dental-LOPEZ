<?php
session_start();
require_once "../../Clases/config.php";
require_once '../../Clases/sesion.php';
//Consultar Datos de los medicos
$query_medic = $con->prepare("SELECT * FROM MEDICO");
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

            <a href="Doctores_CRUD.php" class="selected">
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

    <!--Inicio Del contenido -->

    <main>
        <input type="text" id="BuscarInput" onkeyup="Sort()" placeholder="Busqueda" title="Type in a name" size="20">

        <button type="button" class="btn btn-primary" id="BtnAgregarDoc"><a href="?action=insert">Agregar nuevo dotor </a></button>
        <!-- Script para buscar por nombres-->
        <script src="../../JS/sort.js"></script>

        <h1>Medicos</h1>

        <table class="table align-middle mb-0 bg-white" id="miTabla">
            <tr class="table-heading" id="Table-header">
                <th scope="col">Nombre Doctor</th>
                <th scope="col">Nombre</th>
                <th scope="col">Apellido</th>
                <th scope="col">Cedula</th>
                <th scope="col">Fecha_Nacimiento</th>
                <th scope="col">Dirección</th>
                <th scope="col">Telefono</th>
                <th scope="col">Eventos</th>
            </tr>
            <?php
            foreach ($query_medic as $inf) {
            ?>
                <tr id="info_tabla">
                    <td scope="row"> <?php echo $inf['ID_Medico']; ?></td>
                    <td> <?php echo $inf['Nombre_Medico']; ?></td>
                    <td> <?php echo $inf['Apellido_Medico']; ?></td>
                    <td> <?php echo $inf['Cedula']; ?></td>
                    <td> <?php echo $inf['Fecha_Nacimiento']; ?></td>
                    <td> <?php echo $inf['Direccion']; ?></td>
                    <td> <?php echo $inf['Telefono']; ?></td>
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

<?php

if ($_GET) {
    $id = $_GET['id'];
    $action = $_GET['action'];

    if ($action == 'view') {
        $query = $con->prepare("SELECT * FROM medico WHERE ID_MEDICO ='$id'");
        $query->execute();
        $result = $query->fetch(PDO::FETCH_ASSOC);
        $Nombre = $result['Nombre_Medico'];
        $Apellido = $result['Apellido_Medico'];
        $Cedula = $result['Cedula'];
        $Genero = $result['Genero'];
        $Fecha_Nac = $result['Fecha_Nacimiento'];
        $Direccion = $result['Direccion'];
        $Telefono = $result['Telefono'];

        echo "<div class='overlay' id='divOne'>
    <div class='wrapper'>
    <h2>Ver Detalles del medico</h2>
    <a href='Doctores_CRUD.php' class='close'>&times;</a>
    <div class='content'>
    <div class='container'>

    <label>Nombre:</label>
    <strong>" . $Nombre . "</strong>
    <br>

<label>Apellido:</label>
<strong>" . $Apellido . "</strong>
<br>

<label>Cedula:</label>
<strong>" . $Cedula . "</strong>
<br>

<label>Genero:</label>
<strong>" . $Genero . "</strong>
<br>

<label>Fecha de Nacimiento:</label>
<strong>" . $Fecha_Nac . "</strong>
<br>

<label>Direccion</label>
<strong>$Direccion</strong>
<br>

<label>Telefono</label>
<strong>$Telefono</strong>
<br>



</div>
</div>
</div>
</div>
";
    } else if ($action == 'edit') {
        $query = $con->prepare("SELECT * FROM medico WHERE ID_MEDICO ='$id'");
        $query->execute();
        $result = $query->fetch(PDO::FETCH_ASSOC);
        $id_medic = $result['ID_Medico'];
        $Nombre = $result['Nombre_Medico'];
        $Apellido = $result['Apellido_Medico'];
        $Cedula = $result['Cedula'];
        $Genero = $result['Genero'];
        $Fecha_Nac = $result['Fecha_Nacimiento'];
        $Direccion = $result['Direccion'];
        $Telefono = $result['Telefono'];

        echo "<div class='overlay' id='divOne'>
    <div class='wrapper'>
    <h2>Editar Detalles del medico</h2>
    <a href='Doctores_CRUD.php' class='close'>&times;</a>
    <div class='content'>
    <div class='container'>
    <form action='../../PHP/DOCTOR/confirm_edit.php' method='post'>
    <label>Nombre:</label>
    <input type='text' name='nombre_medico' id='nombre_medico ' value='" . $Nombre . "'>
    <input type='hidden' name='id' value='" . $id . "'>
    <br>

    <label for='apellido'>Apellido:</label>
    <input type='text' name='ape_medico' id='ape_medico' value='" . $Apellido . "'>
    <br>

    <label for='Cedula'>Cedula:</label>
    <input type='text' name='cedula_medico' id='cedula_medico' value='" . $Cedula . "'>
    <br>

    <label for='Genero'>Genero:</label>
    <input type='text' name='genero_medico' id='genero_medico' value='" . $Genero . "'>
    <br>

    <label for='Fecha_Nacimiento'>Fecha de Nacimiento:</label>
    <input type='text' name='fecha_medico' id='fecha_medico' value='" . $Fecha_Nac . "'>
    <br>

    <label for='Direccion'>Direccion</label>
    <input type='text' name='dire_medico' id='dire_medico' value='" . $Direccion . "'>
    <br>

<label for='Telefono'>Telefono</label>
    <input type='text' name='tele_medico' id='tele_medico' value='" . $Telefono . "'>
<br>
<input type='submit' value='Aplicar Cambios' onclick='return confirm('¿Estas seguro de Actualizar este campo?');'>
</form>

</div>
</div>
</div>
</div>
";
    } else if ($action == 'drop') {
        echo "<div class='overlay' id='divOne'>
    <div class='wrapper'>
        <h2>Eliminar Registro de Médico</h2>
        <a href='Doctores_CRUD.php' class='close'>&times;</a>
            <div class='content'>
                <div class='container'>
                    <form action='../../PHP/Doctor/confirm_delete.php' method='post'>
                        <h4>¿Desea Borrar este registo?</h4>
                            <br>
                        <h4>Estará borrando el registro <br>" . $id . "</h4>
                        <input type='hidden' name='id' value='" . $id . "'>
                        <input type='submit' value='Aplicar Cambios' onclick='return confirm('¿Estas seguro de Actualizar este campo?');'>
                    </form>
</div>
</div>
</div>
</div>";
    } else if ($action == "insert") {
        echo   "<div class='overlay' id='divOne'>
    <div class='wrapper'>
    <h2>Insertar datos medico</h2>
    <a href='Doctores_CRUD.php' class='close'>&times;</a>
    <div class='content'>
    <div class='container'>
    <form action='../../PHP/DOCTOR/Nuevo_doctor.php' method='post'>
    <label>Nombre:</label>
    <input type='text' name='nombre_doc' id='nombre_doc'>
    <br>

    <label for='apellido'>Apellido:</label>
    <input type='text' name='ape_doc' id='ape_doc'>
    <br>

    <label for='Cedula'>Cedula:</label>
    <input type='text' name='cedula_doc' id='cedula_doc'>
    <br>

    <label for='Genero'>Genero:</label>
     <select name='genero_doc' id='genero_doc'>
        <option value='F'>Femenino</option>
        <option value='M'>Masculino</option>
        </select>
    <br>

    <label for='Fecha_Nacimiento'>Fecha de Nacimiento:</label>
    <input type='text' name='fecha_nac_doc' id='fecha_nac_doc'>
    <br>

    <label for='Direccion'>Direccion</label>
    <input type='text' name='dire_doc' id='dire_doc'>
    <br>

<label for='Telefono'>Telefono</label>
    <input type='text' name='telefono_doc' id='telefono_doc'>
<br>
<input type='submit' value='Aplicar Cambios' >
</form>

</div>
</div>
</div>
</div>
";
    }
}

?>