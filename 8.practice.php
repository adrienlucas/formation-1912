<?php

//Create a class named `Member`
// with properties : login - password - age

//Create the constructor to initialize those properties

//Create an `auth` method that take two strings as parameter
// and compares to the login and password of the current instance
// and return true or false based on the comparison

class Member {
    public function __construct()
    {
    }
}

$myMember = new Member('romain', '123456');
$myMember->auth('romain', 'azerty'); // false
$myMember->auth('kenji', 'azerty'); // false
$myMember->auth('romain', '123456'); // true