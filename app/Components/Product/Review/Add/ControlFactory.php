<?php

namespace App\Components\Product\Review\Add;

class ControlFactory {

    public function __construct(private FormFactory $formFactory) {}

    public function create(callable $callback, int $product_id, int $user_id): Control {
        return new Control($callback, $this->formFactory, $product_id, $user_id);
    }
}