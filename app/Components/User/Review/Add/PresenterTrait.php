<?php

namespace App\Components\User\Review\Add;


trait PresenterTrait{
    
    private ControlFactory $reviewAddControlFactory;
    public function injectAddReviewControlFactory(ControlFactory $reviewAddControlFactory): void { 
        $this->reviewAddControlFactory = $reviewAddControlFactory;
     }


    public function createComponentAddReview(): Control {
        return $this->reviewAddControlFactory->create([$this, "onSuccessAddReview"],  $this->user, $this->user_post_id);
    }

    public function onSuccessAddReview() {
        $this->flashMessage("Úspěšně odesláno");
        $this->redirect("this");
    }

}