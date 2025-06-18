<?php

namespace App\Components\User\Review\Grid;

use Nette\Security\User;


interface ControlFactory {
    public function create(int $user_post_id, callable $callback, User $loggedInUser): Control;
}