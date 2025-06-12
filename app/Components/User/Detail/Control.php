<?php

namespace App\Components\User\Detail;

use App\Model\UserManager;
use Nette\Application\UI\Control as NetteControl;
use Nette\Database\Table\ActiveRow;

class Control extends NetteControl {

    private ActiveRow $userEntity;
    public function __construct(private UserManager $userManager, private int $user_id) {
        $this->userEntity = $this->userManager->getById($this->user_id);
    }





    public function render() {
        $this->template->userEntity = $this->userEntity;
        $this->template->render(__DIR__ . "/default.latte");
    }



}