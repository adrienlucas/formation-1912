<?php


class User
{
    public string $firstname;
    public readonly int $age;
    public string $email;

    public function sayHello(): string
    {
        return 'Hello, my name is '.
            $this->firstname.
            ', my age is '.
            $this->age.'.';
    }

    public function automatiqueEmail(): void
    {
        $this->email = $this->firstname.'@monadmin.gouv.fr';
    }
}

$firstUser = new User();
$firstUser->firstname = 'Romain';
// @todo : Find a way to initialize the readonly value
$firstUser->age = 21;

$secondUser = new User();
$secondUser->firstname = 'Kenji';
// @todo : Find a way to initialize the readonly value
$secondUser->age = 24;
