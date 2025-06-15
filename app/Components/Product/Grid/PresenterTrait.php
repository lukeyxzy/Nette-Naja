<?php

namespace App\Components\Product\Grid;


trait PresenterTrait {

    private ControlFactory $productGridControlFactory;
    public function injectProductGridControlFactory(ControlFactory $productGridControlFactory) {
        $this->productGridControlFactory = $productGridControlFactory;
    }
    
    protected function getUserId(): int {
        return 0;
    }

    protected function getCategoryId(): int {
        return 0;
    }

    public function createComponentPostGrid(): Control {
        return $this->productGridControlFactory->create($this->getCategoryId(), $this->getUserId());
    }


}