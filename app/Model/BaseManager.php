<?php


namespace App\Model;
use Nette\Database\Explorer;
use Nette\Database\Table\Selection;
use Nette\Database\Table\ActiveRow;
use Nette\Application\UI\Presenter;

abstract class baseManager extends Presenter {


    public function __construct(private Explorer $explorer) {}

    public abstract function getTableName(): string;

    public function getAll(): Selection {
        return $this->explorer->table($this->getTableName());
    }


    public function getAllLimited(): Selection {
        return $this->getAll()->limit(5);
    }

    // Returns null if product doesn´t exist.
    public function getById(int $id): ?ActiveRow {
        return $this->getAll()->get($id);
    }

    public function add(array $values): ActiveRow {
        return $this->getAll()->insert($values);
    }

    public function update(int $id, array $values) {
        return $this->getAll()->where("id", $id)->update($values);
    }

    public function getCountByColumnName(string $columnName, string $value) {
        return $this->getAll()->where($columnName, $value)->count('*'); 
    }

    public function getbyColumnName(string $columnName, string $value) {
        return $this->getAll()->where($columnName, $value);
    }

    public function delete(int $id): int {
        return $this->getAll()->where("id", $id)->delete();
    }
    
}