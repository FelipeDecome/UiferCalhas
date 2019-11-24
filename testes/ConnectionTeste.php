<?php

use UiferCalhas\Database\DatabaseConnection as Conn;
use UiferCalhas\SrcClasses\ConfigDeclarations as Conf;

try {
    
    $conn = new Conn(Conf::DB_HOST, Conf::DB_PASS, Conf::DB_PASS, Conf::DB_NAME);

} catch (Exception $e) {
    
}
