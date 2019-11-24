<?php

declare(strict_types=1);

namespace UiferCalhas\SrcClasses\classes\Utils;

use UiferCalhas\SrcClasses\controller\Database\DatabaseConnection;

class ValidaQuery
{

    public static function prepareData(array $data, int $prepareType, DatabaseConnection $conn)//: string
    {
        if ($prepareType === 1) {

            foreach ($data as $field => $value) {

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
            var_dump($values);

            /*
            Retorna a String pronta.
             */
            return $prepareData;            

        } elseif ($prepareType === 2){

            foreach ($data as $key => $value) {

                if (isset($preparedData)) {

                    $preparedData = $preparedData . ", {$key} = '{$value}'";

                } else {

                    $preparedData = "{$key} = '{$value}'";

                }

            }

            /*
            Retorna a String pronta.
             */
            return $preparedData;

        }
    }

}
