<?php
require_once "../../Clases/config.php";

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
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../CSS/AAA.css">
</head>

<body>
    <input type="text" id="BuscarInput" onkeyup="Sort()" placeholder="Search for names.." title="Type in a name">

    <button type="button" class="btn btn-primary"><a href="?action=insert">Agregar nuevo dotol </a></button>
    <!-- Script para buscar por nombres-->
    <script src="../../JS/sort.js"></script>

    <h1>Medicos</h1>

    <table class="table align-middle mb-0 bg-white" id="miTabla">
        <tr class="table-heading">
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
            <tr>
                <td scope="row"> <?php echo $inf['ID_Medico']; ?></td>
                <td> <?php echo $inf['Nombre']; ?></td>
                <td> <?php echo $inf['Apellido']; ?></td>
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
                    <a href="?action=drop&id=<?php echo $inf['ID_Medico'] . '&name=' . $inf['Nombre'] ?>" class="non-style-link"><button class="btn-primary-soft btn button-icon btn-delete">
                            <font class="tn-in-text">Remove</font>
                        </button></a>
                </td>

            <?php
        }
            ?>
            </tr>
    </table>


    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
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
        $Nombre = $result['Nombre'];
        $Apellido = $result['Apellido'];
        $Cedula = $result['Cedula'];
        $Genero = $result['Genero'];
        $Fecha_Nac = $result['Fecha_Nacimiento'];
        $Direccion = $result['Direccion'];
        $Telefono = $result['Telefono'];

        echo "<div class='overlay' id='divOne'>
    <div class='wrapper'>
    <h2>Ver Detalles del medico</h2>
    <a href='pruebalista.php' class='close'>&times;</a>
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
        $Nombre = $result['Nombre'];
        $Apellido = $result['Apellido'];
        $Cedula = $result['Cedula'];
        $Genero = $result['Genero'];
        $Fecha_Nac = $result['Fecha_Nacimiento'];
        $Direccion = $result['Direccion'];
        $Telefono = $result['Telefono'];

        echo "<div class='overlay' id='divOne'>
    <div class='wrapper'>
    <h2>Editar Detalles del medico</h2>
    <a href='pruebalista.php' class='close'>&times;</a>
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
        <a href='pruebalista.php' class='close'>&times;</a>
            <div class='content'>
                <div class='container'>
                    <form action='DOCTOR/confirm_delete.php' method='post'>
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
    <a href='AAAAAAAAAAAAAA.php' class='close'>&times;</a>
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