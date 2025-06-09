<?php

namespace App\Components\User\Sign\In;

use Nette\Application\UI\Form;
use Nette\Security\AuthenticationException;
use Nette\Security\User;
use StdClass;


class FormFactory {

    public function __construct(private User $user) {

    }


    public function create(): Form {
        $form = new Form();
        $form->addEmail("email", "Váš email: ")->setRequired("Povinné pole.");
        $form->addPassword("password", "Vaše heslo: ")->setRequired("Povinné pole.");
        $form->addSubmit("send", "Odeslat");
        $form->onSuccess[] = [$this, "onSuccessSignIn"];
        return $form;
    }

    public function onSuccessSignIn(Form $form, StdClass $values): void {
        try {
            $this->user->login($values->email, $values->password);
        }
        catch(AuthenticationException $e) {
            $form->addError("Špatné přihlašovací údaje");
        }
    }



}
