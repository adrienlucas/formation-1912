<?php


// Basic anonymous function
$firstnames = [
    'adrien',
    'romain',
    'kenji',
];

$firstnamesAfterTransformation = array_map(
    function (string $firstname) {
        return strtoupper($firstname).'##';
    },
    $firstnames
);

var_dump($firstnamesAfterTransformation);

// Closure binding (DO NOT DO THAT PLEASE !!!)

class Admin
{
    public function __construct(
        private string $username,
    )
    {
    }
}

$newAdmin = new Admin('toto');

// 500 lignes de code
$getterUsername = function() {
    return $this->username;
};
$newAdminGetter = $getterUsername->bindTo($newAdmin, $newAdmin);

var_dump($newAdminGetter());


new