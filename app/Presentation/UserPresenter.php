<?php

declare(strict_types=1);

namespace App\Presentation;
use App\Components\User\Detail\PresenterTrait as userDetailPresenterTrait;
use App\Components\Product\Grid\PresenterTrait as ProductGridPresenterTrait;
use App\Components\User\Review\Add\PresenterTrait AS addReviewPresenterTrait;
use App\Components\User\Review\Grid\PresenterTrait AS gridReviewPresenterTrait;

final class UserPresenter extends BasePresenter
{
    private int $user_post_id;

    use userDetailPresenterTrait;
    use ProductGridPresenterTrait;
    use gridReviewPresenterTrait;
    use addReviewPresenterTrait;

    public function actionDefault(int $id) {
        $this->user_post_id = $id;
    }

    public function actionReviewDelete(int $review_id) {

    }

    public function actionReviewAdd(){
        
    }


    protected function getUserId(): int {
        return $this->user_post_id;
    }
}

