<?php

namespace App\Components\User\Review\Grid\Item;

use Nette\Application\UI\Control as NetteControl;
use Nette\Database\Table\ActiveRow;
use App\Model\ReviewManager;
use App\Model\Entity\Resource;
use Nette\Security\User;

class Control extends NetteControl{

    public array $onDelete = [];
    private Resource $reviewResource;
    public function __construct(private ActiveRow $item, private ReviewManager $reviewManager, private User $loggedInUser) {
        $this->reviewResource = $this->reviewManager->makeToEntity($item);
    }
  
    public function render():void {
        $this->template->reviewResource =  $this->reviewResource;
        $this->template->review = $this->item;
        $this->template->render(__DIR__ . "/default.latte");
    }

    public function handleReviewDelete(): void {
        if(!$this->loggedInUser->isAllowed($this->reviewResource, "delete")) {
            $this->error("Nemáte oprávnění smazat rezecenzi", 404);
        }



        $item_id = $this->item->toArray()["id"];
        $this->reviewManager->delete($item_id);
        $this->onDelete();
    }

}