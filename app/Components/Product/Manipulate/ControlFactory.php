<?php

namespace App\Components\Product\Manipulate;



interface ControlFactory {
    public function create(callable $callback, array $product, int $user_id): Control;
}