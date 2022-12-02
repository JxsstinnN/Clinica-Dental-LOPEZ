<?php
require_once "../../Clases/config.php";

//Consultar Datos de los medicos
$query_medic=$con->prepare("SELECT * FROM MEDICO");
$query_medic->execute();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista PHP</title>
    <link rel="stylesheet" href="../../CSS/Tablas_Medic.css">
</head>
<body>
    
<h1>RWD List to Table</h1>
<table class="rwd-table">
  <tr>
    <th class="table-heading">Nombre Doctor</th>
    <th class="table-heading">Nombre</th>
    <th class="table-heading">Apellido</th>
    <th class="table-heading">Cedula</th>
    <th class="table-heading">Genero</th>
    <th class="table-heading">Fecha_Nacimiento</th>
    <th class="table-heading">Dirección</th>
    <th class="table-heading">Telefono</th>
    <th class="table-heading">Creado A</th>
    <th class="table-heading">Eventos</th>
  </tr>
  <?php
  foreach ($query_medic as $inf)
  {
  ?>
  <tr>
    <td> <?php echo $inf['ID_Medico'];?></td>
    <td> <?php echo $inf['Nombre'];?></td>
    <td> <?php echo $inf['Apellido'];?></td>
    <td> <?php echo $inf['Cedula'];?></td>
    <td> <?php echo $inf['Genero'];?></td>
    <td> <?php echo $inf['Fecha_Nacimiento'];?></td>
    <td> <?php echo $inf['Direccion'];?></td>
    <td> <?php echo $inf['Telefono'];?></td>
    <td> <?php echo $inf['Creado_A'];?></td>
    <td>
    <a href="../../PHP/CRUD.php?action=edit&id=<?php echo $inf['ID_Medico'];?>" class="non-style-link"><button  class="btn-primary-soft btn button-icon btn-edit" ><font class="tn-in-text">Editar</font></button> </a>
    &nbsp;&nbsp;&nbsp;
    <a href="../../PHP/CRUD.php?action=view&id=<?php echo $inf['ID_Medico'] ?>" class="non-style-link"><button  class="btn-primary-soft btn button-icon btn-view" ><font class="tn-in-text">Ver</font></button></a>
    &nbsp;&nbsp;&nbsp;
    <a href="../../PHP/CRUD.php?action=drop&id=<?php echo $inf['ID_Medico'] . '&name='. $inf['Nombre'] ?>" class="non-style-link"><button  class="btn-primary-soft btn button-icon btn-delete"><font class="tn-in-text">Remove</font></button></a>
    </td>

  <?php
  }
  ?>
  </tr>
</table>


</body>
</html>






<!--   echo '<td>
<div style="display:flex;justify-content: center;">
<a href="?action=edit&id=' . $inf['ID_Medico'] . '&error=0" class="non-style-link"><button  class="btn-primary-soft btn button-icon btn-edit" ><font class="tn-in-text">Editar</font></button></a>
&nbsp;&nbsp;&nbsp;
<a href="?action=view&id=' . $inf['ID_Medico']  . '" class="non-style-link"><button  class="btn-primary-soft btn button-icon btn-view" ><font class="tn-in-text">Ver</font></button></a>
&nbsp;&nbsp;&nbsp;
<a href="?action=drop&id=' . $inf['ID_Medico']  . '&name=' . $inf['Nombre'] . '" class="non-style-link"><button  class="btn-primary-soft btn button-icon btn-delete"><font class="tn-in-text">Remove</font></button></a>
</div>
</td>';
--->

<!-- 
-->