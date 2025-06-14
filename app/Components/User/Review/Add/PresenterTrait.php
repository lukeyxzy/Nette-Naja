<?php

namespace App\Components\User\Review\Add;

trait PresenterTrait{
    
    private ControlFactory $reviewAddControlFactory;
    public function injectAddReviewControlFactory(ControlFactory $reviewAddControlFactory): void { 
        $this->reviewAddControlFactory = $reviewAddControlFactory;
     }


    public function createComponentAddReview(): Control {
        if(!$this->user->isAllowedTo("review", "add")){
            $this->error("Nejste oprávněni přidávat recenze", "error");
        }
        $logged_in_user_id = $this->user->getIdentity()->id;
        return $this->reviewAddControlFactory->create([$this, "onSuccessAddReview"], $logged_in_user_id, $this->user_id);
    }

    public function onSuccessAddReview() {
        $this->flashMessage("Úspěšně odesláno");
        $this->redirect("this");
    }

}