<?php

declare(strict_types=1);

namespace App\Presentation;

use App\Components\Category\Detail\PresenterTrait as CategoryDetailTrait;
use App\Components\Product\Grid\PresenterTrait as ProductGridTrait;
final class CategoryPresenter extends BasePresenter
{
    
    public function renderDefault(int $category_id) {

    }

 use CategoryDetailTrait;
 use ProductGridTrait;
}
