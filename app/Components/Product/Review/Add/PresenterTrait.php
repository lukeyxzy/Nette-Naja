<?php

namespace App\Components\Product\Review\Add;

trait PresenterTrait{
    
    private ControlFactory $reviewAddControlFactory;
    private $product_id;
    private $user_id;
    public function injectAddReviewControlFactory(ControlFactory $reviewAddControlFactory): void { 
        $this->reviewAddControlFactory = $reviewAddControlFactory;
     }


    public function createComponentAddReview(): Control {
        return $this->reviewAddControlFactory->create([$this, "onSuccessAddReview"], $this->product_id, $this->user_id);
    }

    public function onSuccessAddReview() {
        $this->flashMessage("Úspěšně odesláno");
        $this->redirect("this");
    }

}