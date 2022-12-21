<?php

class User
{
    public string $firstname;
    public string $lastname;

    public static int $numberOfUsers = 0;
    public function __construct()
    {
//        $this->numberOfUsers++;
        self::incrementInstancesCount();
    }

    public function makeBrother(string $firstname): self
    {
        $brother = new User();
        $brother->lastname = $this->lastname; // LUCAS
        $brother->firstname = $firstname; // Augustin

        return $brother;
    }

    private static function incrementInstancesCount()
    {
        self::$numberOfUsers++;
    }
}

$adrien = new User();
$adrien->firstname = 'Adrien';
$adrien->lastname = 'LUCAS';

$augustin = $adrien->makeBrother('Augustin');

$romain = new User();
$kenji = new User();
$john = new User();

//User::incrementInstancesCount();

var_dump(User::$numberOfUsers); // 4

// Procedural approach :
exit(0); // uncomment to test this approach

global $numberOfUsers;
$numberOfUsers = 0;

$adrien = userFactory();
$romain = userFactory();
$kenji = userFactory();

function userFactory(): User
{
    global $numberOfUsers;
    $numberOfUsers = $numberOfUsers+1;

    return new User();
}



var_dump($numberOfUsers);
// 3