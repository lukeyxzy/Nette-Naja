<?php

namespace App\Components\User\Review\Add;

use App\Model\Entity\Resource;
use App\Model\UserManager;



trait PresenterTrait{
    
    private ControlFactory $reviewAddControlFactory;
    private UserManager $userManager;
    private Resource $userResource;
    public function injectAddReviewControlFactory(ControlFactory $reviewAddControlFactory, UserManager $userManager): void { 
        $this->reviewAddControlFactory = $reviewAddControlFactory;
        $this->userManager = $userManager;
     }


    public function createComponentAddReview(): Control {


        return $this->reviewAddControlFactory->create([$this, "onSuccessAddReview"],  $this->user, $this->user_post_id);
    }

    public function onSuccessAddReview() {
        $this->flashMessage("Úspěšně odesláno");
        $this->redirect("this");
    }

}