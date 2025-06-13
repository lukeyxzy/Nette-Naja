<?php

declare(strict_types=1);

namespace App\Presentation;

use App\Model\ProductManager;
use App\Components\Product\Detail\PresenterTrait AS detailPresenterTrait;
use App\Components\Product\Manipulate\PresenterTrait AS manipulatePresenterTrait;
use Nette\Database\Table\ActiveRow;


final class ProductPresenter extends BasePresenter
{

    use detailPresenterTrait;
    use manipulatePresenterTrait;
    private int $user_id;
    private int $product_id;
    private ActiveRow $product;
    public function __construct(private ProductManager $productManager) {    }

    public function actionDefault(int $product_id):void {
        $this->checkAccess("view");
        $this->product = $this->checkProductExistence($product_id);
        $this->product_id = $product_id;

        $this->productResource = $this->productManager->makeToEntity($this->product);

        $this->user_id = $this->user->getIdentity() !== null ? $this->user->getIdentity()->id : 0;
    }

    public function actionAdd():void  {
        $this->checkAccess("add");
    } 

    public function actionEdit(int $product_id):void {
        $this->checkAccess("edit");
        $this->productToArray = $this->checkProductExistence($product_id)->toArray();
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
