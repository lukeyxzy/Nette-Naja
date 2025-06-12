<?php


namespace App\Model;

use App\Model\Entity\Role;

class RoleManager extends BaseManager {

    public function getTableName(): string {
        return "role";
    }


    public function getByUserId(int $id): array {

        return $this->getAll()->where(":user_x_role.user_id", $id)->fetchPairs("id", "name");

    }

    public function getByUserIdReturnAsEntity(int $id): array {

        return array_map(function(string $name) use ($id) { 
                    return Role::create($id, $name);
                }, $this->getByUserId($id)
               );

    }





}