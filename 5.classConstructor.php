<?php

declare(strict_types=1);

class Product
{
    private string $description;
    private readonly string $identifier;

    public function __construct(string $description, string $identifier)
    {
        $this->description = $description;
        $this->identifier = $identifier;
    }
}

// PHP 8.0 : Promotion d'argument
//class Product
//{
//    public function __construct(
//        private string $description,
//        private readonly string $identifier,
//    ){ }
//}


$chaussettes = new Product(
    'Les chaussettes de Noël.',
    '123456789',
);

var_dump($chaussettes);

$bonnet = new Product();

// FAIL : $chaussettes->description = null
// FAIL : $chaussettes->identifier = null