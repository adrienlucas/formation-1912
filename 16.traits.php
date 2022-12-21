<?php

class Bacteria {

}

class Animal {
    public float $weight;
}

interface HibernateAnimal {
    public function hibernate(): void;
}

trait SleepWhileHibernating {
    public function hibernate(): void
    {
        if(!is_a($this, Animal::class)) {
            throw new \Exception('You can not use this trait on a non-Animal.');
            //stop
        }

        sleep($this->weight * 10);
    }
}

class Worm extends Animal implements HibernateAnimal
{
    use SleepWhileHibernating;
}

$armageddon = new Worm();

function hibernationManager(HibernateAnimal $worm) {

}

$armageddon->weight = 0.1;
$armageddon->hibernate();

$versvers = new Worm();

$versvers->weight = 1.2;
$versvers->hibernate();

class SarsCov2 extends Bacteria implements HibernateAnimal {
    use SleepWhileHibernating;
}


class Bird extends Animal implements HibernateAnimal
{
    use SleepWhileHibernating;
}

class Fish extends Animal
{
}

class Dog extends Animal
{

}