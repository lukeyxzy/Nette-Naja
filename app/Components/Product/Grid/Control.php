<?php

namespace App\Components\Product\Grid;

use Nette\Application\UI\Multiplier;
use Nette\Application\UI\Control as NetteControl;
use App\Model\ProductManager;
use App\Components\Product\Grid\Item\ControlFactory as ItemControlFactory;
use Nette\Database\Table\Selection;

class Control extends NetteControl{

    private Selection $products;
    public function __construct(private ProductManager $productManager, private ItemControlFactory $controlFactory, int $category_id, int $user_id) {

        $this->products = $this->getProducts($category_id, $user_id);
    }
  
    private function getProducts(int $category_id, int $user_id): Selection {
                if($category_id > 0) {
                    return $this->productManager->getbyColumnName("category_id", $category_id);
                }
                if ($user_id > 0) {
                    return $this->productManager->getbyColumnName("user_id", $user_id);
                }
                else {
                    return $this->productManager->getAllLimited(5)->order("created_at DESC");
                }

    }

    public function render():void {
        $this->template->products = $this->products;
        $this->template->render(__DIR__ . "/default.latte");
    }



    public function createComponentItem(): Multiplier {
        $products = $this->products;
        $factory = $this->controlFactory;
 
        return new Multiplier(function (string $id) use ($products, $factory) {
            return $factory->create($products[(int) $id]);
        });
    }
}