<?php

class User
{
    public ?float $height = null;


}


function canJumpIntoSpaceMountain(User $user): bool
{
    // On peut faire, éventuellement, une vérification en ammont
    if($user->height === null) {
        throw new \Exception('Vous devez renseigner votre taille pour savoir si vous avez accès au manège.');
    }

    return $user->height > 1.20; // null > 1.20
}

$someDisneyUser = new User();

echo (canJumpIntoSpaceMountain($someDisneyUser)
    ? 'Youhou !!'
    : 'Sniff sniff...');
