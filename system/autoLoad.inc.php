<?php

function __autoload($Class) {

    if(file_exists("{$Class}.class.php")):
        require_once ("{$Class}.class.php");
    else:
        die("Erro ao Incluir {$Class}.class.php");
    endif;    
}