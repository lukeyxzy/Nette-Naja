<?php

namespace App\Components\Product\Review\Grid;

use Nette\Application\UI\Multiplier;
use Nette\Application\UI\Control as NetteControl;
use App\Model\ReviewManager;
use App\Components\Product\Review\Grid\Item\ControlFactory as ItemControlFactory;
use Nette\Database\Table\Selection;

class Control extends NetteControl{

    private Selection $reviews;
    public function __construct(private ReviewManager $reviewManager, private ItemControlFactory $controlFactory, int $product_id) {
        $this->reviews = $this->reviewManager->getByColumnName("product_id", $product_id);
    }
  
    public function render():void {
        $this->template->reviews = $this->reviews;
        $this->template->render(__DIR__ . "/default.latte");
    }



    public function createComponentItem(): Multiplier {
        $reviews = $this->reviews;
        $factory = $this->controlFactory;
 
        return new Multiplier(function (string $id) use ($reviews, $factory) {
            return $factory->create($reviews[(int) $id]);
        });
    }


}