<?php
session_start();

require_once "../Clases/config.php";

if($_SERVER["REQUEST_METHOD"] == "POST")
{
    header("Content-Type: application/json");
    $array_devolver;

    $usuario = strtoupper($_POST['usuario']);
    $password = $_POST['password'];
    $buscar_user = $con->prepare("SELECT * FROM usuario WHERE Nombre_usuario = '$usuario' LIMIT 1");
    $buscar_user->bindParam(':usuario',$usuario, PDO::PARAM_STR);
    $buscar_user->execute();

    if($buscar_user->rowCount() ==1)
    {
        $user = $buscar_user->fetch(PDO::FETCH_ASSOC);
        $user_id = (int) $user['User_ID'];
        $nombre_user = (string) $user['Nombre_usuario'];
        $tipo_usuario = (string) $user['Tipo_usuario'];
        $hash = (string) $user['password'];
        if(password_verify($password,$hash))
        {
            $_SESSION['user_id']=$user_id;
            $_SESSION['nombre']=$nombre_user;
            $_SESSION['tipo_usuario']=$tipo_usuario;
            $array_devolver['redirect'] = "http://localhost/Clinica%20Dental%20LOPEZ/Paginas/Administrativo/Pag_usuario.php";
        }
    
    else
    {
        $array_devolver['error']="Los datos son incorrectos";
    }
    }
    
    else{
        $array_devolver['error']="No tienes cuenta";
    }
    echo json_encode($array_devolver);
}

else
{
    exit("No funciona eto coñazo");
}
?>