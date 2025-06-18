<?php

namespace App\Components\Product\Grid;

interface ControlFactory {
    public function create(int $category_id, int $user_id): Control;
}