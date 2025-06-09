<?php

namespace App\Components\Product\Grid;


trait PresenterTrait {

    private $controlFactory;
    public function injectControlFactory(ControlFactory $controlFactory) {
        $this->controlFactory = $controlFactory;
    }
    
    public function createComponentPostGrid(): Control {
        return $this->controlFactory->create();
    }


}