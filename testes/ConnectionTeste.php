<?php

declare(strict_types=1);

require_once '../vendor/autoload.php';

use UiferCalhas\SrcClasses\ConfigDeclarations as Conf;
use UiferCalhas\SrcClasses\controller\Database\DatabaseConnection as Conn;
use UiferCalhas\SrcClasses\controller\Database\Crud;

use UiferCalhas\SrcClasses\classes\Exceptions\ConnectionException;
use UiferCalhas\SrcClasses\classes\Exceptions\CrudException;

use UiferCalhas\SrcClasses\model\Products\Products;

$fields = ['cat_name', 'cat_refcode'];

//var_dump($field);

$data = [
    'cat_name' => 'Regadores',
    'cat_segmento' => 'Artesanato',
    'cat_desc' => 'Regadores',
    'cat_refcode' => '10'
];

$product = new Products();
var_dump($product);

try {

    $exec = Crud::Update("categorias", $data, "cat_id = 7");

    var_dump($exec);

} catch (ConnectionException $e) {

    echo $e->getMessage();

} catch (Exception $e) {

    echo $e->getMessage();

} catch (Error $e) { 

    echo $e->getMessage();

}
