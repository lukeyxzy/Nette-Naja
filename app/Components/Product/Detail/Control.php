<?php

namespace App\Components\Product\Detail;

use App\Model\ProductManager;
use App\Model\CategoryManager;
use App\Model\Entity\Resource;
use Nette\Application\UI\Control as NetteControl;
use Nette\Database\Table\ActiveRow;


class Control extends NetteControl {

    private ActiveRow $product;
    public function __construct(private ProductManager $productManager, private CategoryManager $categoryManager,private Resource $productResource, private int $product_id) {}



    public function render() {
        $this->product = $this->productManager->getById($this->product_id);

        $this->template->productResource =  $this->productResource;
        $this->template->product = $this->product;
        $this->template->category = $this->categoryManager->getById($this->product->category_id);
        $this->template->render(__DIR__ . "/default.latte");
    }



}