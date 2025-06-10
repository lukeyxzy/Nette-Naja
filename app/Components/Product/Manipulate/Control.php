<?php
namespace App\Components\Product\Manipulate;

use App\Model\ProductManager;
use App\Model\CategoryManager;
use Nette\Application\UI\Control as NetteControl;
use Nette\Application\UI\Form;
use Nette\Database\Table\ActiveRow;

class Control extends NetteControl {

    private $callback;

    public function __construct(callable $callback, private FormFactory $formFactory,private ProductManager $productManager, private CategoryManager $categoryManager, private array $product) {
        $this->callback = $callback;
    }


    public function render() {
        $this->template->render(__DIR__ . "/default.latte");
    }


    public function createComponentManipulateForm():Form {
        $form = $this->formFactory->create($this->product);
        $form->onSuccess[] = $this->callback;
        return $form;
    }

}