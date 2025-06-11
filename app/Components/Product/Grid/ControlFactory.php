<?php

namespace App\Components\Product\Grid;
use App\Model\ProductManager;
use App\Components\Product\Grid\Item\ControlFactory as ItemControlFactory;

class ControlFactory {

    public function __construct(public ProductManager $productManager, public ItemControlFactory $itemControlFactory) {}

    public function create(int $category_id): Control {
        return new Control($this->productManager, $this->itemControlFactory, $category_id);
    }
}