<?php
class User {

}

// Member "is a" User
// Member is NOT a Admin
class Member extends User {
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

// Admin "is a" User
// Admin is NOT a Member
class Admin extends User {

}