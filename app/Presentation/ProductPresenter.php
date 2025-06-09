<?php

declare(strict_types=1);

namespace App\Presentation;

use Nette\Application\UI\Presenter;
use App\Components\Product\Detail\PresenterTrait AS detailPresenterTrait;
use App\Components\Product\Edit\PresenterTrait AS manipulatePresenterTrait;

final class ProductPresenter extends Presenter
{
    public function renderDefault(int $product_id) {}
    public function renderManipulate(int $product_id) {}

    use detailPresenterTrait;
    use manipulatePresenterTrait;
}
