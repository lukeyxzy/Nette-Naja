<?php


namespace App\Components\User\Detail;

trait PresenterTrait{
    
    private ControlFactory $controlFactory;
    public function injectControlFactory(ControlFactory $controlFactory): void { 
        $this->controlFactory = $controlFactory;
     }
     

    public function createComponentUserDetail(): Control {
        return $this->controlFactory->create((int) $this->user_id);
    }

}