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

    public function __construct(int $id, string $name, string $category, string $desc, string $reference, int $qtd_stock, bool $disp)
    {

        $this->id = $id;
        $this->name = $name;
        $this->category = $category;
        $this->desc = $desc;
        $this->reference = $reference;
        $this->qtd_stock = $qtd_stock;
        $this->disp = $disp;

    }

}