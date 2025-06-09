<?php

namespace App\Components\User\Sign\In;


class ControlFactory {

    public function __construct(public FormFactory $formFactory) {}


    public function create(callable $callback): Control {
        return new Control($this->formFactory, $callback);
    }

}
