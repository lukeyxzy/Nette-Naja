<?php

namespace App\Components\User\Sign\In;




trait PresenterTrait {

    private $controlFactory;
    public function injectControlFactory(ControlFactory $controlFactory) {
    $this->controlFactory = $controlFactory;
    }



    public function createComponentSignInForm(): Control {
        return $this->controlFactory->create([$this, "onSuccessSignIn"]);
    }

    public function onSuccessSignIn(): void {
        $this->flashMessage("Přihlášení bylo úspěšné.");
        $this->redirect("Home:default");
    }


}
