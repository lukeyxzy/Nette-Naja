<?php

declare(strict_types=1);

namespace App\Presentation;

use Nette\Application\UI\Presenter;
use App\Model\ProductManager;
use App\Components\Product\Detail\PresenterTrait AS detailPresenterTrait;
use App\Components\Product\Manipulate\PresenterTrait AS manipulatePresenterTrait;

final class ProductPresenter extends Presenter
{

    public function __construct(private ProductManager $productManager) {    }

    public function renderDefault(int $product_id) {}
    public function checkAccessToManipulate()  {
        if(!$this->getUser()->isLoggedIn()) {
            $this->flashMessage("Pro tuto akci se přihlašte", "error");
            $this->redirect("Sign:in");
        }
        if ($this->getUser()->getIdentity()->role != 2) {
            $this->flashMessage("Nemáte oprávnění na tuto akci", "error");
            $this->redirect("Sign:in");
        }
    }   

    public function actionAdd() {
        $this->checkAccessToManipulate();
    } 

    public function actionEdit(int $product_id) {
        $this->checkAccessToManipulate();
        bdump($product_id);
        $product = $this->productManager->getById($product_id);

        if(!$product) {
            $this->error("Produkt neexistuje", 404);
        }
        $this->product = $product->toArray();
    } 


    use detailPresenterTrait;
    use manipulatePresenterTrait;
}
