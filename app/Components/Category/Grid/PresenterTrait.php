<?php

namespace App\Components\Category\Grid;


trait PresenterTrait {

    private $controlFactory;
    public function injectCategoryControlFactory(ControlFactory $categoryControlFactory) {
        $this->controlFactory = $categoryControlFactory;
    }
    
    public function createComponentCategoryGrid(): Control {
        $category_id = $this->getParameter("category_id");
        return $this->controlFactory->create((int) $category_id);
    }


}