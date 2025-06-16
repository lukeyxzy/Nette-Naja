<?php

namespace App\AdminModule\Presentation;


trait SecurePresenterTrait{

    public function startup() {

    if(!$this->user->isAllowed("adminSide", "view")) {
        $this->flashMessage("Prosím přihlašte se.", "error");
        $this->redirect(":front:sign:in");
    }
    parent::startup();
    }


}