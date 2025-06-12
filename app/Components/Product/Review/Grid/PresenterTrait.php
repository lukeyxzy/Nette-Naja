<?php

namespace App\Components\Product\Review\Grid;


trait PresenterTrait {

    private ControlFactory $reviewGridControlFactory;
    public function injectProductGridControlFactory(ControlFactory $reviewGridControlFactory) {
        $this->reviewGridControlFactory = $reviewGridControlFactory;
    }
    
    public function createComponentReviewsGrid(): Control {
        return $this->reviewGridControlFactory->create($this->product_id); 
    }


}