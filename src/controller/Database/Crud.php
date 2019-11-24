<?php

namespace UiferCalhas\SrcClasses\controller\Database;

use UiferCalhas\SrcClasses\controller\Database\DatabaseConnection as Conn;
use UiferCalhas\SrcClasses\classes\Utils\ValidaQuery as Valida;

class Crud
{

    private $function;
    private $table;
    private $fields;
    private $data;
    private $params;

    public function __construct($function, $table, $fields, $data, $params)
    {
        $this->$function = $function;
        $this->$table = $table;
        $this->$fields = $fields;
        $this->$data = $data;
        $this->$params = $params;
    }

}