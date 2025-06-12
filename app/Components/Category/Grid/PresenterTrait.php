<?php

namespace App\Components\Category\Grid;


trait PresenterTrait {

    private $controlFactory;
    public function injectCategoryControlFactory(ControlFactory $categoryControlFactory) {
        $this->controlFactory = $categoryControlFactory;
    }
    
    public function createComponentCategoryGrid(): Control {
        return $this->controlFactory->create();
    }


}