<?php

namespace App\Components\Product\Grid;


trait PresenterTrait {

    private ControlFactory $productGridControlFactory;
    public function injectProductGridControlFactory(ControlFactory $productGridControlFactory) {
        $this->productGridControlFactory = $productGridControlFactory;
    }
    
    public function createComponentPostGrid(): Control {
        $category_id = $this->getParameter("category_id");
        $user_id = $this->getParameter("user_id");
        return $this->productGridControlFactory->create($category_id === null ? 0 : (int) $category_id, $user_id === null ? 0 : (int) $user_id);
    }


}