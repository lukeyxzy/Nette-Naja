<?php


namespace App\Components\User\Detail;

trait PresenterTrait{
    
    private ControlFactory $controlFactory;
    public function injectControlFactory(ControlFactory $controlFactory): void { 
        $this->controlFactory = $controlFactory;
     }
     

    public function createComponentUserDetail(): Control {
        return $this->controlFactory->create($this->user_post_id);
    }

}