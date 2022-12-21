<?php


class Member {
    public function __construct(
        public string $login,
        public string $password,
        public int $age
    ) {
    }

    public function auth(string $login, string $password): bool
    {
        return $this->login === $login && $this->password === $password;
    }
}

//$member = new Member(..., ..., ...);

class Admin extends Member {
    public string $level; // "SUPERADMIN" or "ADMIN"
    public function __construct(
        string $login,
        string $password,
        int $age,
        string $level,
    )
    {
        parent::__construct($login, $password, $age);
        $this->level = $level;
    }

    public function auth(string $login, string $password): bool
    {
        if($this->level === 'SUPERADMIN') {
            return true; //stop execution
        }

        return parent::auth($login, $password);
    }
}

$lambdaAdmin = new Admin('admin', 'azerty', 98, 'ADMIN');
$superAdmin = new Admin('root', '12345', 12, 'SUPERADMIN');

var_dump($lambdaAdmin->auth('admin', 'quiop')); // false
var_dump($lambdaAdmin->auth('admin', 'azerty')); // true
var_dump($superAdmin->auth('root', '09876')); // true
var_dump($superAdmin->auth('root', '12345')); // true
var_dump($superAdmin->auth('', '')); // true

// Given there are administrators
// When an administrator with level "SUPERADMIN" authenticates
// Then authentication should always be a success

// 4 story points
// story M

// Create an Admin class that extends Member
// The Admin class should have a $level property

// $level can be "SUPERADMIN" or "ADMIN"

// The Admin class constructor should take the level as additional argument

// In the admin class, change the `auth` behavior :
//   if an admin is "SUPERADMIN", the method should always return `true`
