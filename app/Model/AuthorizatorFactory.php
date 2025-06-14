<?php


namespace App\Model;

use Nette\Security\Permission;


class AuthorizatorFactory {


    public static function create(): Permission {

        $acl = new Permission;
        $acl->addRole("guest");
        $acl->addRole("user", "guest");
        $acl->addRole("moderator", "user");
        $acl->addRole("admin");


        $acl->addResource("frontSide"); // VIEW, LOGOUT, LOGIN, REGISTER
        $acl->addResource("adminSide"); // VIEW, LOGOUT

        $acl->addResource("productGrid"); // VIEW
        $acl->addResource("product"); // VIEW, ADD, EDIT, DELETE
        $acl->addResource("reviewGrid"); // VIEW
        $acl->addResource("review"); // VIEW, ADD, DELETE
        $acl->addResource("category"); // VIEW, ADD, DELETE


        $acl->deny("guest");
        $acl->allow("guest", "frontSide", "view");
        $acl->allow("guest", "productGrid", "view");
        $acl->allow("guest", "product", "view");
        $acl->allow("guest", "reviewGrid", "view");
        $acl->allow("guest", "review", "view");
        $acl->allow("guest", "category", "view");

        $acl->allow("user", "frontSide", "logout");
        $acl->allow("user", "review", "add");
        $acl->allow("user", "review", "delete", [self::class, "checkResourcePermission"]);

        $acl->allow("user", "product", "add");
        $acl->allow("user", "product", "edit", [self::class, "checkResourcePermission"]);
        $acl->allow("user", "product", "delete", [self::class, "checkResourcePermission"]);



        $acl->allow("moderator", "product", "delete");
        $acl->allow("moderator", "review", "delete");
        $acl->allow("moderator", "category", "add");
        $acl->allow("moderator", "category", "delete");

        $acl->allow("admin");
        return $acl;
    }


    public static function checkResourcePermission(Permission $acl, string $role, string $resource, string $privilege): bool {
        $role = $acl->getQueriedRole(); 
        $resource = $acl->getQueriedResource(); 
        return $role->getUserId() === $resource->getUserId();
    }



 }