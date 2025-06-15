<?php

namespace App\Components\User\Review\Grid;

use App\Model\ReviewManager;
use App\Components\User\Review\Grid\Item\ControlFactory as ItemControlFactory;
use Nette\Security\User;


class ControlFactory {

    public function __construct(public ReviewManager $reviewManager, public ItemControlFactory $itemControlFactory) {}

    public function create(int $user_id, callable $callback, User $loggedInUser): Control {
        return new Control($this->reviewManager, $this->itemControlFactory, $user_id, $callback, $loggedInUser);
    }
}