<?php


namespace App\Components\Category\Detail;

trait PresenterTrait{
    
    private ControlFactory $controlFactory;
    public function injectCategoryDetailControlFactory(ControlFactory $controlFactory): void { 
        $this->controlFactory = $controlFactory;
     }


    public function createComponentCategoryDetail(): Control {
        $category_id = $this->getParameter("category_id");
        return $this->controlFactory->create((int) $category_id);
    }



}