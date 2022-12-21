<?php

$neveux = ['riri', 'fifi', 'loulou'];

class PicsouFamily implements Countable {
    private array $nephews = [];
    private array $uncles = [];

    public function addNephew(string $nephewName): void
    {
        $this->nephews[] = $nephewName;
    }

    public function addUncle(string $uncleName): void
    {
        $this->uncles[] = $uncleName;
    }

    public function count(): int
    {
        return count($this->nephews) + count($this->uncles);
    }
}

$family = new PicsouFamily();
$family->addNephew('riri');
$family->addNephew('fifi');
$family->addNephew('loulou');
$family->addUncle('donald');
$family->addUncle('picsou');

var_dump(count($family));
