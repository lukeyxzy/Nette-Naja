<?php

declare(strict_types=1);

namespace App\Presentation;
use App\Components\User\Detail\PresenterTrait as userDetailPresenterTrait;
use App\Components\Product\Grid\PresenterTrait as ProductGridPresenterTrait;

final class UserPresenter extends BasePresenter
{
    use userDetailPresenterTrait;
    use ProductGridPresenterTrait;


    public function renderDefault(int $user_id) {
    }
}

