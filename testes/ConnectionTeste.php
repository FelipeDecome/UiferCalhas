<?php

require_once '../vendor/autoload.php';

use UiferCalhas\SrcClasses\controller\Database\DatabaseConnection as Conn;
use UiferCalhas\SrcClasses\ConfigDeclarations as Conf;
use UiferCalhas\SrcClasses\classes\Exceptions\ConnectionException;


try {
    
    //$conn = new Conn(Conf::DB_HOST, Conf::DB_USER, Conf::DB_PASS, Conf::DB_NAME);
    


}catch (ConnectionException $e) { 

    echo $e->getMessage();

}catch (Exception $e) {

    echo $e->getMessage();

}
