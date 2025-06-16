<?php

declare(strict_types=1);

namespace App\Presentation;

use Nette\Application\UI\Presenter as NettePresenter;
use App\Model\Entity\Resource;

abstract class Presenter extends NettePresenter{

       protected function checkAccess(string|Resource $resource, string $action): void  {
        if(!$this->user->isAllowed($resource, $action)) {
            $this->flashMessage("Nemáte oprávnění na tuto akci" ,"error");
            $this->redirect("sign:in");
        }
    }   
    
}

