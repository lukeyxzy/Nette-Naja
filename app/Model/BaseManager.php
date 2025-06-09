<?php


namespace App\Model;
use Nette\Database\Explorer;
use Nette\Database\Table\Selection;
use Nette\Database\Table\ActiveRow;


abstract class baseManager {


    public function __construct(private Explorer $explorer) {}

    public abstract function getTableName(): string;

    public function getAll(): Selection {
        return $this->explorer->table($this->getTableName());
    }


    public function getAllLimited(): Selection {
        return $this->getAll()->limit(5);
    }
    
}