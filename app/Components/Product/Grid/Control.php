<?php

namespace App\Components\Product\Grid;

use Nette\Application\UI\Multiplier;
use Nette\Application\UI\Control as NetteControl;
use App\Model\ProductManager;
use App\Components\Product\Grid\Item\ControlFactory as ItemControlFactory;
use Nette\Database\Table\Selection;

class Control extends NetteControl{

    private Selection $products;
    public function __construct(private ProductManager $productManager, private ItemControlFactory $controlFactory) {
        $this->products = $this->productManager->getAllLimited(5);
    }
  
    public function render():void {
        $this->template->products = $this->products;
        $this->template->render(__DIR__ . "/default.latte");
    }



    public function createComponentItem() {
        $products = $this->products;
        $factory = $this->controlFactory;
 
        return new Multiplier(function (string $id) use ($products, $factory) {
            return $factory->create($products[(int) $id]);
        });
    }
}