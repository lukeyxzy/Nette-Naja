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
        return $this->controlFactory->create($this->productResource, $this->product);
    }

}