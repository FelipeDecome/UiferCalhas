<?php

//[pt-br]Classe com a conexão. [en-us]Class with the connection info
require 'DbConnection.class.php';

/**
 * @copyright (c) 2017, Felipe Decome
 */
class CrudSystem {

    private $Function;
    private $Table;
    private $Data;
    private $Fields;
    private $Params;
    public $Query;
    public $Result;

    /**
     * <b>[pt-br]Sistema CRUD Orientado á Objeto. [en-us]CRUD System Class</b>
     * 
     * [pt-br]Sistema identifica a função executada de acordo com os dados passados. [en-us]Identify the function will be executed according with the info given. 
     * 
     * @param string $Function - [pt-br]Função á ser realizada pelo SQL. [en-us]Function SQL to be executed.
     * @param string $Table - [pt-br]Tabela onde será realizado a função. [en-us]Name of table where will be executed the function.
     * @param array $Data - [pt-br]Dados á serem guardados nao BANCO DE DADOS, só é usado nas funções 'UPDATE' e 'INSERT'. [en-us] Data to be saved on DATABASE, only used on 'UPDATE' and 'INSERT' functions.
     * @param string $Fields - [pt-br]Campos da tabela referenciados na consulta SQL. [en-us]Table fields referenced in SQL function.
     * @param string $Params - [pt-br]Parametros de consulta SQL. [en-us] SQL function parameters.
     */
    function __construct($Function, $Table, $Data, $Fields = "*", $Params = null) {
        $this->Function = $Function;
        $this->Table = $Table;
        $this->Data = $this->prepareData($Data);
        $this->Fields = $Fields;
        $this->Params = $this->prepareParams($Params);
        $this->Query = $this->prepareQuery();
        $this->Result = $this->prepareResult();
    }

    //[pt-br]Executa a QUERY Gerada.[en-us] Execute generated Query String.
    private function executeQuery() {

        $conn = new DbConnection();
        $link = $conn->connDB();

        $result = mysqli_query($link, $this->Query) or die(mysqli_error($link));

        if ($result) {
            $conn->closeDB($link);
            return $result;
        } else {
            $result = mysqli_error($link);
            $conn->closeDB($link);
            return $result;
        }
    }

    //[pt-br]Prepara o Resultado á ser passado.[en-us] Prepare the Result.
    private function prepareResult() {

        if ($this->Function == "SELECT") {
            if (!mysqli_num_rows($this->executeQuery())) {
                return false;
            } else {
                $result = $this->executeQuery();
                while($res = mysqli_fetch_assoc($result)) {
                    $data[] = $res;
                }
                return $data;
            }
        } else {
            return $this->executeQuery();
        }
    }

    //[pt-br]Prepara os Dados para as Funções requisitadas.[en-us] Prepare the data.
    private function prepareData($Data) {
        $Data = $this->DBEscape($Data);
        if ($this->Function == "INSERT") {

            $key = implode(', ', array_keys($Data));
            $values = "'" . implode("', '", array_values($Data)) . "'";

            $Data = "({$key}) VALUES ({$values})";
            return $Data;
        } else if ($this->Function == "UPDATE") {

            foreach ($Data as $key => $values) {
                $fields[] = "{$key} = '{$values}'";
            }

            $Data = "SET " . implode(', ', $fields);
            return $Data;
        }
    }

    //[pt-br] Protege contra SQL Injection. [en-us] SQL Injection Protection.
    public function DBEscape($Data) {
        $conn = new DbConnection();
        $link = $conn->connDB();

        if (!is_array($Data)) {
            $Data = mysqli_real_escape_string($link, $Data);
        } else {
            $array = $Data;
            foreach ($array as $key => $value) {
                $key = mysqli_real_escape_string($link, $key);
                $value = mysqli_real_escape_string($link, $value);

                $Data[$key] = $value;
            }
        }

        $conn->closeDB($link);
        return $Data;
    }

    //[pt-br]Prepara os Parametros para ser inserido na QUERY.[en-us] Prepare the Parameters
    private function prepareParams($Params) {

        $Params = ($Params) ? " WHERE $Params" : null;
        return $Params;
    }

    //[pt-br]Prepara a QUERY para ser Executada.[en-us] Prepare the Query to be Executed.
    private function prepareQuery() {

        switch ($this->Function) {
            case "INSERT":
                $Query = "{$this->Function} INTO {$this->Table} {$this->Data}";
                return $Query;
            case "SELECT":
                $Query = "{$this->Function} {$this->Fields} FROM {$this->Table}{$this->Params}";
                return $Query;
            case "UPDATE":
                $Query = "{$this->Function} {$this->Table} {$this->Data}{$this->Params}";
                return $Query;
            case "DELETE":
                $Query = "{$this->Function} FROM {$this->Table}{$this->Params}";
                return $Query;
        }
    }

}
