<?php

namespace App\Components\User\Review\Add;

class ControlFactory {

    public function __construct(private FormFactory $formFactory) {}

    public function create(callable $callback, int $loggedInUser_id, int $user_id): Control {
        return new Control($callback, $this->formFactory, $loggedInUser_id, $user_id);
    }
}