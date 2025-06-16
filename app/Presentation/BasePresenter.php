<?php

declare(strict_types=1);

namespace App\Presentation;

use App\Components\Category\Grid\PresenterTrait as CategoryTrait;

abstract class BasePresenter extends Presenter{

   use CategoryTrait;

    protected function startup() {

    if(!$this->isLinkCurrent("Sign:in") && !$this->user->isAllowed("frontSide", "view")) {
        $this->flashMessage("Prosím přihlašte se.", "error");
        $this->redirect("Sign:in");
    }
    parent::startup();
    }

    
}

