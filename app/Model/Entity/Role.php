<?php

namespace App\Model\Entity;

use Nette\Security\Role as NetteRole;

class Role implements NetteRole {

    public function __construct(
        private int $user_id,
        private string $role_id) {}

    function getRoleId(): string {
        return $this->role_id;
    }

    public function getUserId(): int {
        return $this->user_id;
    }


    public static function create(int $user_id, string $role_id): self {
        return new Role($user_id, $role_id);
    }

}