<?php

namespace App\Components\User\Sign\In;


interface ControlFactory {
    public function create(callable $callback): Control; 
}
