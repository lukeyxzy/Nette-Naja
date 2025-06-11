<?php

namespace App\Model;

use Nette\Security\Authenticator as NetteAuthenticator;
use Nette\Security\SimpleIdentity;
use Nette\Security\AuthenticationException;
use Nette\Security\Passwords;

class Authenticator implements NetteAuthenticator {

    public function __construct(private UserManager $userManager, private RoleManager $roleManager, private Passwords $passwords) {}



    public function authenticate(string $email, string $password): SimpleIdentity {

        $activeRow = $this->userManager->getByEmail($email);


        if(!$activeRow) {
            throw new AuthenticationException("Uzivatel nenalezen");
        }

        if(!$this->passwords->verify($password, $activeRow->password)) {
            throw new AuthenticationException("Heslo nesedi");
        }

        $user = $activeRow->toArray();
        unset($user["password"]);

        return new SimpleIdentity($activeRow->id, $this->roleManager->getByUserId($activeRow->id), $user); 
    }


}