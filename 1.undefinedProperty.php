<?php

class HelloWorld
{
    public string $theNameIWantToSalute;
}

$monHelloWorld = new HelloWorld();
$monHelloWorld->theNameIWantToSalute = 'toto';

$monDeuxiemeHelloWorld = new HelloWorld();
$monDeuxiemeHelloWorld->theNameIWantToSalute = 'titi';

