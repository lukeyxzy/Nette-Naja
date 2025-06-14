<?php

declare(strict_types=1);

namespace App\Presentation;
use App\Components\User\Detail\PresenterTrait as userDetailPresenterTrait;
use App\Components\Product\Grid\PresenterTrait as ProductGridPresenterTrait;
use App\Components\User\Review\Add\PresenterTrait AS addReviewPresenterTrait;
use App\Components\User\Review\Grid\PresenterTrait AS gridReviewPresenterTrait;
use App\Model\Entity\Resource;

final class UserPresenter extends BasePresenter
{
    use userDetailPresenterTrait;
    use ProductGridPresenterTrait;
    use gridReviewPresenterTrait;
    use addReviewPresenterTrait;

    public function startup(): void {
        parent::startup();
        $this->product_id = (int) $this->getParameter("product_id");
        if($this->product_id !== 0) {
        $this->product = $this->checkProductExistence((int) $this->product_id);
        $this->productResource = $this->productManager->makeToEntity($this->product);
        }
    }




    public function actionDefault(int $user_id) {
        $this->user_id = $user_id;
    }

    public function actionReviewDelete(int $review_id) {
        
    }



    
    private function checkAccess(Resource $resource, string $action): void  {
        if(!$this->user->isAllowed($resource, $action)) {
            $this->flashMessage("Nemáte oprávnění na tuto akci" ,"error");
            $this->redirect("sign:in");
        }
    }   

}

