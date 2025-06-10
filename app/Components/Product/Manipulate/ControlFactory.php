<?php

namespace App\Components\Product\Manipulate;

use App\Model\ProductManager;
use App\Model\CategoryManager;


class ControlFactory {

    public function __construct(private FormFactory $formFactory, private ProductManager $productManager, private CategoryManager $categoryManager) {}

    public function create(callable $callback, array $product): Control {
        return new Control($callback, $this->formFactory, $this->productManager, $this->categoryManager, $product);
    }
}