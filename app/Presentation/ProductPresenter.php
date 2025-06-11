<?php

declare(strict_types=1);

namespace App\Presentation;

use App\Model\ProductManager;
use App\Components\Product\Detail\PresenterTrait AS detailPresenterTrait;
use App\Components\Product\Manipulate\PresenterTrait AS manipulatePresenterTrait;

final class ProductPresenter extends BasePresenter
{

    public function __construct(private ProductManager $productManager) {    }



    public function checkAccess(string $action): void  {
        if(!$this->user->isAllowed("product", $action)) {
            $this->flashMessage("Nemáte oprávnění na tuto akci" ,"error");
            $this->redirect("sign:in");
        }
    }   
    public function actionDefault(int $product_id):void {
        $this->checkAccess("view");
    }

    public function actionAdd():void  {
        $this->checkAccess("add");
    } 

    public function actionEdit(int $product_id):void {
        $this->checkAccess("edit");

        $product = $this->productManager->getById($product_id);

        if(!$product) {
            $this->error("Produkt neexistuje", 404);
        }
        $this->product = $product->toArray();
    } 


    use detailPresenterTrait;
    use manipulatePresenterTrait;
}
