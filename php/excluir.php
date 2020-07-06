<?php
    require_once("todoDAO.php");

    $bd = new BD();    
    $id_todo = $_POST['excluir'];
    $bd->excluirToDo($id_todo);

    header('location: main.php');

?>
