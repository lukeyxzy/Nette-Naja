<?php

namespace App\Components\Product\Detail;

use App\Model\Entity\Resource;
use Nette\Application\UI\Control as NetteControl;
use Nette\Database\Table\ActiveRow;


class Control extends NetteControl {

    public function __construct(private Resource $productResource, private ActiveRow $product) {}



    public function render() {
        $this->template->productResource =  $this->productResource;
        $this->template->product = $this->product;
        $this->template->render(__DIR__ . "/default.latte");
    }



}