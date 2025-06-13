<?php


namespace App\Components\Product\Detail;


use App\Model\Entity\Resource;

trait PresenterTrait{
    
    private ControlFactory $controlFactory;
    private Resource $productResource;
    public function injectControlFactory(ControlFactory $controlFactory): void { 
        $this->controlFactory = $controlFactory;
     }
     

    public function createComponentProductDetail(): Control {
        $product_id = $this->getParameter("product_id");
        return $this->controlFactory->create($this->productResource, (int) $product_id);
    }

}