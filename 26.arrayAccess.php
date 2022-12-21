<?php

$a = [];
// array('toto', 'titi') ==> List
// array('first' => 'toto', 'second' => 'titi') ==> HashMap

$a['euro'] = '€';
$a['dollar'] = '$';

echo $a['euro'];

class MoneyConverter implements ArrayAccess
{
    private string $baseCurrency;
    private array $rates;

    public function __construct(string $baseCurrency)
    {
        $this->baseCurrency = $baseCurrency;
    }


    public function convert(int $moneyQuantity, string $localCurrency, string $foreignCurrency): float
    {
        $rateIdentifier = $localCurrency.'>'.$foreignCurrency;
        if(!isset($this->rates[$rateIdentifier])) {
            throw new InvalidArgumentException('The local or foreign currency is unknown.');
        }

        $rate = $this->rates[$rateIdentifier];

        return $moneyQuantity * $rate;
    }

    public function offsetSet(mixed $currency, mixed $rate): void
    {
        $this->rates[$currency.'>'.$this->baseCurrency] = 1/ $rate;
        $this->rates[$this->baseCurrency.'>'.$currency] =  $rate;
    }

    public function offsetGet(mixed $offset): mixed
    {
        throw new \Exception('No get operation on this object.');
    }

    public function offsetExists(mixed $offset): bool
    {
        throw new \Exception('No exists operation on this object.');
    }

    public function offsetUnset(mixed $offset): void
    {
        throw new \Exception('No unset operation on this object.');
    }
}

$converter = new MoneyConverter('dollar');
$converter['euro'] = 1.2;
$converter['yen'] = 130;
$converter['rouble'] = 1000000;


var_dump($converter->convert(300, 'dollar', 'euro')); // 360

var_dump($converter->convert(1, 'dollar', 'rouble')); // 100000
var_dump($converter->convert(1, 'euro', 'dollar')); // 0.9

isset($converter['euro']);

new