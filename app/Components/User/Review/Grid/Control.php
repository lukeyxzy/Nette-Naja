<?php

namespace App\Components\User\Review\Grid;

use Nette\Application\UI\Multiplier;
use Nette\Application\UI\Control as NetteControl;
use App\Model\ReviewManager;
use App\Components\User\Review\Grid\Item\ControlFactory as ItemControlFactory;
use Nette\Database\Table\Selection;
use Nette\Security\User;

class Control extends NetteControl{

    /**
     * @var int @persistent
     */
    public int $page = 1;

    private Selection $reviews;
    private $callback;
    private int $numberOfReviews;
    public function __construct(private ReviewManager $reviewManager, private ItemControlFactory $controlFactory, int $user_post_id,  callable $callback, private User $loggedInUser) {
        $this->callback = $callback;
        $this->reviews = $this->reviewManager->getByColumnName("reviewed_user_id", $user_post_id);
        $this->numberOfReviews = $this->reviews->count("*");
    }
   
    public function render():void {
        $activeItems = $this->page * 2;
        $this->template->showButton = $activeItems >= $this->numberOfReviews;
        $this->template->reviews = $this->reviews->page($this->page, 2)->order("created_at DESC");
        $this->template->numberOfReviews = $this->numberOfReviews;
        $this->template->render(__DIR__ . "/default.latte");
    }

    public function handleLoadMore(): void {
        $this->page++;
        $this->redrawControl("reviews");
        $this->redrawControl("reviewsButton");

    }

    public function createComponentItem(): Multiplier {
        $reviews = $this->reviews;
        $factory = $this->controlFactory;
        $callback = $this->callback;

        return new Multiplier(function (string $id) use ($reviews, $factory, $callback) {
            $row = $factory->create($reviews[(int) $id], $this->reviewManager, $this->loggedInUser);
            $row->onDelete[] = function () use ($callback) {
                $callback();
            };
            return $row;
        });
    }


}