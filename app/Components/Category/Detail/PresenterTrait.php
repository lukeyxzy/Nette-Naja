<?php


namespace App\Components\Category\Detail;

trait PresenterTrait{
    
    private ControlFactory $controlFactory;
    public function injectCategoryDetailControlFactory(ControlFactory $controlFactory): void { 
        $this->controlFactory = $controlFactory;
     }


    public function createComponentCategoryDetail(): Control {
        return $this->controlFactory->create($this->category_id);
    }



}