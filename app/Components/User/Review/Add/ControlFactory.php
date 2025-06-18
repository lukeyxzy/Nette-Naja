<?php

namespace App\Components\User\Review\Add;

use Nette\Security\User;

interface ControlFactory {
    public function create(callable $callback, User $user, int $user_post_id): Control;
}