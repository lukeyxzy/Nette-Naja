<?php
namespace App\Components\Product\Manipulate;

use App\Model\ProductManager;
use App\Model\CategoryManager;
use Nette\Application\UI\Control as NetteControl;
use Nette\Application\UI\Form;

class Control extends NetteControl {

    private $callback;

    public function __construct(callable $callback, private FormFactory $formFactory,private ProductManager $productManager, private CategoryManager $categoryManager, private array $product, private int $user_id) {
        $this->callback = $callback;
    }


    public function render() {
        $this->template->render(__DIR__ . "/default.latte");
    }


    public function createComponentManipulateForm():Form {
        $form = $this->formFactory->create($this->product, $this->user_id);
        $form->onSuccess[] = $this->callback;
        return $form;
    }

}