<?php

namespace Product\Classes;

use Product\Interfaces\IProduct;
use Product\Models\ProductModel;

class Product
{
    private IProduct $interface;

    public function __construct(IProduct $interface)
    {
        $this->interface = $interface;
    }

    public function create(ProductModel $product): bool
    {
        return $this->interface->create($product);
    }
}
