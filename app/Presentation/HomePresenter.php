<?php

declare(strict_types=1);

namespace App\Presentation;
use Nette\Application\UI\Presenter;
use App\Model\ProductManager;

final class HomePresenter extends Presenter
{
    
    public function __construct(private ProductManager $productManager) {}


    public function renderDefault() {
        $this->template->products = $this->productManager->getAllLimited();
    }
}
