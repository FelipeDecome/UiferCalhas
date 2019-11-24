<?php

declare(strict_types=1);

namespace UiferCalhas\SrcClasses\controller\Database;

use UiferCalhas\SrcClasses\ConfigDeclarations as Conf;
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

    public static function Insert(string $table, array $data)//: boolean
    {
        $conn = new Conn(Conf::DB_HOST, Conf::DB_USER, Conf::DB_PASS, Conf::DB_NAME);

        $preparedData = Valida::prepareData($data, 1, $conn);
        $query = "INSERT INTO {$table}{$preparedData}";

        if ($conn->query($query)) {
            
            echo "tudo OK";

        } else {

            echo "Deu merda meu patrão";
            echo $conn->error;
        }
    }
}
