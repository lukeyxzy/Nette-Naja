<?php

declare(strict_types=1);

namespace App\FrontModule\Presentation;


use App\Presentation\SignPresenter as APSignPresenter;

class SignPresenter extends APSignPresenter
{
    use SecurePresenterTrait;

}
