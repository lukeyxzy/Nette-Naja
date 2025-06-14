<?php
namespace App\Components\User\Review\Grid;


trait PresenterTrait {

    private ControlFactory $reviewGridControlFactory;
    public function injectReviewGridControlFactory(ControlFactory $reviewGridControlFactory) {
        $this->reviewGridControlFactory = $reviewGridControlFactory;
    }
    
    public function createComponentReviewsGrid(): Control {
        return $this->reviewGridControlFactory->create($this->user_id, [$this, "reviewDeleteCallBack"]); 
    }




    public function reviewDeleteCallBack() {
        $this->flashMessage("Recenze byla odstraněna.","success");
        $this->redirect("this");
    }   


}