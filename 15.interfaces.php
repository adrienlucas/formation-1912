<?php

class Animal
{

}

interface SwimmingAnimalInterface
{
    public function swim(int $distance): bool;
}

interface BarkingAnimalInterface
{
    public function bark(int $volume): int;
}

class Worm extends Animal {

}

class Fish extends Animal implements CanideaInterface
{
    public function swim(int $distance): bool
    {
        // ... swim for $distance

        return true;
    }
}

interface CanideaInterface
    swim
    bark

class Wolf extends Animal
{

}

class Dog extends Animal implements BarkingAnimalInterface, SwimmingAnimalInterface
{
    public function swim(int $distance): bool
    {
        if($distance > 12) {
            return false;
        }

        return true;
    }

    public function bark(int $volume): int
    {
        // bark for some time...

        return rand(1, 10);
    }
}

function riverController(SwimmingAnimalInterface $animal) {
    $animal->swim(2);
}


function gardenController(Animal $animal) {
    if(is_a($animal, BarkingAnimalInterface::class)) {
        echo str_repeat("Waff", $animal->bark(0));
    }
}

$nemo = new Fish();
$lassy = new Dog();

echo "Nemo :";
gardenController($nemo);

echo "Lassy :";
gardenController($lassy);

echo "Armageddon :";
$armageddon = new Worm();
gardenController($armageddon);

riverController($nemo);
riverController($lassy);
riverController($armageddon);
