<?php

namespace UiferCalhas\Database;

use UiferCalhas\Exceptions\ConnectionException;

class DatabaseConnection extends mysqli
{

    public function __construct($host, $user, $pass, $database)
    {
        parent::__construct($host, $user, $pass, $database);

        //if ($this->mysqli_error()) {
        //    throw new ConnectionException("Error Processing Request", 10);            
        //}
    }

}