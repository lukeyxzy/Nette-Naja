<?php


namespace App\Components\Category\Detail;

use App\Model\ProductManager;
use App\Model\CategoryManager;


class ControlFactory {

    public function __construct(public ProductManager $productManager, private CategoryManager $categoryManager) {}

    public function create(int $product_id): Control {
        return new Control($this->productManager, $this->categoryManager, $product_id);
    }
}