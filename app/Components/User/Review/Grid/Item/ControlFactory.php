<?php


namespace App\Components\User\Review\Grid\Item;

use Nette\Database\Table\ActiveRow;
use App\Model\ReviewManager;
use Nette\Security\User;

interface ControlFactory {
    public function create(ActiveRow $item, ReviewManager $reviewManager, User $loggedInUser): Control;
}