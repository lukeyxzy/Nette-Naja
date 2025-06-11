<?php

namespace App\Components\Category\Grid;

use App\Model\CategoryManager;
use App\Components\Category\Grid\Item\ControlFactory as ItemControlFactory;

class ControlFactory {

    public function __construct(public CategoryManager $categoryManager, public ItemControlFactory $itemControlFactory) {}

    public function create(int $category_id): Control {
        return new Control($this->categoryManager, $this->itemControlFactory, $category_id);
    }
}