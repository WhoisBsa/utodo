<?php

  function trataDados($login, $senha) {
    if (!$login || !$senha) {
      $message = 'Preencha todos os dados!';
      echo "<script>alert('$message')</script>";
      echo "<script>window.location.replace('../');</script>";
    } else {
       $con = new mysqli('localhost', 'root', '', 'userlogin');

       $result = $con->query("SELECT name, pass FROM login WHERE name = '$login' AND pass = '$senha'");

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