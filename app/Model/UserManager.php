<?php


namespace App\Model;

use Nette\Database\Table\ActiveRow;
use App\Model\Entity\Resource;

class UserManager extends BaseManager {

    public function getTableName(): string {
        return "user";
    }

    public function getByEmail(string $email): ?ActiveRow {
        return $this->getAll()->where("email", $email)->fetch();
    }


    // overRide base function

    public function makeToEntity(ActiveRow $activeRow): Resource {

    return Resource::create($this->getTableName(), $activeRow->id);

    }
    
}