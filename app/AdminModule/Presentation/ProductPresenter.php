<?php


namespace App\AdminModule\Presentation;
use App\Presentation\ProductPresenter as APProductPresenter;

class ProductPresenter extends APProductPresenter {

    use SecurePresenterTrait;


    public function startup() {
        parent::startup();
    }


}