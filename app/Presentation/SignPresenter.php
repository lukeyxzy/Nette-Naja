<?php

declare(strict_types=1);

namespace App\Presentation;

use App\Components\User\Sign\In\PresenterTrait as SignInTrait;

class SignPresenter extends Presenter
{
    use SignInTrait;    

    public function actionOut() {
        $this->getUser()->logOut(true);
        $this->flashMessage("Byli jste odhlášeni.");
        $this->redirect(":front:Home:default");
    }



}
