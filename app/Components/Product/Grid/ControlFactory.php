<?php

namespace App\Components\Product\Grid;
use App\Model\ProductManager;

class ControlFactory {

    public function __construct(public ProductManager $productManager) {}

    public function create(): Control {
        return new Control($this->productManager);
    }
}