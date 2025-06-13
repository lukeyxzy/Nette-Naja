<?php

namespace App\Components\Product\Detail;

use App\Model\ProductManager;
use App\Model\CategoryManager;
use App\Model\Entity\Resource;

class ControlFactory {

    public function __construct(public ProductManager $productManager, private CategoryManager $categoryManager) {}

    public function create(Resource $productResource, int $product_id): Control {
        return new Control($this->productManager, $this->categoryManager, $productResource, $product_id);
    }
}