<?php

namespace App\Components\Product\Manipulate;

trait PresenterTrait{
    
    private ControlFactory $manipulateControlFactory;
    private array $productToArray = ["id" => 0];
    public function injectManipulateControlFactory(ControlFactory $controlFactory): void { 
        $this->manipulateControlFactory = $controlFactory;
     }


    public function createComponentManipulateProduct(): Control {
        $user_id = $this->user->getIdentity()->getId();
        return $this->manipulateControlFactory->create([$this, "onSuccessManipulate"], $this->productToArray, $user_id);
    }

    public function onSuccessManipulate() {
        $this->flashMessage("Úspěšně odesláno");
        $this->redirect("Home:default");
    }

}