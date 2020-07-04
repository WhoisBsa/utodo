<?php

  include('conf.php');
  require_once("todoDAO.php");

  function trataDados($login, $senha) {
    if (!$login || !$senha) {
      throw new Exception("Preencha todos os dados!", 1);
    } else {
      $bd = new BD();

      if ($bd->cadastroUsuario($login, $senha)) {  // Verifica se o usuário existe
        $result = $bd->login($login, $senha);

        session_start();
        $_SESSION['id'] = $result[0]['id'];
        $_SESSION['login'] = $result[0]['name'];
        $_SESSION['senha'] = $result[0]['pass'];
        header('location: main.php');        
      } else {
        $message = 'Nome de usuário existente!';
        echo "<script>alert('$message')</script>";
        echo "<script>window.location.replace('../layout/cadastro.html');</script>";
      }
    }
  }

  try {
    trataDados($_POST['login'], $_POST['senha']);
  } catch (Exception $e) {
      echo "<script>alert('". $e->getMessage() . "')</script>";
      echo "<script>window.location.replace('../layout/cadastro.html');</script>";
  }
?>
