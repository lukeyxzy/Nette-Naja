<?php
namespace App\Components\User\Review\Add;

use Nette\Application\UI\Control as NetteControl;
use Nette\Application\UI\Form;
use Nette\Security\User;

class Control extends NetteControl {

    private $callback;
    public function __construct(callable $callback, private FormFactory $formFactory, private User $user, private int $user_post_id) {
        $this->callback = $callback;
    }


    public function render() {
        $this->template->render(__DIR__ . "/default.latte");
    }


    public function createComponentAddReviewForm():Form {
        $form = $this->formFactory->create($this->user->getIdentity()->id, $this->user_post_id);
        $form->onSuccess[] = $this->callback;
        return $form;
    }

}