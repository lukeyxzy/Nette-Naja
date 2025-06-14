<?php

declare(strict_types=1);

namespace App\Presentation;

use App\Model\ProductManager;
use App\Components\Product\Detail\PresenterTrait AS detailPresenterTrait;
use App\Components\Product\Manipulate\PresenterTrait AS manipulatePresenterTrait;
use Nette\Database\Table\ActiveRow;
use App\Model\Entity\Resource;

final class ProductPresenter extends BasePresenter
{

    use detailPresenterTrait;
    use manipulatePresenterTrait;

    
    private int $user_id;
    private int $product_id;
    private ActiveRow $product;
    public function __construct(private ProductManager $productManager) {    }

    public function startup(): void {
        parent::startup();
        $this->product_id = (int) $this->getParameter("product_id");
        if($this->product_id !== 0) {
        $this->product = $this->checkProductExistence((int) $this->product_id);
        $this->productResource = $this->productManager->makeToEntity($this->product);
        }
    }

    public function actionDefault(int $product_id):void {
            $this->checkAccess($this->productResource, "view");
            $this->user_id = $this->user->getIdentity() !== null ? $this->user->getIdentity()->id : 0;
    }

    public function actionAdd():void  {
        if (!$this->user->isAllowed("product", "add")) {
            $this->flashMessage("Nemáte oprávnění na tuto akci" ,"error");
            $this->redirect("sign:in");
        }
    } 

    public function actionEdit(int $product_id):void {
        $this->checkAccess($this->productResource, "edit");
        $this->productToArray = $this->checkProductExistence($product_id)->toArray();
    } 

    public function actionDelete(int $product_id): void {
        $this->checkAccess($this->productResource, "delete");
        if ($this->productManager->delete($product_id)){
            $this->flashMessage("Úspěšně odstraněno.");
            $this->redirect("Home:default");
        }
    }


    private function checkAccess(Resource $resource, string $action): void  {
        if(!$this->user->isAllowed($resource, $action)) {
            $this->flashMessage("Nemáte oprávnění na tuto akci" ,"error");
            $this->redirect("sign:in");
        }
    }   
    private function checkProductExistence(int $product_id): ActiveRow {
        $product = $this->productManager->getById($product_id);
        if(!$product) {
             $this->error("Tento produkt neexistuje.", 404);
        }
        return $product;
    }


}
