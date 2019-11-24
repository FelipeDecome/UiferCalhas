<?php

declare(strict_types=1);

require_once '../vendor/autoload.php';

use UiferCalhas\SrcClasses\ConfigDeclarations as Conf;
use UiferCalhas\SrcClasses\controller\Database\DatabaseConnection as Conn;
use UiferCalhas\SrcClasses\controller\Database\Crud;

use UiferCalhas\SrcClasses\classes\Exceptions\ConnectionException;
use UiferCalhas\SrcClasses\classes\Exceptions\CrudException;

$fields = ['cat_name', 'cat_refcode'];

//var_dump($field);

$data = [
    'cat_name' => 'Teste',
    'cat_segmento' => 'Artesanato',
    'cat_desc' => 'Teste',
    'cat_refcode' => '08'
];

try {

    $exec = Crud::Select("categorias");

    var_dump($exec);
    
    //$conn->query("INSERT INTO categorias {$preparedData}");
    //$conn->query("UPDATE categorias SET {$preparedData} WHERE cat_id = 2");

    //var_dump($preparedData);

} catch (ConnectionException $e) {

    echo $e->getMessage();

} catch (Exception $e) {

    echo $e->getMessage();

} catch (Error $e) { 

    echo $e->getMessage();

}
