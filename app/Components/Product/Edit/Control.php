<?php

namespace App\Components\Product\Edit;

use App\Model\ProductManager;
use App\Model\CategoryManager;
use Nette\Application\UI\Control as NetteControl;
use Nette\Application\UI\Form;
use Nette\Database\Table\ActiveRow;

class Control extends NetteControl {

    private $callback;
    private ActiveRow $product;
    public function __construct(callable $callback, private FormFactory $formFactory,private ProductManager $productManager, private CategoryManager $categoryManager,private int $product_id) {
        $this->callback = $callback;
        $this->product = $this->productManager->getById($this->product_id);
    }


    public function render() {
        $this["editProductForm"]->setDefaults($this->product);
        $this->template->render(__DIR__ . "/default.latte");

    }


    public function createComponentEditProductForm():Form {
        $form = $this->formFactory->create();
        $form->onSuccess[] = [$this, "updateProduct"];
        $form->onSuccess[] = $this->callback;
        return $form;
    }

    public function updateProduct(Form $form, array $values) {
        $this->product->update($values);
    }



}