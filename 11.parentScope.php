<?php

function some() {

}

class A {
    private function somePeople(): string {
        return 'world';
    }
    public function hello(): string {
        return sprintf('hello %s', $this->somePeople());
    }
}

class BigA extends A {
    private function somePeople(): string {
        return 'le monde';
    }

    public function hello(): string
    {
        return strtoupper(parent::hello() . ' (en francais : '.$this->somePeople());
    }
}

$bigA = new BigA();
echo $bigA->hello();