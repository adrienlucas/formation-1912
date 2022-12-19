<?php

class User
{
    // Le métier me confirme que par défaut,
    // un utilisateur du système n'ayant pas d'age renseigné
    // doit être considéré comme ayant un age = 0
    public int $age = 0;
}

$someUser = new User();

// ... valid and executed code

function hasLegalAge(User $user): bool
{
    return $user->age > 18;
}

// Nous devons initialiser les propriétés qui n'ont pas de valeur par défaut
$someUser->age = 23;

// Si l'age légal est atteind
if (hasLegalAge($someUser)) {
    echo "Vous êtes majeur.";
// sinon, si la personne est mineur
} else {
    echo "Vous êtes mineur.";
}

$someUser->age = 17;

if(hasLegalAge($someUser)) {
    echo "Vous êtes majeur.";
} else {
    echo "Vous êtes mineur.";
}
