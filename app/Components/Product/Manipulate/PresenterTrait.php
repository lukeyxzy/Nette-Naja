<?php

namespace App\Components\Product\Manipulate;

trait PresenterTrait{
    
    private ControlFactory $manipulateControlFactory;
    private array $product = ["id" => 0];
    public function injectManipulateControlFactory(ControlFactory $controlFactory): void { 
        $this->manipulateControlFactory = $controlFactory;
     }


    public function createComponentManipulateProduct(): Control {
        if(!$this->getUser()->isLoggedIn() && $this->getUser()->getIdentity()->role != 2) {
            $this->flashMessage("Pro tuto akci se přihlašte", "error");
            $this->redirect("Sign:in");
        }
        return $this->manipulateControlFactory->create([$this, "onSuccessManipulate"], $this->product);
    }

    public function onSuccessManipulate() {
        $this->flashMessage("Úspěšně odesláno");
        $this->redirect("Home:default");
    }

}