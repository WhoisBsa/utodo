<?php
    require_once("todoDAO.php");

    $bd = new BD();    

    if (isset($_POST["feito"])){
        $bd->marcarToDoFeito($_POST["feito"]);
        header('location: main.php');
    } else if (isset($_POST["excluir"])) {
        $bd->excluirToDo($_POST["excluir"]);
        header('location: main.php');
    } else if (isset($_POST["download"])) {
        $dados = $bd->buscarToDos($_POST["download"]);
        geraRelatorio($_POST["download"], $dados);
    }

    function geraRelatorio($id_usuario, $requisicao){
        if(geraDiretorio()){
            $file_name = "../relatorios/" . $id_usuario . ".txt";
            $file = fopen($file_name, "w");
            
            foreach($requisicao as $row){
                if($row['status'] == 1){
                    $conteudo = "ID: ". $row['id'] ." -- Conteudo: " . $row['content'] . " -- Status: CONCLUÍDO\r\n";
                } else {
                    $conteudo = "ID: ". $row['id'] ." -- Conteudo: " . $row['content'] . " -- Status: ABERTO\r\n";
                }
                fwrite($file, $conteudo);
            }
            fclose($file);
        } else {
            echo 'falha';
        }
        download($file_name);
    }

    function geraDiretorio(){
        $dir_name = "../relatorios";

        if(!is_dir($dir_name)){
            mkdir($dir_name);
            return true;
        } else {
            return true;
        }
        return false;
    }

    function download($arquivoNome){
        $tipo = "txt";
        header("Content-Disposition: attachment; filename={$arquivoNome}");
        header("Content-Type: application/{$tipo}");
        // Envia o arquivo para o cliente
        readfile($arquivoNome);
    }

?>
