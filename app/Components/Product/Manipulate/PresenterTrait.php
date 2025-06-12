<?php

namespace App\Components\Product\Manipulate;

trait PresenterTrait{
    
    private ControlFactory $manipulateControlFactory;
    private array $product = ["id" => 0];
    public function injectManipulateControlFactory(ControlFactory $controlFactory): void { 
        $this->manipulateControlFactory = $controlFactory;
     }


    public function createComponentManipulateProduct(): Control {
        return $this->manipulateControlFactory->create([$this, "onSuccessManipulate"], $this->product);
    }

    public function onSuccessManipulate() {
        $this->flashMessage("Úspěšně odesláno");
        $this->redirect("Home:default");
    }

}