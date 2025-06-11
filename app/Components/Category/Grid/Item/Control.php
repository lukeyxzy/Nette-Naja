<?php

namespace App\Components\Category\Grid\Item;

use Nette\Application\UI\Control as NetteControl;
use Nette\Database\Table\ActiveRow;


class Control extends NetteControl{

    public function __construct(private ActiveRow $item) {}
  
    public function render():void {
        $this->template->category = $this->item;
        $this->template->render(__DIR__ . "/default.latte");
    }



}