<?php

declare(strict_types=1);

namespace App\Presentation;

use App\Components\Category\Detail\PresenterTrait as CategoryDetailTrait;
use App\Components\Product\Grid\PresenterTrait as ProductGridTrait;
final class CategoryPresenter extends BasePresenter
{
    private int $category_id;


    
 use CategoryDetailTrait;
 use ProductGridTrait;

    public function actionDefault(int $category_id) {
        $this->category_id = $category_id;
    }

        protected function getCategoryId(): int {
        return $this->category_id;
    }


}
