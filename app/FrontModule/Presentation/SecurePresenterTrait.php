<?php

namespace App\FrontModule\Presentation;


trait SecurePresenterTrait{

    public function startup() {

    if(!$this->isLinkCurrent("Sign:in") && !$this->user->isAllowed("frontSide", "view")) {
        $this->flashMessage("Prosím přihlašte se.", "error");
        $this->redirect("Sign:in");
    }
    parent::startup();
    }


}