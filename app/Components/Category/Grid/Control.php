<?php

namespace App\Components\Category\Grid;

use Nette\Application\UI\Multiplier;
use Nette\Application\UI\Control as NetteControl;
use App\Model\CategoryManager;
use App\Components\Category\Grid\Item\ControlFactory as ItemControlFactory;
use Nette\Database\Table\Selection;

class Control extends NetteControl{

    private Selection $categories;
    private int $category_id;
    public function __construct(private CategoryManager $categoryManager, private ItemControlFactory $controlFactory, $category_id) {
        $this->categories = $this->categoryManager->getAll();
        $this->category_id = $category_id;
    }
  
    public function render():void {
        $this->template->categories = $this->categories;
        $this->template->render(__DIR__ . "/default.latte");
    }



    public function createComponentItem() {
        $categories = $this->categories;
        $factory = $this->controlFactory;
 
        return new Multiplier(function (string $id) use ($categories, $factory) {
            return $factory->create($categories[(int) $id]);
        });
    }
}