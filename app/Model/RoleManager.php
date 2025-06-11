<?php


namespace App\Model;



class RoleManager extends BaseManager {

    public function getTableName(): string {
        return "role";
    }


    public function getByUserId(int $id): array {
            return $this->getAll()->where(":user_x_role.user_id", $id)->fetchPairs("id", "name");
    }
}