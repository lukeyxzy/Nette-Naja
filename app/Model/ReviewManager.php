<?php


namespace App\Model;

use Nette\Database\Table\Selection;

class ReviewManager extends BaseManager {

    public function getTableName(): string {
        return "review";
    }


 }