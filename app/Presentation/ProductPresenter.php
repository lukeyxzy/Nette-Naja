<?php

declare(strict_types=1);

namespace App\Presentation;

use Nette\Application\UI\Presenter;
use App\Components\Product\Detail\PresenterTrait;

final class ProductPresenter extends Presenter
{
    public function renderDefault(int $product_id) {}
    
    use PresenterTrait;

}
