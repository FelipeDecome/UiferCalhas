<?php

namespace UiferCalhas\SrcClasses\controller\Database;

use UiferCalhas\SrcClasses\classes\Exceptions\ConnectionException;

class DatabaseConnection extends \mysqli
{

    public function __construct($host, $user, $pass, $database)
    {   
        /*
        Cria a Conexão.
         */
        @parent::__construct($host, $user, $pass, $database);

        /*
        Verifica se houve algum erro com a conexão, caso haja, lança uma nova Exceção.
         */
        if (mysqli_connect_error()) {
            throw new ConnectionException("Ocorreu algum problema ao estabelecer a conexão com o banco de dados. " . mysqli_connect_error(), 10);
        }
    }

    

}