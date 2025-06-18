<?php


namespace App\Components\User\Detail;

use Nette\Database\Table\ActiveRow;

interface ControlFactory {
    public function create(ActiveRow $userEntity): Control;
}