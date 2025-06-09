<?php


namespace App\Model;



class CommentManager extends BaseManager {

    public function getTableName(): string {
        return "comment";
    }
}