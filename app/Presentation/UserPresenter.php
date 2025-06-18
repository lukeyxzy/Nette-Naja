<?php

declare(strict_types=1);

namespace App\Presentation;
use App\Components\User\Detail\PresenterTrait as userDetailPresenterTrait;
use App\Components\Product\Grid\PresenterTrait as ProductGridPresenterTrait;
use App\Components\User\Review\Add\PresenterTrait AS addReviewPresenterTrait;
use App\Components\User\Review\Grid\PresenterTrait AS gridReviewPresenterTrait;

use Nette\Database\Table\ActiveRow;
use App\Model\UserManager;

abstract class UserPresenter extends Presenter
{
    private int $user_post_id;
    private ActiveRow $userEntity;
    
    use userDetailPresenterTrait;
    use ProductGridPresenterTrait;
    use gridReviewPresenterTrait;
    use addReviewPresenterTrait;
    
    public function __construct(private UserManager $userManager) {}

    public function startup() {
        parent::startup();
        $this->user_post_id = (int) $this->getParameter("id");
        if($this->user_post_id) {
            $this->userEntity = $this->userManager->getById($this->user_post_id);
        }
    }

    public function actionDefault(int $id) {

    }

    public function actionReviewDelete(int $review_id) {

    }

    public function actionReviewAdd(){
        
    }


    protected function getUserId(): int {
        return $this->user_post_id;
    }
}

