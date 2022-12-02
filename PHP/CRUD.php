<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../CSS/Tablas_Medic.css">
</head>
<body>
    <?php
require_once "../Clases/config.php";
if ($_GET)
{
    $id=$_GET['id'];
    $action=$_GET['action'];

    if($action == 'view')
    {
        $query = $con->prepare("SELECT * FROM medico WHERE ID_MEDICO ='$id'");
        $query->execute();
        $result= $query->fetch(PDO::FETCH_ASSOC);
        $Nombre = $result['Nombre'];
        $Apellido = $result['Apellido'];
        $Cedula=$result['Cedula'];
        $Genero =$result['Genero'];
        $Fecha_Nac = $result['Fecha_Nacimiento'];
        $Direccion = $result['Direccion'];
        $Telefono = $result ['Telefono'];

    echo "<div class='overlay' id='divOne'>
    <div class='wrapper'>
    <h2>Ver Detalles del medico</h2>
    <a href='../Paginas/Administrativo/pruebalista.php' class='close'>&times;</a>
    <div class='content'>
    <div class='container'>

    <label>Nombre:</label>
    <strong>".$Nombre."</strong>
    <br>

<label for='apellido'>Apellido:</label>
<strong>".$Apellido."</strong>
<br>

<label for='Cedula'>Cedula:</label>
<strong>".$Cedula."</strong>
<br>

<label for='Genero'>Genero:</label>
<strong>".$Genero."</strong>
<br>

<label for='Fecha_Nacimiento'>Fecha de Nacimiento:</label>
<strong>".$Fecha_Nac."</strong>
<br>

<label for='Direccion'>Direccion</label>
<strong>$Direccion</strong>
<br>

<label for='Telefono'>Telefono</label>
<strong>$Telefono</strong>
<br>



</div>
</div>
</div>
</div>
";
}
     else if($action == 'edit')
    {
        $query = $con->prepare("SELECT * FROM medico WHERE ID_MEDICO ='$id'");
        $query->execute();
        $result= $query->fetch(PDO::FETCH_ASSOC);
        $id_medic= $result['ID_Medico'];
        $Nombre = $result['Nombre'];
        $Apellido = $result['Apellido'];
        $Cedula=$result['Cedula'];
        $Genero =$result['Genero'];
        $Fecha_Nac = $result['Fecha_Nacimiento'];
        $Direccion = $result['Direccion'];
        $Telefono = $result ['Telefono'];

    echo "<div class='overlay' id='divOne'>
    <div class='wrapper'>
    <h2>Editar Detalles del medico</h2>
    <a href='../Paginas/Administrativo/pruebalista.php' class='close'>&times;</a>
    <div class='content'>
    <div class='container'>
    <form action='confirm_edit.php' method='post'>
    <label>Nombre:</label>
    <input type='text' name='nombre_medico' id='nombre_medico' value='".$Nombre."'>
    <input type='hidden' name='id' value='".$id."'>
    <br>

    <label for='apellido'>Apellido:</label>
    <input type='text' name='ape_medico' id='ape_medico' value='".$Apellido."'>
    <br>

    <label for='Cedula'>Cedula:</label>
    <input type='text' name='cedula_medico' id='cedula_medico' value='".$Cedula."'>
    <br>

    <label for='Genero'>Genero:</label>
    <input type='text' name='genero_medico' id='genero_medico' value='".$Genero."'>
    <br>

    <label for='Fecha_Nacimiento'>Fecha de Nacimiento:</label>
    <input type='text' name='fecha_medico' id='fecha_medico' value='".$Fecha_Nac."'>
    <br>

    <label for='Direccion'>Direccion</label>
    <input type='text' name='dire_medico' id='dire_medico' value='".$Direccion."'>
    <br>

<label for='Telefono'>Telefono</label>
    <input type='text' name='tele_medico' id='tele_medico' value='".$Telefono."'>
<br>
<input type='submit' value='Aplicar Cambios' onclick='return confirm('¿Estas seguro de Actualizar este campo?');'>
</form>

</div>
</div>
</div>
</div>
";

}
else if($action == 'drop')
{
echo "<div class='overlay' id='divOne'>
    <div class='wrapper'>
        <h2>Eliminar Registro de Médico</h2>
        <a href='../Paginas/Administrativo/pruebalista.php' class='close'>&times;</a>
            <div class='content'>
                <div class='container'>
                    <form action='confirm_delete.php' method='post'>
                        <h4>¿Desea Borrar este registo?</h4>
                            <br>
                        <h4>Estará borrando el registro <br>".$id."</h4>
                        <input type='hidden' name='id' value='".$id."'>
                        <input type='submit' value='Aplicar Cambios' onclick='return confirm('¿Estas seguro de Actualizar este campo?');'>
                    </form>
</div>
</div>
</div>
</div>";
}

}


?>

</body>
</html>



