<?php


namespace Product\Interfaces;

use Product\Models\ProductModel;

interface IProduct
{
    public function create(ProductModel $product): bool;
}
