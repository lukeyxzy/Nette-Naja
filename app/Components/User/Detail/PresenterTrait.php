<?php


namespace App\Components\User\Detail;

trait PresenterTrait{
    
    private ControlFactory $controlFactory;
    public function injectControlFactory(ControlFactory $controlFactory): void { 
        $this->controlFactory = $controlFactory;
     }
     

    public function createComponentUserDetail(): Control {
        $user_id = $this->getParameter("user_id");
        return $this->controlFactory->create((int) $user_id);
    }

}