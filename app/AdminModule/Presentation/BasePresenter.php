<?php


namespace App\AdminModule\Presentation;


use Nette\Application\UI\Presenter;

abstract class BasePresenter extends Presenter{

    protected function startup() {
    if(!$this->isLinkCurrent("Sign:in") && !$this->user->getIdentity()->role == 2) {
        $this->flashMessage("Chybí oprávnění k přístupu do Admin sekce..", "error");
        $this->redirect("Sign:in");
    }
    parent::startup();
    }

}