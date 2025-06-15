<?php

namespace App\Components\Product\Detail;

use App\Model\ProductManager;
use App\Model\Entity\Resource;

class ControlFactory {

    public function __construct(public ProductManager $productManager) {}

    public function create(Resource $productResource, int $product_id): Control {
        return new Control($this->productManager, $productResource, $product_id);
    }
}