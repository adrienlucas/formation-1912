<?php

//Create a class named `Member`
// with properties : login - password - age

//Create the constructor to initialize those properties

//Create an `auth` method that take two strings as parameter
// and compares to the login and password of the current instance
// and return true or false based on the comparison

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

$myMember = new Member('romain', '123456');
$myMember->auth('romain', 'azerty'); // false
$myMember->auth('kenji', 'azerty'); // false
$myMember->auth('romain', '123456'); // true