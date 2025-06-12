<?php

declare(strict_types=1);

namespace App\Presentation;

use App\Model\ProductManager;
use App\Components\Product\Detail\PresenterTrait AS detailPresenterTrait;
use App\Components\Product\Manipulate\PresenterTrait AS manipulatePresenterTrait;
use App\Components\Product\Review\Add\PresenterTrait AS addReviewPresenterTrait;
use App\Components\Product\Review\Grid\PresenterTrait AS gridReviewPresenterTrait;
use Nette\Database\Table\ActiveRow;


final class ProductPresenter extends BasePresenter
{
    use addReviewPresenterTrait;
    use gridReviewPresenterTrait;
    use detailPresenterTrait;
    use manipulatePresenterTrait;

    public function __construct(private ProductManager $productManager) {    }

    public function actionDefault(int $product_id):void {
        $this->checkAccess("view");
        
        $this->user_id = $this->user->getIdentity() !== null ? $this->user->getIdentity()->id : 0;
        $this->product_id = $product_id;
    }

    public function actionAdd():void  {
        $this->checkAccess("add");
    } 

    public function actionEdit(int $product_id):void {
        $this->checkAccess("edit");
        $this->product = $this->checkProductExistence($product_id)->toArray();
    } 

    private function checkAccess(string $action): void  {
        if(!$this->user->isAllowed("product", $action)) {
            $this->flashMessage("Nemáte oprávnění na tuto akci" ,"error");
            $this->redirect("sign:in");
        }
    }   
    private function checkProductExistence(int $product_id): ActiveRow {
        $product = $this->productManager->getById($product_id);

        if(!$product) {
             $this->error("Tento produkt neexusituje", 404);
        }

        return $product;
    }


}
