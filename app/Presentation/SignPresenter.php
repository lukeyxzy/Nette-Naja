<?php

declare(strict_types=1);

namespace App\Presentation;

use Nette\Application\UI\Presenter;
use Nette\Application\UI\Form;
use Nette\Security\AuthenticationException;
use Nette\Security\User;
use StdClass;

final class SignPresenter extends Presenter
{
    
    public function __construct(private User $user) {}


    public function renderDefault() {
     
    }
    public function actionOut() {
        $this->getUser()->logOut(true);
        $this->flashMessage("Byli jste odhlášeni.");
        $this->redirect("Home:default");
    }




    public function createComponentSignIn(): Form {
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
            $this->flashMessage("Byli jste přihlášeni");
            $this->redirect("Home:default");
        }
        catch(AuthenticationException $e) {
            $form->addError("Špatné přihlašovací údaje");
        }
    }


}
