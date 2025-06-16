<?php


namespace App\AdminModule\Presentation;


use App\Presentation\UserPresenter as FrontUserPresenter;

class UserPresenter extends FrontUserPresenter {

    use SecurePresenterTrait;


}