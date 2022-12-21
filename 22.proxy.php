<?php

interface CalculatorInterface
{
    public function calculate(): int;
}

class HeavyCalculator implements CalculatorInterface
{
    public function __construct()
    {
        // initialization logic qui prend 3 secondes
        sleep(3);
    }

    public function calculate(): int
    {
        // calculation logic
    }
}

class ProxyCalculator implements CalculatorInterface
{
    private CalculatorInterface $realCalculator;
    private string $realCalcultorName;

    public function __construct(string $realCalcultorName)
    {
        $this->realCalcultorName = $realCalcultorName;
    }

    public function calculate(): int
    {
        if($this->realCalculator === null) {
            $this->realCalculator = new $this->realCalcultorName();
            // $this->realCalcultorName === HeavyCalculator::class == "HeavyCalculator"
            // new HeavyCalculator();
            // 3 secondes d'init
        }

        return $this->realCalculator->calculate();
    }
}

// GET /
$proxyCalculator = new ProxyCalculator(HeavyCalculator::class);
$controller = new PageController($proxyCalculator);
$controller->homepage();

// GET /calc
$proxyCalculator = new ProxyCalculator(HeavyCalculator::class);
$controller = new PageController($proxyCalculator);
$controller->calculation();


class PageController
{
    private CalculatorInterface $heavyCalculator;

    public function __construct(CalculatorInterface $heavyCalculator)
    {
        $this->heavyCalculator = $heavyCalculator;
    }

    // "/"
    public function homepage()
    {
        return 'Hello World !';
    }

    // "/calc"
    public function calculation() {
        $calcResult = $this->heavyCalculator->calculate();
        return 'The result of the calculation is :'.$calcResult;
    }
}