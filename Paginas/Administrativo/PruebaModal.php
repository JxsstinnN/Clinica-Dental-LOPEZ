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
    Hacer Click
    </button>

<div id="modal_container" class="modal-container">
  <div class="modal">
    <h1>Ventana Modal</h1>
<table width="80%" class="sub-table scrolldown add-doc-form-container" border="0">
                        <tbody>
                            <tr>
                                <td class="label-td" colspan="2"></td>
                            </tr>
                            <tr>
                            <td>
                                    <p style="padding: 0;margin: 0;text-align: left;font-size: 25px;font-weight: 500;">Agregar Nuevo Doctor.</p><br><br>
                            </td>
                            </tr>
                            
                            <tr>
                                <form action="../../PHP/Nuevo_doctor.php" method="POST" class="add-new-form" id="add_doc">
                                <td class="label-td" colspan="2">
                                    <label for="name" class="form-label">Nombre: </label>
                                </td>
                            </tr>
                            <tr>
                                <td class="label-td" colspan="2">
                                    <input type="text" id="nombre_doc" name="nombre_doc" class="input-text" placeholder="Nombre Doctor" required=""><br>
                                </td>
                                
                            </tr>
                            <tr>
                                <td class="label-td" colspan="2">
                                    <label for="text" class="form-label">Apellido </label>
                                </td>
                            </tr>
                            <tr>
                                <td class="label-td" colspan="2">
                                    <input type="text" id="ape_doc" name="ape_doc" class="input-text" placeholder="Apellido" required=""><br>
                                </td>
                            </tr>
                            <tr>
                                <td class="label-td" colspan="2">
                                    <label for="nic" class="form-label">Cedula: </label>
                                </td>
                            </tr>
                            <tr>
                                <td class="label-td" colspan="2">
                                    <input type="text" id="cedula_doc" name="cedula_doc" class="input-text" placeholder="Número de Documento" required=""><br>
                                </td>
                            </tr>
                            <tr>
                                <td class="label-td" colspan="2">
                                    <label for="Genero" class="form-label">Genero </label>
                                </td>
                            </tr>
                            <tr>
                                <td class="label-td" colspan="2">
                                    <select name="genero_doc" id="genero_doc">
                                        <option value="F">Femenino</option>
                                        <option value="M">Masculino</option>
                                    </select><br>
                                </td>
                            </tr>
                            <tr>
                                <td class="label-td" colspan="2">
                                    <label for="Fecha_Nac" class="form-label">Fecha de nacimiento</label>
                                    
                                </td>
                            </tr>
                            <tr>
                                <td class="label-td" colspan="2">
                                    <input type="text" id="fecha_nac_doc" name="fecha_nac_doc" class="input-text" placeholder="Número de Documento" required="" onchange=obtenerFecha(this)>
                                </td>
                            </tr>
                            <tr>
                                <td class="label-td" colspan="2">
                                    <label for="Direccion" class="form-label">Direccion: </label>
                                </td>
                            </tr>
                            <tr>
                                <td class="label-td" colspan="2">
                                    <input type="text" id="dire_doc" name="dire_doc" class="input-text" placeholder="Dirección" required=""><br>
                                </td>
                            </tr><tr>
                                <td class="label-td" colspan="2">
                                    <label for="Especialida" class="form-label">Especialidad </label>
                                </td>
                            </tr>
                            <tr>
                                <td class="label-td" colspan="2">
                                   <select name="especialidad" id="Especialidad">
                                    <option value="">Dentista general</option>
                                    <option value="">Odontopediatra</option>
                                    <option value="">Ortodoncista</option>
                                    <option value="">Periodoncista</option>
                                    <option value="">Endodoncista</option>
                                    <option value="">Patólogo</option>
                                   </select><br>
                                </td>
                            </tr>
                             <tr>
                                <td class="label-td" colspan="2">
                                    <label for="telefono_do" class="form-label">Numero Telefónico</label>
                                    
                                </td>
                            </tr>
                            <tr>
                                <td class="label-td" colspan="2">
                                    <input type="text" id="telefono_doc" name="telefono_doc" class="input-text" placeholder="Número Telefónico" required="">
                                </td>
                            </tr>

                
                            <tr>
                                <td colspan="2">
                                    <input type="reset" value="Resetear" class="login-btn btn-primary-soft btn">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                
                                    <input type="submit" value="Add" class="login-btn btn-primary btn">
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