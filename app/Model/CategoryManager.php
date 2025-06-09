<?php


namespace App\Model;



class CategoryManager extends BaseManager {

    public function getTableName(): string {
        return "category";
    }
}