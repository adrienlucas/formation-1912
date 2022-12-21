<?php

class A {
    public function toto(): void
    {
        // some toto logic....
    }
}

class B {
    public function tata(): void
    {
        // some tata logic....
    }
}

function doSomething(A&B $someVariable): void
{
    // some logic ...
    $someVariable->tata();
    $someVariable->toto();
}

$someA = new A();
$someB = new B();

// @todo : Find an intersection between A & B;
doSomething($someC);