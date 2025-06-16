<?php

declare(strict_types=1);

namespace App\Presentation;

use App\Model\ProductManager;
use App\Components\Product\Detail\PresenterTrait AS detailPresenterTrait;
use App\Components\Product\Manipulate\PresenterTrait AS manipulatePresenterTrait;
use Nette\Database\Table\ActiveRow;
use App\Model\Entity\Resource;

class ProductPresenter extends BasePresenter
{

    use detailPresenterTrait;
    use manipulatePresenterTrait;

    private Resource $productResource;
    private ActiveRow $product;
    public function __construct(private ProductManager $productManager) {   }


    public function startup() {
        parent::startup();
        $product_id = (int) $this->getParameter("id");

        if($product_id) {
                $this->product = $this->checkProductExistence($product_id);
                $this->productResource = $this->productManager->makeToEntity($this->product);
        }
    }

    public function actionDefault(int $id):void {
            $this->checkAccess("product", "view");
    }

    public function actionAdd():void  {
        $this->checkAccess("product", "add");
    } 

    public function actionEdit(int $id):void {
        $this->checkAccess($this->productResource, "edit");

    } 

    public function actionDelete(int $id): void {
        $this->checkAccess($this->productResource, "delete");
        if ($this->productManager->delete($id)){
            $this->flashMessage("Úspěšně odstraněno.");
            $this->redirect("Home:default");
        }
    }

    private function checkProductExistence(int $id): ActiveRow {
        $product = $this->productManager->getById($id);
        if(!$product) {
             $this->error("Tento produkt neexistuje.", 404);
        }
        return $product;
    }


}
