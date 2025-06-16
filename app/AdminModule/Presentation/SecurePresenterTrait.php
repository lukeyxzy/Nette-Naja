<?php

namespace App\AdminModule\Presentation;


trait SecurePresenterTrait{

    public function startup() {

    if(!$this->isLinkCurrent("Sign:in") && !$this->user->isAllowed("adminSide", "view")) {
        $this->flashMessage("Prosím přihlašte se.", "error");
        $this->redirect("Sign:in");
    }
    parent::startup();
    }


}