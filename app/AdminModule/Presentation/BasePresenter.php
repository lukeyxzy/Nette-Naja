<?php


namespace App\AdminModule\Presentation;

use App\Presentation\Presenter;


abstract class BasePresenter extends Presenter{

    use SecurePresenterTrait;
}