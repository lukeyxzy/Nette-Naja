<?php

declare(strict_types=1);

namespace App\Presentation;

use Nette\Application\UI\Presenter;
use App\Components\User\Sign\In\PresenterTrait;

final class SignPresenter extends Presenter
{
    

    public function actionOut() {
        $this->getUser()->logOut(true);
        $this->flashMessage("Byli jste odhlášeni.");
        $this->redirect("Home:default");
    }

    use PresenterTrait;

}
