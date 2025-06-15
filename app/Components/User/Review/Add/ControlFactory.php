<?php

namespace App\Components\User\Review\Add;

use Nette\Security\User;

class ControlFactory {

    public function __construct(private FormFactory $formFactory) {}

    public function create(callable $callback, User $user, int $user_post_id): Control {
        return new Control($callback, $this->formFactory, $user, $user_post_id);
    }
}