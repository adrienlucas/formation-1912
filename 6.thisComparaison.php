<?php

class User
{
    public function __construct(
        public readonly string $firstname
    )
    {
    }

    public function getEmail(): string
    {
        return $this->getNormalizedFirstname().'@toto.univ.fr';
    }

    public function getNormalizedFirstname(): string
    {
        return strtolower($this->firstname);
    }

    public function isSame(User $otherUser): bool
    {
        return $this === $otherUser;
    }
}

$firstUser = new User('Romain');
echo $firstUser->getEmail(); // Romain@toto.univ.fr
// ...

$secondUser = new User('Kenji');
echo $secondUser->getEmail(); // Kenji@toto.univ.fr
// ...

echo $firstUser->isSame($secondUser) ? 'Same instance' : 'NOT the same instance';
echo "\n";

echo $firstUser->isSame($firstUser) ? 'Same instance' : 'NOT the same instance';

//exit();