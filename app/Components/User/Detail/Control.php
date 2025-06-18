<?php

namespace App\Components\User\Detail;

use App\Model\UserManager;
use Nette\Application\UI\Control as NetteControl;
use Nette\Database\Table\ActiveRow;

class Control extends NetteControl {

    public function __construct(private UserManager $userManager, private ActiveRow $userEntity) {    }

    public function render() {
        $this->template->userEntity = $this->userEntity;
        $this->template->render(__DIR__ . "/default.latte");
    }


}