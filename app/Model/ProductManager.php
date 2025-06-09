<?php


namespace App\Model;



class ProductManager extends BaseManager {

    public function getTableName(): string {
        return "product";
    }
    
}