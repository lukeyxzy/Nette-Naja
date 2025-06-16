<?php

declare(strict_types=1);

namespace App\FrontModule\Presentation;


use App\Components\Category\Grid\PresenterTrait as CategoryTrait;
use App\Presentation\Presenter;

abstract class BasePresenter extends Presenter{

   use CategoryTrait;

    use SecurePresenterTrait;
    
}

