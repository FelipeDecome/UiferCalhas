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

        if ($conn->query($query)) {
            
            return true;

        } else {

            throw new CrudException("Houve algum erro com a operação. </br> <b>Operação:</b> Insert. </br> <b>Query:</b> '{$query}'. </br> <b>Erro:</b> {$conn->error}", 21);

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

            throw new CrudException("Houve algum erro com a operação. </br> <b>Operação:</b> Select. </br> <b>Query:</b> '{$query}'. </br> <b>Erro:</b> {$conn->error}", 22);

        }

    }

    public static function Update(string $table, array $data, string $params = null)
    {

        $conn = new Conn(Conf::DB_HOST, Conf::DB_USER, Conf::DB_PASS, Conf::DB_NAME);
        //$conn->set_charset(Conf::DB_CHARSET);

        $preparedData = Valida::prepareData($data, 2, $conn);
        $preparedParams = Valida::prepareParams($params, $conn);
        $query = "UPDATE {$table} SET {$preparedData}{$preparedParams}";

        if ($conn->query($query)) {
            
            return true;

        } else {

            throw new CrudException("Houve algum erro com a operação. </br> <b>Operação:</b> Update. </br> <b>Query:</b> '{$query}'. </br> <b>Erro:</b> {$conn->error}", 23);

        }

    }

    public static function Delete(string $tabel, string $params) 
    {

        $conn = new Conn(Conf::DB_HOST, Conf::DB_USER, Conf::DB_PASS, Conf::DB_NAME);       

        $preparedParams = Valida::prepareParams($params, $conn);

        if($preparedParams != null){
            
            $query = "DELETE FROM {$table}{$preparedParams}";

        } else {

            throw new CrudException("Houve um erro com os dados passados para a operação. </br> <b>Operação:</b> Delete. </br> <b>Erro: Os <b>Parâmetros</b> não foram definidos.</b>", 24);
            
        }

    }

}
