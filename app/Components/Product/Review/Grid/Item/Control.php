<?php

namespace App\Components\Product\Review\Grid\Item;

use Nette\Application\UI\Control as NetteControl;
use Nette\Database\Table\ActiveRow;


class Control extends NetteControl{

    public function __construct(private ActiveRow $item) {}
  
    public function render():void {
        $this->template->review = $this->item;
        $this->template->render(__DIR__ . "/default.latte");
    }

}