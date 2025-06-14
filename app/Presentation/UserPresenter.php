<?php

declare(strict_types=1);

namespace App\Presentation;
use App\Components\User\Detail\PresenterTrait as userDetailPresenterTrait;
use App\Components\Product\Grid\PresenterTrait as ProductGridPresenterTrait;
use App\Components\User\Review\Add\PresenterTrait AS addReviewPresenterTrait;
use App\Components\User\Review\Grid\PresenterTrait AS gridReviewPresenterTrait;
use Nette\Database\Table\ActiveRow;

final class UserPresenter extends BasePresenter
{
    private int $user_id;

    use userDetailPresenterTrait;
    use ProductGridPresenterTrait;
    use gridReviewPresenterTrait;
    use addReviewPresenterTrait;

    public function actionDefault(int $user_id) {
        $this->user_id = $user_id;
    }

    public function actionReviewDelete(int $review_id) {

    }

    public function actionReviewAdd(){
        
    }


    protected function getUserId(): int {
        return $this->user_id;
    }
}

