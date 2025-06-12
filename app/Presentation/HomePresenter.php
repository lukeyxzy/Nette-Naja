<?php

declare(strict_types=1);

namespace App\Presentation;

use App\Components\Product\Grid\PresenterTrait as ProductGridPresenterTrait;


final class HomePresenter extends BasePresenter
{
    use ProductGridPresenterTrait;
}

