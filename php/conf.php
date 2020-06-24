<?php
    function get_config_vars(){
        $file = file_get_contents('conf.json');
        $dados = json_decode($file);
    
        return $dados;
    }    
?>