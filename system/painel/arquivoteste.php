<?php

require_once '../Init.php';

if (isset($_POST)) {
    foreach ($_POST as $key => $value) {
        $cat = $key;
    }

    $conn = new CrudSystem("SELECT", "products_line", "", "name", "category = '" . $cat . "'");
    $result = $conn->Result;
    $resCount = 0;
    if ($result != null) {
        foreach ($result as $key => $value) {
            foreach ($value as $key => $val) {
                if ($resCount === 0) {
                    $resCount++;
                    echo $val;
                } else {
                    $resCount++;
                    echo "|" . $val;
                }
            }
        }
    }else{
        echo 'Não existe nada nessa categoria';
    }
}

