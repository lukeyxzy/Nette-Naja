<?php

namespace App\Components\Product\Grid;

use Nette\Application\UI\Control as NetteControl;
use App\Model\ProductManager;

class Control extends NetteControl{

    public function __construct(private ProductManager $productManager) {}
  
    public function render():void {
        $this->template->products = $this->productManager->getAllLimited(5);
        $this->template->render(__DIR__ . "/default.latte");
    }



}