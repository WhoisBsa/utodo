<?php

  include('conf.php');

  function trataDados($login, $senha) {
    if (!$login || !$senha) {
      throw new Exception("Preencha todos os dados!", 1);
    } else {
      //  $con = new mysqli('localhost', 'root', '', 'userlogin');
      $con = new mysqli(
        get_config_vars()->{'ip'}, 
        get_config_vars()->{'user'}, 
        get_config_vars()->{'password'}, 
        get_config_vars()->{'db'}
      );

      $result = $con->query("SELECT name, pass FROM usuario WHERE name = '$login'");

      if (mysqli_num_rows($result)) {  // Verifica se o usuário existe
        $message = 'Nome de usuário existente!';
        echo "<script>alert('$message')</script>";
        echo "<script>window.location.replace('../layout/cadastro.html');</script>";
      } else {
          $stmt = $con->prepare("INSERT INTO usuario(name, pass) VALUES(?, ?)");
          $stmt->bind_param("ss", $login, $senha);
          $stmt->execute();
          header('location: main.php');
      }
    }
  }

  try {
    session_start();

    $_SESSION['login'] = $_POST['login'];
    $_SESSION['senha'] = $_POST['senha'];

    trataDados($_SESSION['login'], $_SESSION['senha']);
  } catch (Exception $e) {
      echo "<script>alert('". $e->getMessage() . "')</script>";
      echo "<script>window.location.replace('../layout/cadastro.html');</script>";
  }
?>
