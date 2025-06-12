<?php

namespace App\Components\Category\Grid;

use App\Model\CategoryManager;
use App\Components\Category\Grid\Item\ControlFactory as ItemControlFactory;

class ControlFactory {

    public function __construct(public CategoryManager $categoryManager, public ItemControlFactory $itemControlFactory) {}

    public function create(): Control {
        return new Control($this->categoryManager, $this->itemControlFactory);
    }
}