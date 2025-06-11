<?php

declare(strict_types=1);

namespace App\Presentation;
use Nette\Application\UI\Presenter;
use App\Components\Category\Grid\PresenterTrait as CategoryTrait;

class BasePresenter extends Presenter{

   use CategoryTrait;
    
}

