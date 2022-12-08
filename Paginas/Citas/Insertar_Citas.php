<?php
require_once "../../Clases/config.php";
session_start();
$_SESSION['user_id'];
$query= $con->prepare("SELECT * FROM PACIENTES");
$query->execute();
$data=$query->fetchAll();

$query_medico= $con->prepare("SELECT * FROM medico");
$query_medico->execute();
$data1=$query_medico->fetchAll();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
 <link rel="stylesheet" href="../../CSS/modal.css">
 <script src="../../JS/formato_fecha.js"></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.4/moment.min.js"></script>
</head>

<body>
    <button id="open">
    Ingresar Cita
    </button>

<div id="modal_container" class="modal-container">
  <div class="modal">
    <h1>Ventana Modal</h1>
<table width='60%' class='sub-table scrolldown add-doc-form-container' border='0' id="Tabla1">
                        <tbody>
                            <tr>
                                <td class='label-td' colspan='2'></td>
                            </tr>
                            <tr>
                            <td>
                                    <p style='padding: 0;margin: 0;text-align: left;font-size: 25px;font-weight: 500;'>Agregar Nuevo Doctor.</p><br><br>
                            </td>
                            </tr>
                            
                            <tr>
                                <form action='../../PHP/Citas/Nueva_Cita.php' method='POST' class='add-new-form' id='add_doc'>
                                <td class='label-td' colspan='2'>
                                    <label for='name' class='form-label'>Nombres del paciente: </label>
                                </td>
                            </tr>
                            <tr>
                                <td class='label-td' colspan='2'>
                                    <select name='Nombre_Paciente' id=''>
                                        <?php foreach ($data as $valores){ 
                                        echo '<option value="'.$valores["ID_Paciente"].'">'.$valores["Nombre_Paciente"]."&nbsp;".$valores["Apellido_Paciente"].'</option>'; 
                                        } ?>
                                    </select><br>
                                </td>
                                
                            </tr>

                            <tr>
                                <td class='label-td' colspan='2'>
                                    <label for='nic' class='form-label'>Titulo: </label>
                                </td>
                            </tr>
                            <tr>
                                <td class='label-td' colspan='2'>
                                    <input type='text' id='titulo_cita' name='titulo_cita' class='input-text' placeholder='Titulo de la cita' required=''><br>
                                </td>
                            </tr>
                            <tr>
                                <td class='label-td' colspan='2'>
                                    <label for='notas_cita' class='form-label'>Notas</label>
                                    
                                </td>
                            </tr>
                            <tr>
                                <td class='label-td' colspan='2'>
                                    <input type='text' id='Notas_Cita' name='Notas_Cita' class='input-text' placeholder='Notas de la cita' required='' onchange=obtenerFecha(this)>
                                </td>
                            </tr>
                            <tr>
                                <td class='label-td' colspan='2'>
                                    <label for='mensaje_cita' class='form-label'>Mensaje</label>
                                    
                                </td>
                            </tr>
                            <tr>
                                <td class='label-td' colspan='2'>
                                    <input type='text' id='mensaje_cita' name='mensaje_cita' class='input-text' required=''>
                                </td>
                            </tr>
                            <tr>
                                <td class='label-td' colspan='2'>
                                    <label for='fecha_cita' class='form-label'>Fecha de la cita:</label>
                                </td>
                            </tr>
                            <tr>
                                <td class='label-td' colspan='2'>
                                   <input id='fecha_cita' type='date' name='fecha_cita'/><br>
                                </td>
                            </tr>

                            <tr>
                                <td class='label-td' colspan='2'>
                                    <label for='hora_cita' class='form-label'>Hora de la cita:</label>
                                </td>
                            </tr>
                            <tr>
                                <td class='label-td' colspan='2'>
                                   <input id='hora_cita' type='time' name='hora_cita'/><br>
                                </td>
                            </tr>
                            <tr>
                                <td class='label-td' colspan='2'>
                                    <label for='ID_Medico' class='form-label'>Medico que lo atendera</label>
                                </td>
                            </tr>
                            <tr>
                                <td class='label-td' colspan='2'>
                                   <select name='ID_Medico' id=''>
                                        <?php foreach ($data1 as $valoresmed){ 
                                        echo '<option value="'.$valoresmed["ID_Medico"].'">'.$valoresmed["Nombre_Medico"].'&nbsp;'. $valoresmed["Apellido_Medico"].'</option>'; 
                                        } ?>
                                    </select><br>
                                </td>
                            </tr>
                             <tr>
                                <td class='label-td' colspan='2'>
                                    <label for='telefono_do' class='form-label'>Usuario que creo la cita</label>
                                    
                                </td>
                            </tr>
                            <tr>
                                <td class='label-td' colspan='2'>
                                    <select name='Usuario_Iniciado' id=''>
                                        <?php echo "<option value='".$_SESSION['user_id']."'>".$_SESSION['nombre']."</option>"; ?>
                                    </select>
                                </td>
                            </tr>
                                <tr>
                                <td class='label-td' colspan='2'>
                                    <label for='costo_cita' class='form-label'>Costo de la cita:</label>
                                </td>
                            </tr>
                            <tr>
                                <td class='label-td' colspan='2'>
                                   <input type='text' name='costo_cita'/><br>
                                </td>
                            </tr>

                
                            <tr>
                                <td colspan='2'>
                                    <input type='reset' value='Resetear' class='login-btn btn-primary-soft btn'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                
                                    <input type='submit' value='Add' class='login-btn btn-primary btn'>
                                </td>
                
                            </tr>
                           </form>
                        </tbody></table>
                        </div>
    <button id="close">Cerrar</button>
  </div>
</div>




<script src="../../JS/add_doc.js"></script>


</body>
</html>