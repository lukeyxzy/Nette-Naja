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
        $acl->addResource("review"); // VIEW, ADD, EDIT, DELETE


        $acl->deny("guest");
        $acl->allow("guest", "frontSide", "view");
        $acl->allow("guest", "productGrid", "view");
        $acl->allow("guest", "product", "view");
        $acl->allow("guest", "reviewGrid", "view");
        $acl->allow("guest", "review", "view");

        $acl->allow("user", "frontSide", "logout");
        $acl->allow("user", "review", "add");
        $acl->allow("user", "review", "delete");

        $acl->allow("user", "product", "add");
        $acl->allow("user", "product", "edit", [self::class, "checkEditProduct"]);
        $acl->allow("user", "product", "delete");

        $acl->allow("admin");
        return $acl;
    }


    public static function checkEditProduct(Permission $acl, string $role, string $resource, string $privilege): bool {
        $role = $acl->getQueriedRole(); 
        $resource = $acl->getQueriedResource(); 
        return $role->getUserId() === $resource->getUserId();
    }



 }