<?php

include('conf.php');

  function trataDados($login, $senha) {
    if (!$login || !$senha) {
      $message = 'Preencha todos os dados!';
      echo "<script>alert('$message')</script>";
      echo "<script>window.location.replace('../');</script>";
    } else {
       $con = new mysqli(
        get_config_vars()->{'ip'}, 
        get_config_vars()->{'user'}, 
        get_config_vars()->{'password'}, 
        get_config_vars()->{'db'}
      );

       $result = $con->query("SELECT name, pass FROM usuario WHERE name = '$login' AND pass = '$senha'");

       if (mysqli_num_rows($result)) {  // Verifica se o usuário existe
        header('location: main.php');
       } else {
        $message = 'Login ou senha incorretos!';
        echo "<script>alert('$message')</script>";
        echo "<script>window.location.replace('../');</script>";
       }
    }
  }

  try {
    session_start();

    $_SESSION['login'] = $_POST['login'];
    $_SESSION['senha'] = $_POST['senha'];

    trataDados($_SESSION['login'], $_SESSION['senha']);
  } catch (Exception $e) {
      $message = 'Houve algum erro inesperado, tente novamente!';
      echo "<script>alert('$message')</script>";
      echo "<script>window.location.replace('../');</script>";
  }
  

?>
