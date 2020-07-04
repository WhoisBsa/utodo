<?php
  include('conf.php');
  require_once("todoDAO.php");

  function trataDados($login, $senha) {
    if (!$login || !$senha) {
      throw new Exception("Preencha todos os dados!", 1);
    } else {
      $bd = new BD();    
      $result = $bd->login($login, $senha);

      if ($result) {  // Verifica se o usuário existe
        session_start();
        $_SESSION['id'] = $result[0]['id'];
        $_SESSION['login'] = $result[0]['name'];
        $_SESSION['senha'] = $result[0]['pass'];
        header('location: main.php');
      } else {
        $message = 'Login ou senha incorretos!';
        echo "<script>alert('$message')</script>";
        echo "<script>window.location.replace('../');</script>";
      }
    }
  }

  try {
    trataDados($_POST['login'], $_POST['senha']);
  } catch (Exception $e) {
    echo "<script>alert('". $e->getMessage() . "')</script>";
    echo "<script>window.location.replace('../');</script>";
  }
?>
