<?php


namespace App\Model;



class ReviewsManager extends BaseManager {

    public function getTableName(): string {
        return "review";
    }
}