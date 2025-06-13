<?php


namespace App\Model;

use App\Model\Entity\Resource;
use Nette\Database\Table\ActiveRow;

class ProductManager extends BaseManager {

    public function getTableName(): string {
        return "product";
    }



    public function makeToEntity(ActiveRow $activeRow): Resource {

        return Resource::create("product", $activeRow->user_id);

    }

 }