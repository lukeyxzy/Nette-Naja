<?php


namespace App\Components\Category\Detail;

use App\Model\ProductManager;
use App\Model\CategoryManager;
use Nette\Application\UI\Control as NetteControl;

class Control extends NetteControl {

    public function __construct(private ProductManager $productManager, private CategoryManager $categoryManager,private int $category_id) {}





    public function render() {
        $this->template->category = $this->categoryManager->getById($this->category_id);
        $this->template->numOfProductsInCat = $this->productManager->getCountByColumnName("category_id", $this->category_id); 
        $this->template->render(__DIR__ . "/default.latte");
    }


    public function createComponentProductGrid() {

    }

}