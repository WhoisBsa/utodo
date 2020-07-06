<?php
    require_once("todoDAO.php");

    $bd = new BD();    

    if (isset($_POST["feito"])){
        $bd->marcarToDoFeito($_POST["feito"]);
    } else if (isset($_POST["editar"])){
        echo 'editado';
    } else if (isset($_POST["excluir"])) {
        $bd->excluirToDo($_POST["excluir"]);
    }

    header('location: main.php');

?>
