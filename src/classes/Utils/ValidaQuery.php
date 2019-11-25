<?php

declare(strict_types=1);

namespace UiferCalhas\SrcClasses\classes\Utils;

use UiferCalhas\SrcClasses\controller\Database\DatabaseConnection;

class ValidaQuery
{

    public static function prepareData(array $data, int $prepareType, DatabaseConnection $conn): string
    {

        $cleanData = self::clearData($data, $conn);

        if ($prepareType === 1) {

            foreach ($cleanData as $field => $value) {

                if (isset($fields) 
                    && isset($value)) {

                    $fields = $fields . ", " . $field;
                    $values = $values . ", '" . $value . "'";

                } else {

                    $fields = $field;
                    $values = "'" . $value . "'";

                }

            }

            /*
            Junta as 2 Váriaveis para serem usadas no comando SQL.
             */
            $prepareData = "({$fields}) VALUES ({$values})";

            /*
            Retorna a String pronta.
             */
            return $prepareData;            

        } elseif ($prepareType === 2){

            foreach ($data as $field => $value) {

                if (isset($preparedData)) {

                    $preparedData = $preparedData . ", {$field} = '{$value}'";

                } else {

                    $preparedData = "{$field} = '{$value}'";

                }

            }

            /*
            Retorna a String pronta.
             */
            return $preparedData;

        }
        
    }

    public static function prepareParams(string $params = null, DatabaseConnection $conn)//: string
    {

        $preparedParams = ($params != null) ? $conn->real_escape_string(" WHERE {$params}") : null;

        return $preparedParams;

    }

    public static function prepareFields($fields = '*', DatabaseConnection $conn): string
    {

        if(is_array($fields)){

            foreach ($fields as $field) {

                if (isset($preparedFields)) {

                    $preparedFields = $preparedFields . ", " . $field;

                } else {

                    $preparedFields = $field;

                }

            }

            return $preparedFields;

        } else {

            $preparedFields = ($fields != null) ? $conn->real_escape_string($fields) : null;

            return $preparedFields;

        }

    }

    public static function clearData(array $data, DatabaseConnection $conn): array
    {

        foreach ($data as $field => $value) {
            
            $cleanField = strip_tags(trim($conn->real_escape_string($field)));
            $cleanValue = strip_tags(trim($conn->real_escape_string($value)));
            $cleanData[$cleanField] = $cleanValue; 

        }

        return $cleanData;

    }

}
