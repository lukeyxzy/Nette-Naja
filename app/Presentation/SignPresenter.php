<?php

declare(strict_types=1);

namespace App\Presentation;

use App\Components\User\Sign\In\PresenterTrait;

final class SignPresenter extends BasePresenter
{
    

    public function actionOut() {
        $this->getUser()->logOut(true);
        $this->flashMessage("Byli jste odhlášeni.");
        $this->redirect("Home:default");
    }

    use PresenterTrait;

}
