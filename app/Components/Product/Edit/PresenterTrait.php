<?php

namespace App\Components\Product\Edit;

trait PresenterTrait{
    
    private ControlFactory $editControlFactory;
    public function injectEditControlFactory(ControlFactory $editControlFactory): void { 
        $this->editControlFactory = $editControlFactory;
     }


    public function createComponentManipulateProduct(): Control {
        $product_id = $this->getParameter("product_id");
        return $this->editControlFactory->create([$this, "onSuccessManipulate"], (int) $product_id);
    }

    public function onSuccessManipulate() {
        $this->flashMessage("Úspěšně odesláno");
        $this->redirect("Home:default");
    }

}