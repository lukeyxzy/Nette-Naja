<?php

namespace App\Model\Entity;

use Nette\Security\Resource as NetteResource;

class Resource implements NetteResource {

    public function __construct(
        private string $resource_id,
        private int $user_id
                ) {}

    function getResourceId(): string {
        return $this->resource_id;
    }

    public function getUserId(): int {
        return $this->user_id;
    }


    public static function create(string $resource_id, int $user_id): static {
        return new static($resource_id, $user_id);
    }

}