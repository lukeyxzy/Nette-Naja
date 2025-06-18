<?php

namespace App\Components\Product\Detail;

use App\Model\Entity\Resource;
use Nette\Database\Table\ActiveRow;

interface ControlFactory {

    public function create(Resource $productResource, ActiveRow $product): Control;
}