<?php

function toto(): Generator
{
    echo "Preparing toto :\n";
    yield 'toto';

    echo "Preparing tata :\n";
    yield 'tata';

    echo "Preparing tutu :\n";
    yield 'tutu';

//    return ['toto', 'tata', 'tutu'];
}

$iterationCount = 0;
foreach(toto() as $valeur) {
    echo "Value returned :". $valeur."\n";
    $iterationCount++;

    if($iterationCount == 2) {
        break;
    }
}

//while($valeur = toto() && $iterationCount < 2) { // 0; 1
//    echo "Value returned :". $valeur."\n";
//    $iterationCount++;
//}