<?php
require_once "../Clases/config.php";

if($_SERVER["REQUEST_METHOD"] == "POST")
{
    header("Content-Type: application/json");
    $array_devolver;

    $usuario = strtoupper($_POST['usuario']);
    $typeuser = strtoupper($_POST['typeuser']);
    $buscar_user = $con->prepare("SELECT * FROM usuario WHERE Nombre_usuario = '$usuario' LIMIT 1");
    $buscar_user->bindParam(':usuario',$usuario, PDO::PARAM_STR);
    $buscar_user->execute();

    if($buscar_user->rowCount() ==1)
    {
        $array_devolver["error"] = "Este usuario ya existe";
        $array_devolver["is_login"] = false;
    }
    else
    {
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
        $nuevo_user= $con->prepare("INSERT INTO usuario (Nombre_usuario,password,Tipo_usuario) VALUES(:usuario, :password, :typeuser)");
        $nuevo_user->bindParam(':usuario',$usuario, PDO::PARAM_STR);
        $nuevo_user->bindParam(':typeuser',$typeuser,PDO::PARAM_STR);
        $nuevo_user->bindParam(':password',$password, PDO::PARAM_STR);
        $nuevo_user->execute();

        $user_id = $con->lastInsertId();
        $_SESSION['user_id']= (int) $user_id;
        $array_devolver['redirect']= 'Login.php';
        $array_devolver['is_login']= true;
    }
    echo json_encode($array_devolver);
}

else
{
    exit("No funciona eto coñazo");
}
?>