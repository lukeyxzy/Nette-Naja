<?php


namespace App\Components\User\Detail;

use App\Model\UserManager;
use App\Model\CategoryManager;


class ControlFactory {

    public function __construct(public UserManager $userManager) {}

    public function create(int $product_id): Control {
        return new Control($this->userManager, $product_id);
    }
}