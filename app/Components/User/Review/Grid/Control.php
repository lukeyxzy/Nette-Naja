<?php

namespace App\Components\User\Review\Grid;

use Nette\Application\UI\Multiplier;
use Nette\Application\UI\Control as NetteControl;
use App\Model\ReviewManager;
use App\Components\User\Review\Grid\Item\ControlFactory as ItemControlFactory;
use Nette\Database\Table\Selection;
use Nette\Security\User;

class Control extends NetteControl{

    private Selection $reviews;
    private $callback;
    public function __construct(private ReviewManager $reviewManager, private ItemControlFactory $controlFactory, int $user_id,  callable $callback, private User $loggedInUser) {
        $this->reviews = $this->reviewManager->getByColumnName("reviewed_user_id", $user_id);
        $this->callback = $callback;
    }
  
    public function render():void {
        $this->template->reviews = $this->reviews;
        $this->template->render(__DIR__ . "/default.latte");
    }



    public function createComponentItem(): Multiplier {
        $reviews = $this->reviews;
        $factory = $this->controlFactory;
        $callback = $this->callback;


        return new Multiplier(function (string $id) use ($reviews, $factory, $callback) {
            $row = $factory->create($reviews[(int) $id], $this->reviewManager, $this->loggedInUser);
            $row->onDelete[] = $callback;
            return $row;
        });
    }


}