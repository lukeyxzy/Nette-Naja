<?php

namespace App\Components\User\Sign\In;

use Nette\Application\UI\Form;
use Nette\Application\UI\Control as NetteControl;

class Control extends NetteControl {

    private $callback;
    public function __construct(private FormFactory $formFactory, callable $callback){
        $this->callback = $callback;
    }

    public function render(): void  {
        $this->template->render(__DIR__ . "/default.latte");
    }

    public function createComponentSignInForm(): Form {
        $form = $this->formFactory->create();
        $form->onSuccess[] = $this->callback;
        return $form;
    }

}
