<?php

namespace App\Components\Product\Manipulate;

trait PresenterTrait{
    
    private ControlFactory $manipulateControlFactory;
    private array $product = ["id" => 0];
    public function injectManipulateControlFactory(ControlFactory $controlFactory): void { 
        $this->manipulateControlFactory = $controlFactory;
     }


    public function createComponentManipulateProduct(): Control {
        $this->user_id = $this->user->getIdentity()->getId();
        return $this->manipulateControlFactory->create([$this, "onSuccessManipulate"], $this->product, $this->user_id);
    }

    public function onSuccessManipulate() {
        $this->flashMessage("Úspěšně odesláno");
        $this->redirect("Home:default");
    }

}