<?php

declare(strict_types=1);

namespace UiferCalhas\SrcClasses\controller\Database;

use UiferCalhas\SrcClasses\ConfigDeclarations as Conf;
use UiferCalhas\SrcClasses\controller\Database\DatabaseConnection as Conn;
use UiferCalhas\SrcClasses\classes\Utils\ValidaQuery as Valida;
use UiferCalhas\SrcClasses\classes\Exceptions\CrudException;

class Crud
{

    public static function Insert(string $table, array $data)
    {
        $conn = new Conn(Conf::DB_HOST, Conf::DB_USER, Conf::DB_PASS, Conf::DB_NAME);
        $conn->set_charset(Conf::DB_CHARSET);

        $preparedData = Valida::prepareData($data, 1, $conn);
        $query = "INSERT INTO {$table}{$preparedData}";

        $execQuery = $conn->query($query);

        if ($execQuery) {

            return $execQuery;

        } else {

            throw new CrudException("Houve algum erro com a operação. <b>Erro:</b> {$conn->error}", 21, 'Insert', $query);

        }
        
    }

    public static function Select(string $table, $fields = '*', string $params = null)
    {
        $conn = new Conn(Conf::DB_HOST, Conf::DB_USER, Conf::DB_PASS, Conf::DB_NAME);
        $conn->set_charset(Conf::DB_CHARSET);

        $preparedFields = Valida::prepareFields($fields, $conn);
        $preparedParams = Valida::prepareParams($params, $conn);
        $query = "SELECT {$preparedFields} FROM {$table}{$preparedParams}";

        $execQuery = $conn->query($query);

        if ($execQuery) {

            return $execQuery->fetch_all();

        } else {

            throw new CrudException("Houve algum erro com a operação. <b>Erro:</b> {$conn->error}", 22, 'Select', $query);

        }

    }

    public static function Update(string $table, array $data, string $params = null)
    {

        $conn = new Conn(Conf::DB_HOST, Conf::DB_USER, Conf::DB_PASS, Conf::DB_NAME);
        $conn->set_charset(Conf::DB_CHARSET);

        $preparedData = Valida::prepareData($data, 2, $conn);
        $preparedParams = Valida::prepareParams($params, $conn);
        $query = "UPDATE {$table} SET {$preparedData}{$preparedParams}";

        $execQuery = $conn->query($query);

        if ($execQuery) {

            return $execQuery;

        } else {

            throw new CrudException("Houve algum erro com a operação. <b>Erro:</b> {$conn->error}", 23, 'Update', $query);

        }

    }

    public static function Delete(string $table, string $params) 
    {

        $conn = new Conn(Conf::DB_HOST, Conf::DB_USER, Conf::DB_PASS, Conf::DB_NAME);
        $conn->set_charset(Conf::DB_CHARSET);

        $preparedParams = Valida::prepareParams($params, $conn);

        if($preparedParams != null){

            $query = "DELETE FROM {$table}{$preparedParams}";
            $execQuery = $conn->query($query);

            if ($execQuery) {

                return $execQuery;

            } else {

                throw new CrudException("Houve algum erro com a operação. <b>Erro:</b> {$conn->error}", 23, 'Delete', $query);

            }

        } else {

            throw new CrudException("Houve um erro com os dados passados para a operação. <b>Erro:</b> Os <b>Parâmetros</b> não foram definidos.", 24, 'Delete');

        }

    }

}
