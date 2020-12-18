<?php
require_once('ControllerUsuario.php');
use controller\ControllerUsuario;
session_start();

if(isset($_POST['login'])&& isset($_POST['senha'])){
    $login = $_POST['login'];
    $senha = $_POST['senha'];

    try{
        $ctrUsuarios = new ControllerUsuario();
        $usuarios =  $ctrUsuarios->fazerLogin($login,$senha);
        $_SESSION['usuario'] = serialize($usuarios);
        header("Location: ../../index.php");
    }catch(\Exception $e){
        $_SESSION['erroLogin'] = $e->getMessage();
        header("Location: ../../index.php");
     }else{
        $_SESSION['erroLogin'] = "Você precisa fazer login para acessar o sistema";
        header("Location: ../index.php");
    }
}
?>
