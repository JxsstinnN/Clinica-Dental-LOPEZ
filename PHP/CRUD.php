<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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


     if($action == 'edit')
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
    <div class='content'>
    <div class='container'>

    <label>Nombre:</label>
    <input>".$Nombre."</input>
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
}


?>

</body>
</html>



