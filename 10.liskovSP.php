<?php


class User {
    public function getLogin() {

    }

    public function getPassword() {

    }
}

class Visitor extends User {
    public function getPicture()
    {

    }
}

function controller_registerUser(User $user) {
    $database->insert($user->getLogin(), $user->getPassword());
}

$visitor = new Visitor();
controller_registerUser($visitor);

// LSP violation :
class Admin extends User {
    public function getPassword()
    {
        throw new \Exception('Attention: les admin n\'utilisent pas de password, ils ont une 2FA');
    }
}