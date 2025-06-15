<?php

namespace App\Components\Product\Grid;

use Nette\Application\UI\Multiplier;
use Nette\Application\UI\Control as NetteControl;
use App\Model\ProductManager;
use App\Components\Product\Grid\Item\ControlFactory as ItemControlFactory;
use Nette\Database\Table\Selection;

class Control extends NetteControl{

    /**
     * @var string @persistent
     */
    public ?string $orderBy = "created_at DESC";
    /**
     * @var int @persistent
     */
    public int $page = 1;
    /**
     * @var bool @persistent
     */
    public bool $appendMode = false;

    private Selection $products;
    public function __construct(private ProductManager $productManager, private ItemControlFactory $controlFactory,  int $category_id,  int $user_id) {

        $this->products = $this->getProducts($category_id, $user_id);
    }
  
    private function getProducts(int $category_id, int $user_id): Selection {
                if($category_id > 0) {
                    return $this->productManager->getbyColumnName("category_id", $category_id);
                }
                if ($user_id > 0) {
                    return $this->productManager->getbyColumnName("user_id", $user_id);
                }
                else {
                    return $this->productManager->getAll();
                }

    }

    public function render():void {
        $this->template->products = $this->products->order($this->orderBy)->page($this->page,20);
        $this->template->appendMode = $this->appendMode;
        $this->template->orderBy = $this->orderBy;
        $this->template->render(__DIR__ . "/default.latte");
    }

    public function handleOrderBy(string $value, string $direction): void {
        $this->orderBy = $value . " " . $direction;
        $this->appendMode = false;
        $this->redrawControl("order");
        $this->redrawControl("orderButtons");
    }

    public function handleLoadMore() {
        $this->page++;
        $this->appendMode = true;
        $this->redrawControl("order");
        $this->redrawControl("loadMoreButton");
    }


    public function createComponentItem(): Multiplier {
        $products = $this->products;
        $factory = $this->controlFactory;
 
        return new Multiplier(function (string $id) use ($products, $factory) {
            return $factory->create($products[(int) $id]);
        });
    }
}