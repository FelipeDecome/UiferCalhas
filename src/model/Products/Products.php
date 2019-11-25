<?php

declare(strict_types=1);

namespace UiferCalhas\SrcClasses\model\Products;

class Products
{

    private $id;
    private $name;
    private $category;
    private $desc;
    private $reference;
    private $qnt_stock;
    private $disp;
    private $image_url;

    public function __construct(int $id = null, string $name = null, string $category = null, string $desc = null, string $reference = null, int $qtd_stock = null, bool $disp = null, string $image_url = null)
    {

        $this->id = $id;
        $this->name = $name;
        $this->category = $category;
        $this->desc = $desc;
        $this->reference = $reference;
        $this->qtd_stock = $qtd_stock;
        $this->disp = $disp;
        $this->image_url = $image_url;

    }

    public function __set($var) {

        $this->$var = ""; 

    }

}