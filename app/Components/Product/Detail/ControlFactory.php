<?php

namespace App\Components\Product\Detail;

use App\Model\ProductManager;
use App\Model\Entity\Resource;
use Nette\Database\Table\ActiveRow;

class ControlFactory {

    public function __construct() {}

    public function create(Resource $productResource, ActiveRow $product): Control {
        return new Control($productResource, $product);
    }
}