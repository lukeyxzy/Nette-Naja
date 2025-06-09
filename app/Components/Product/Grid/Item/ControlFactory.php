<?php

namespace App\Components\Product\Grid\Item;
use Nette\Database\Table\ActiveRow;

class ControlFactory {

    public function __construct() {}

    public function create(ActiveRow $item): Control {
        return new Control($item);
    }
}