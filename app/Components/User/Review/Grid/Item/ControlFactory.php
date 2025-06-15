<?php


namespace App\Components\User\Review\Grid\Item;

use Nette\Database\Table\ActiveRow;
use App\Model\ReviewManager;
use Nette\Security\User;

class ControlFactory {

    public function __construct() {}

    public function create(ActiveRow $item, ReviewManager $reviewManager, User $loggedInUser): Control {
        return new Control($item, $reviewManager, $loggedInUser);
    }
}