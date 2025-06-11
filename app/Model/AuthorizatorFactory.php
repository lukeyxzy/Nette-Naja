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


        $acl->deny("guest");
        $acl->allow("guest", "frontSide", "view");
        $acl->allow("guest", "productGrid", "view");
        $acl->allow("guest", "product", "view");

        $acl->allow("user", "frontSide", "logout");

        $acl->allow("moderator", "product", "add");
        $acl->allow("moderator", "product", "edit");

        $acl->allow("admin");

        return $acl;
    }

 }