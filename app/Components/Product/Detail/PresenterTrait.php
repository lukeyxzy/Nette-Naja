<?php


namespace App\Components\Product\Detail;

trait PresenterTrait{
    
    private ControlFactory $controlFactory;
    public function injectControlFactory(ControlFactory $controlFactory): void { 
        $this->controlFactory = $controlFactory;
     }


    public function createComponentProductDetail(): Control {
        $product_id = $this->getParameter("product_id");
        return $this->controlFactory->create((int) $product_id);
    }

}